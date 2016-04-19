<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

class Login extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("api/login_model", "login");
	}

	public function submit_post()
	{
		$response = $this->login->checkAccount( $this->post() );
		$this->response($response, OK);
	}
}

?>