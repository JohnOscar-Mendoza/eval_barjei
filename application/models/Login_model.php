<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Curl\Curl;

class Login_model extends CI_Model
{
	public function submitLogin($postData)
	{
		$postSend = [
		"username" => $postData["username"],
		"password" => $postData["password"]
		];

		$curl = new Curl();
		// $curl->setHeader("Content-Type","form-data");
		$curl->post(API."/login/submit/", $postSend);
		$curl->close();

		$response= $curl->response;
		return $response;
	}
}