<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
	public function checkAccount($postData)
	{
		$username = $postData["username"];
		$password = $postData["password"];

		$bcryptPass = $this->bcrypt->hash_password($password);

		if(empty($username) || empty($password))
		{
			return $this->bresponse->setMessage("Failed")
			->setStatus(BAD_REQUEST)
			->addData("alert", "Missing input data!")
			->getResponse();	
		}

		try
		{
			$resultRow = $this->db->select("*")
			->from(TBL_ACCOUNTS)
			->where("username", $username)
			->get()->result();

			if(count($resultRow) == 0)
			{
				return $this->bresponse->setMessage("Failed")
				->setStatus(NOT_FOUND)
				->addData("alert", "No user found!")
				->getResponse();	
			}

			return $response = $this->checkPassword($password, $resultRow);
		}
		catch(PDOException $ex)
		{
			return $this->bresponse->setMessage("Error")
			->setStatus(BAD_REQUEST)
			->addData("alert", "User already removed!")
			->getResponse();	
		}
		
	}

	public function checkPassword($password, $resultRow)
	{		
		if( $this->bcrypt->check_password($password, $resultRow[0]->password) )
		{
			unset($resultRow[0]->password);
			return $this->bresponse->setMessage("Success")
			->setStatus(OK)
			->addData("alert", "Log in successful.")
			->addData("userData", $resultRow[0])
			->getResponse();	
		}

		return $this->bresponse->setMessage("Failed")
		->setStatus(BAD_REQUEST)
		->addData("alert", "Wrong password!")
		->getResponse();	
	}
}