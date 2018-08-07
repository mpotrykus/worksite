<?php

// function to get the values from the form
// '' is the value for $default if one is not provided
function formVal($fieldName, $default = ''){
	
	// get the filename of the page you are on
	// this will make this function page specific for sessions
	$page = $_SERVER['PHP_SELF'];
	
	// check if there is value in $_POST, then $_GET
	if(isset($_POST[$fieldName])){
		$value = $_POST[$fieldName];
	}else if(isset($_GET[$fieldName])){
		$value = $_GET[$fieldName];
	}else if(isset($_SESSION[$fieldName])){
		$value = $_SESSION[$fieldName];
	}else{
		$value = $default;
	}
	
	
	// put the value in the SESSION for later use
	$_SESSION[$fieldName] = $value;

	return $value;
}

