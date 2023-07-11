<?php 

//include('../includes/dbconnection.php');
include("../includes/check_login.php");
check_login();

error_reporting(0);

if (isset($_POST['addIDS'])) {

	$name=$_POST['IDS'];
	

	$sql1 = "SELECT * FROM idcategory_tb WHERE name='$name'";
	$results = mysqli_query($conn, $sql1);
	if (!$results->num_rows > 0) {
		$sql = "INSERT INTO idcategory_tb (name) VALUES ('$name')";
		$result = mysqli_query($conn, $sql);
		$visitorId = mysqli_insert_id($conn);
		if ($result) {
			$url = $_SERVER['REQUEST_URI'];
			$referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
			$action = 'insert';
			$ip = $_SERVER['REMOTE_ADDR'];
			$user_id = $_SESSION['visaid'];
			$record_id = $visitor_Id;
			logActivity66($dbh, $url, $referrer, $action, $ip, $user_id, $record_id);
			echo "<script>alert('New IDS added Successfuly!! .');document.location ='idcategory.php';</script>";
			
		}
		else 
		{
			echo "<script>alert('Woops! Something Wrong Went.');document.location ='idcategory.php';</script>";
		}
	} 

}


?>