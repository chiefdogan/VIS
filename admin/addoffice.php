<?php 

//include('../includes/dbconnection.php');
include("../includes/check_login.php");
check_login();

error_reporting(0);

if (isset($_POST['addoffice'])) {

        $office=$_POST['oname'];
        $branch=$_POST['branchid'];  

		$sql1 = "SELECT * FROM office_tb WHERE name='$office'";
		$results = mysqli_query($conn, $sql1);
		if (!$results->num_rows > 0) {
			$sql = "INSERT INTO office_tb (name,office_branch_id) VALUES ('$office','$branch')";
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
		    echo "<script>alert('New Office added Successfuly!! .');document.location ='office.php';</script>";
				
			}
			 else 
			 {
				echo "<script>alert('Woops! Something Wrong Went.');document.location ='office.php';</script>";
			}
		} 

	}


?>