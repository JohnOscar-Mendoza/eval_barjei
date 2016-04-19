<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bresponse {

    private $message;
    private $data;
    private $status;

    public function __construct()
    {

    }

    public function setMessage($x)
    { $this->message = $x; return $this; }
    public function setData($x)
    { $this->data = $x; return $this; }
    public function setStatus($x)
    { $this->status = $x; return $this; }

    public function getResponse()
    {
        $response = array("Message" => $this->message, "Data" => $this->data, "Status" => $this->status);
        return $response;
    }

    public function addData($array, $value = "")
    {
        if($array == null)
        {
            throw new Exception("First parameter received null", 0);
        }
        if(is_array($array))
        {
            foreach($array as $key => $val)
            {
                $this->data[$key] = $val;
            }
        }
        else
        {
            $this->data[$array] = $value;
        }

        return $this;
    }
}
?>