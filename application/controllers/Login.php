<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("login_model", "login");
	}

	function index()
	{
		if($this->session->admin)
		{
			redirect("admin", "refresh");
		}
		if($this->session->user)
		{
			redirect("user", "refresh");
		}

		$this->load->view("login");
	}

	function submit()
	{

		$formRules = [
		[
		"field" => "username",
		"label" => "username",
		"rules" => "required"
		],
		[
		"field" => "password",
		"label" => "password",
		"rules" => "required"
		]
		];

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');

		$this->form_validation->set_rules($formRules);

		if ($this->form_validation->run() == FALSE) 
		{
			$this->index();
		} 
		else
		{
			$response["response"] = $this->login->submitLogin($this->input->post());

			$status = $response["response"]->Status;

			if($status == 400)
			{
				echo '<script> alert("'.$response["response"]->Data->alert.'"); </script>';
				$this->index();
			}
			elseif($status == 404)
			{
				echo '<script> alert("'.$response["response"]->Data->alert.'"); </script>';
				$this->index();
			}
			else
			{
				$userData = $response["response"]->Data->userData;

				if($userData->isAdmin == 1)
				{
					$this->session->set_userdata("admin", $userData->username);
					redirect("admin", "refresh");
				}

				$this->session->set_userdata("user", $userData->username);
				redirect("user", "refresh");
			}	
		}
	}
}
