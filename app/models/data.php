<?php 

class data extends model
{
	function getData($filter = []){
		return Sili::$db->select('data', '*', $filter);
	}

	function getAreas($filter = []){
		return Sili::$db->select('areas', '*', $filter);
	}
}