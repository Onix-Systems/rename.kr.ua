<?php 

class data extends model
{
	function getData($filter = []){
		return Sili::$db->select('data', '*', $filter);
	}
}