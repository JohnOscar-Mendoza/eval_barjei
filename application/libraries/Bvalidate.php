<?php
class Bvalidate
{
	static $not_array = 1;
	static $missing_parameter = 2;
	static $no_record_found = 3;
	
	/**
	* VALIDATE POSTED DATA
	* @param $array array[] posted data
	* @param $params string csv list of keys that should exist in the $array parameter
	*
	* @return no return;
	*/
	public static function validate($array, $params)
	{
		$x = true;
		if(!is_array($array))
		{
			throw new Exception("Parameter must be array", self::$not_array);
		}
		$keys = preg_split("/[\s,]+/", $params);

		foreach($keys as $key)
		{
			if(empty($array[$key])) { $x = false; }
		}

		if($x == false)
		{
			throw new Exception("Missing parameter", self::$missing_parameter);
		}
	}

	public static function validate_v2($arrayWithCondition, $params)
	{

	}
}
?>