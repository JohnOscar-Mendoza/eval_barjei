<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("user_model", "user");	
	}

	function index()
	{
		$this->add();
	}

	function checkSession()
	{
		if(empty($this->session->user))
		{
			return false;
		}
		return true;
	}

	function logOut()
	{
		$this->session->unset_userdata("user");
		redirect("login", "refresh");
	}

	function add()
	{
		if(!$this->checkSession())
		{
			redirect("login", "refresh");	
		}

		$data["username"] =  $this->session->user;

		$this->load->view("user/head");
		$this->load->view("user/add_account", $data);
		$this->load->view("user/foot");
	}

	function addAccount()
	{
		$response["response"] = $this->user->addAccount($this->input->post());
		$status = $response["response"]->Status;
		echo '<script> alert("'.$response["response"]->Data->alert.'"); </script>';

		if($status == 400)
		{
			$this->add();
		}
		elseif($status == 201)
		{
			$this->view();	
		}
	}

	function view()
	{	
		if(!$this->checkSession())
		{
			redirect("login", "refresh");	
		}

		$user["username"] =  $this->session->user;
		$data = $this->user->getAccounts();

		$this->load->view("user/head", $user);
		$this->load->view("user/view_all", $data);
		$this->load->view("user/foot");	
	}

	function forgotPassword()
	{
		$this->load->view("forgot_password");
	}

	function sendEmail()
	{
		$response["response"] = $this->user->forgotPass($this->input->post());
		$status = $response["response"]->Status;

		if($status == 200)
		{
			echo '<script> alert("'.$response["response"]->Data->alert.'"); </script>';
			$this->forgotPassword();
		}
		elseif($status == 400)
		{
			echo '<script> alert("'.$response["response"]->Data->alert.'"); </script>';
			$this->forgotPassword();
		}		
	}

}