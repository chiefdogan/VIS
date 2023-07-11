<?php
//error_reporting(0);

//include('../includes/dbconnection.php');
include("../includes/check_login.php");
check_login();


if (isset($_POST['addroles'])) {
    $role = $_POST['roname'];
    
    $sql = "INSERT INTO designation_tb (name) VALUES ('$role')";
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

        echo "<script>alert('New role added Successfuly!! .');document.location ='roles-permissions.php';</script>";
    } else {
        echo "<script>alert('Woops! Something Wrong Went.');document.location ='roles-permissions.php';</script>";
    }
}

?>
