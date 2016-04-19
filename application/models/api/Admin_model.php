<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	function setExpiry($postData)
	{
		$expiry = $postData["expiry"];

		if(empty($expiry))
		{
			return $this->bresponse->setMessage("Failed")
			->setStatus(BAD_REQUEST)
			->addData("alert", "Missing input data!")
			->getResponse();	
		}

		try
		{
			$queryValue = [
			"expiry" => $expiry,
			];

			$this->db->insert("tbl_settings", $queryValue);

			if($this->db->affected_rows() == 0)
			{
				return $this->bresponse->setMessage("Failed")
				->setStatus(BAD_REQUEST)
				->addData("alert", "Failed to add account!")
				->getResponse();	
			}

			return $this->bresponse->setMessage("Success")
			->setStatus(CREATED)
			->addData($postData)
			->addData("alert", "Expiry Set.")
			->getResponse();	
		}
		catch(PDOException $ex)
		{
			return $this->bresponse->setMessage("Error")
			->setStatus(BAD_REQUEST)
			->addData("alert", "Failed")
			->getResponse();	
		}

	}

	function upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['encrypt_name'] = TRUE;

		$this->load->library("upload", $config);

		$this->upload->do_upload("img");
		$this->upload->do_upload("img2");
		$this->upload->do_upload("img3");
		$this->upload->do_upload("img4");

		$data = ["upload_data" => $this->upload->data()];	
		$fileUpload = $this->upload->data(); 

		return $this->bresponse->setMessage("Success")
		->setStatus(OK)
		->addData("alert", "Image/s uploaded.")
		->getResponse();
		
	}
	
}