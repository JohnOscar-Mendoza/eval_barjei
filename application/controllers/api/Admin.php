<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

class Admin extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("api/admin_model", "admin");
		$this->load->model("api/user_model", "user");
	}

	function resetPassword_post()
	{
		$response = $this->user->changePassword($this->post());
		$this->response($response, OK);
	}

	function setExpiry_post()
	{
		$response = $this->admin->setExpiry($this->post());
		$this->response($response, OK);
	}

	function setPageLimit_post()
	{
		$response = $this->admin->setPageLimit($this->post());
		$this->response($response, OK);
	}

	function upload_post()
	{
		$response = $this->admin->upload($this->post());
		$this->response($response, OK);
	}
}