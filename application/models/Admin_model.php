<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Curl\Curl;

class Admin_model extends CI_Model
{
	function setExpiry($postData)
	{
		$postSend = [
		"expiry" => $postData["expiry"]
		];

		$curl = new Curl();
		$curl->post(API."admin/setExpiry/", $postSend);
		$curl->close();

		$response = $curl->response;
		return $response;	
	}

	function upload()
	{
		$image = new CurlFile($_FILES['img']['tmp_name'], $_FILES['img']['type'], $_FILES['img']['name']);
		$image2 = new CurlFile($_FILES['img2']['tmp_name'], $_FILES['img2']['type'], $_FILES['img2']['name']);
		$image3 = new CurlFile($_FILES['img3']['tmp_name'], $_FILES['img3']['type'], $_FILES['img3']['name']);
		$image4 = new CurlFile($_FILES['img4']['tmp_name'], $_FILES['img4']['type'], $_FILES['img4']['name']);

		$postSend = [
		"img" => $image,
		"img2" => $image2,
		"img3" => $image3,
		"img4" => $image4,
		];

		$curl = new Curl();
		// $curl->setHeader("Content-Type","form-data");
		$curl->post(API."admin/upload/", $postSend);
		$curl->close();

		$response = $curl->response;
		return $response;	
	}
}