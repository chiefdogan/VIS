<?php 

include('../includes/dbconnection.php');

error_reporting(0);
include("../includes/check_login.php");
//session_start();

//if (isset($_SESSION['username'])) {
  //  header("Location: index.php");
//}

if (isset($_POST['addregister'])) {

	    $firstname=$_POST['fname'];
        $middlename=$_POST['mname'];
        $lastname=$_POST['lname']; 
        $mobile=$_POST['mobileid'];
        $emailid=$_POST['emailid']; 
        $pfnumber=$_POST['pfnumber']; 
        $password = md5($_POST['password']);
	    $cpassword = md5($_POST['cpassword']);
        $designation=$_POST['role'];
        $brach=$_POST['branchid'];  

	if ($password == $cpassword) {
		$sql1 = "SELECT * FROM staff_tb WHERE email='$emailid'";
		$result = mysqli_query($conn, $sql1);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO staff_tb (first_name,middle_name,last_name,mobile,email,pf_no,password,designation_id,office_branch_id) VALUES ('$firstname', '$middlename', '$lastname','$mobile','$emailid','$pfnumber','$password', '$designation','$brach')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				   $visitorId = mysqli_insert_id($conn);

				$url = $_SERVER['REQUEST_URI'];
                        $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
                        $action = 'insert';
                        $ip = $_SERVER['REMOTE_ADDR'];
                        $user_id = $_SESSION['visaid'];
                        $record_id = $visitorId;
                        logActivity66($dbh, $url, $referrer, $action, $ip, $user_id, $record_id);
		    echo "<script>alert('Wow! User Registration Completed.');document.location ='users.php';</script>";
				
			} else {
				echo "<script>alert('Woops! Something Wrong Went.');document.location ='users.php';</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.');document.location ='users.php';</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.');document.location ='users.php';</script>";
	}
}

?>