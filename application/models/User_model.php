<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Curl\Curl;

class User_model extends CI_Model
{
	function addAccount($postData)
	{
		$image = new CurlFile($_FILES['image']['tmp_name'], $_FILES['image']['type'], $_FILES['image']['name']);

		$postSend = [
		"email" => $postData["email"],
		"username" => $postData["username"],
		"password" => $postData["password"],
		"retype" => $postData["retype"],
		"firstName" => $postData["firstName"],
		"lastName" => $postData["lastName"],
		"birthdate" => $postData["birthdate"],
		"notes" => $postData["notes"],
		"image" => $image
		];

		$curl = new Curl();
		// $curl->setHeader("Content-Type","form-data");
		$curl->post(API."user/add/", $postSend);
		$curl->close();

		// die('<pre>'.print_r($curl, true));
		$response = $curl->response;
		return $response;	
	}

	function getAccounts()
	{
		$curl = new Curl();
		$curl->get(API."user/view");
		$curl->close();

		$response = $curl->response;
		return $response;
	}

	function forgotPass($postData)
	{
		$postSend = [
		"email" => $postData["email"]
		];

		$curl = new Curl();
		$curl->post(API."user/forgotPassword/", $postSend);
		$curl->close();

		$response = $curl->response;
		return $response;	
	}

}