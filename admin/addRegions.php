<?php 

//include('../includes/dbconnection.php');
include("../includes/check_login.php");
check_login();
error_reporting(0);

if (isset($_POST['addRegions'])) {

        $region_name=$_POST['region_name'];
        $postal_code=$_POST['postal_code'];
  

		$sql1 = "SELECT * FROM regions_tb WHERE name='$region_name'";
		$results = mysqli_query($conn, $sql1);
		if (!$results->num_rows > 0) {
			$sql = "INSERT INTO regions_tb (name,postal_code) VALUES ('$region_name','$postal_code')";
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
		    echo "<script>alert('New regions added Successfuly!! .');document.location ='regions.php';</script>";
				
			}
			 else 
			 {
				echo "<script>alert('Woops! Something Wrong Went.');document.location ='regions.php';</script>";
			}
		} 

	}


?>