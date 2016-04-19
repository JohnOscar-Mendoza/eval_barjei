<?php
class Bdebug
{
	static function bdie($x)
	{
		die('<pre>'.print_r($x, true));
	}
}