<?php
session_start();
error_reporting(0);
include('dbconnection.php');
function check_login()
{
	if(strlen($_SESSION['visaid'])==0)
	{	
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="../index.php";		
		$_SESSION["id"]="";
		header("Location: http://$host$uri/$extra");
	}
}

function display_msg($msg ='') {
	$output = array();
	if (!empty($msg)) {
		foreach ($msg as $key => $value) {
			$output  = "<div class=\"alert alert-{$key}\">";
			$output .= "<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>";
			$output .= remove_junk(first_character($value));
			$output .= "</div>";
		}
		return $output;
	} else {
		return "" ;
	}
}
/*
function check_session()
{
	if(strlen($_SESSION['visaid'])=time() + 180)
	{	
		
		header("Location: http://$host$uri/$extra");
	}
}


session_start();
if(!isset($_SESSION['visaid'])){
    header("location:../index.php?login=Please, Login to the system to use it.");
    exit();
}

if(isset($_SESSION['permission']) != "1"){
    header("location:../index.php?login= Your not allowed to access this area");
    exit();
}
*/
?>