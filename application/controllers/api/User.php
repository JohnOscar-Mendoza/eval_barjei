<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

class User extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("api/user_model", "user");
	}

	public function add_post()
	{
		$response = $this->user->addAccount( $this->post() );
		$this->response($response, OK);
	}

	public function forgotPassword_post()
	{
		$response = $this->user->changePassword($this->post());
		$this->response($response, OK);
	}

	public function view_get()
	{
		$response = $this->user->getAll($this->get());
		$this->response($response, OK);
	}

}