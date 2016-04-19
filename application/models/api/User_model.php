<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function addAccount($postData)
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['encrypt_name'] = TRUE;

		$this->load->library("upload", $config);

		if(!$this->checkFields($postData))
		{
			return $this->bresponse->setMessage("Failed")
			->setStatus(BAD_REQUEST)
			->addData("alert", "Missing input data!")
			->getResponse();	
		}

		if (!$this->upload->do_upload("image"))
		{
			$strError = $this->upload->display_errors();
			return $this->bresponse->setMessage("Failed")
			->setStatus(BAD_REQUEST)
			->addData("alert", strip_tags($strError))
			->getResponse();
		}

		$email = $postData["email"];
		$username = $postData["username"];
		$password = $postData["password"];
		$retype = $postData["retype"];
		$firstName = $postData["firstName"];
		$lastName = $postData["lastName"];
		$birthdate = $postData["birthdate"];
		$notes = $postData["notes"];

		if($password !== $retype)
		{
			return $this->bresponse->setMessage("Failed")
			->setStatus(BAD_REQUEST)
			->addData("alert", "Passwords do not match!")
			->getResponse();	
		}

		try
		{
			$data = ["upload_data" => $this->upload->data()];	
			$fileUpload = $this->upload->data(); 

			$bcryptPass = $this->bcrypt->hash_password($password);

			$queryValue = [
			"email" => $email,
			"username" => $username,
			"password" => $bcryptPass,
			"firstName" => ucwords($firstName),
			"lastName" => ucwords($lastName),
			"birthdate" => date("Y-m-d", strtotime($birthdate)),
			"notes" => $notes,
			"dateCreated" => date("Y-m-d H:i:s"),
			"image" => $fileUpload["file_name"],
			];

			$this->db->insert(TBL_ACCOUNTS, $queryValue);
			$insertId = $this->db->insert_id();

			if($this->db->affected_rows() == 0)
			{
				return $this->bresponse->setMessage("Failed")
				->setStatus(BAD_REQUEST)
				->addData("alert", "Failed to add account!")
				->getResponse();	
			}

			unset($postData["password"]);
			unset($postData["retype"]);

			return $this->bresponse->setMessage("Success")
			->setStatus(CREATED)
			->addData("alert", "Account successfully added.")
			->addData($postData)
			->getResponse();	
		}
		catch(PDOException $ex)
		{
			return $this->bresponse->setMessage("Error")
			->setStatus(BAD_REQUEST)
			->addData("alert", "Username or Email already in use!")
			->getResponse();	
		}
	}

	public function checkFields($postData)
	{
		if(empty($postData["email"]))
		{
			return false;
		}
		if(empty($postData["username"]))
		{
			return false;
		}
		if(empty($postData["password"]))
		{
			return false;
		}
		if(empty($postData["lastName"]))
		{
			return false;
		}
		if(empty($postData["firstName"]))
		{
			return false;
		}
		if(empty($postData["birthdate"]))
		{
			return false;
		}
		if(empty($postData["notes"]))
		{
			return false;
		}

		return true;
	}

	public function getAll()
	{
		try
		{
			$results = $this->db->select("email, username, firstName, lastName, birthdate, notes, image")
			->get(TBL_ACCOUNTS);

			$resultObj = $results->result();

			return $this->bresponse->setMessage("Success")
			->setStatus(OK)
			->addData($resultObj)
			->getResponse();	

		}
		catch(PDOException $ex)
		{
			return $this->bresponse->setMessage("Error")
			->setStatus(BAD_REQUEST)
			->addData("alert", $ex->getMessage())
			->getResponse();	
		}

	}

	public function verifyPassword($oldPassword, $result)
	{
		if( $this->bcrypt->check_password($oldPassword, $result[0]->password) )
		{
			return true;
		}
		return false;
	}

	function sendMail($postData, $randomPassword)
	{
		$this->load->library('email');

    // FCPATH refers to the CodeIgniter install directory
    // Specifying a file to be attached with the email
		// $file = FCPATH . 'license.txt';

    // Defines the email details
		$this->email->from('barjei@smartwave.ph', 'Jeirene Richmond L. Barbo');
		$this->email->to($postData["email"]);
		// $this->email->cc('another@example.com');
		// $this->email->bcc('one-another@example.com');
		$this->email->subject('Forgot Password');
		$this->email->message("Your request for new password is successful. \nYour new password is ".$randomPassword."\nTo log in with your new password click this link http://52.24.133.167/ci_barjei/login");
		// $this->email->attach($file);

    // The email->send() statement will return a true or false
    // If true, the email will be sent

		if ($this->email->send()) {
			return $this->bresponse->setMessage("Success")
			->setStatus(OK)
			->addData("alert", "Message sent.")
			->getResponse();	
		} else { 
			return $this->bresponse->setMessage("Failed")
			->setStatus(BAD_REQUEST)
			->addData("alert", "Mail not sent!")
			->getResponse();	
			// echo $this->email->print_debugger();
		}
	}

	function generateRandomString($length = 10) 
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}

	public function checkIfUserExists($email)
	{
		$result = $this->db->select("username, email")
		->where("email", $email)
		->get(TBL_ACCOUNTS)->row();	

		if(empty($result))
		{
			return false;
		}
		return true;
	}

	public function changePassword($postData)
	{
		$email = $postData["email"];

		$randomPassword = $this->generateRandomString();

		if(empty($email) || empty($randomPassword))
		{
			return $this->bresponse->setMessage("Failed")
			->setStatus(BAD_REQUEST)
			->addData("alert", "Missing input data!")
			->getResponse();	
		}

		try
		{
			if(!$this->checkIfUserExists($email))
			{
				return $this->bresponse->setMessage("Failed")
				->setStatus(NOT_FOUND)
				->addData("alert", "No user found!")
				->getResponse();	
			}

			$result = $this->db->select("password, username")
			->from(TBL_ACCOUNTS)
			->where("email", $email)
			->get()->result();

			$bcryptPass = $this->bcrypt->hash_password($randomPassword);
			$updateValue = [
			"password" => $bcryptPass,
			"dateUpdated" => date("Y-m-d H:i:s")
			];

			$this->db->set($updateValue)
			->where("email", $email)
			->update(TBL_ACCOUNTS);

			$this->sendMail($postData, $randomPassword);

			return $this->bresponse->setMessage("Success")
			->setStatus(OK)
			->addData("alert", "Password successfully changed.")
			->addData("email", $email)
			->getResponse();	

		}
		catch(PDOException $ex)
		{
			return $this->bresponse->setMessage("Error")
			->setStatus(BAD_REQUEST)
			->addData("alert", $ex->getMessage())
			// ->addData("alert", "Cannot change password!")
			->getResponse();	
		}
	}

}