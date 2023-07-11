<?php
// Connect to database
include('../includes/dbconnection.php');

// Get form data
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$mname = mysqli_real_escape_string($conn, $_POST['mname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$mobile = mysqli_real_escape_string($conn, $_POST['mobileid']);
$email = mysqli_real_escape_string($conn, $_POST['emailid']);
$pfno = mysqli_real_escape_string($conn, $_POST['pfnumber']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$usertype = mysqli_real_escape_string($conn, $_POST['role']);
$branchid = mysqli_real_escape_string($conn, $_POST['branchid']);


// Hash the password
$password = password_hash($password, PASSWORD_DEFAULT);

// Insert the user into the database
$sql= "INSERT INTO staff_tb (first_name,middle_name,last_name,mobile,email,pf_no,password,designation_id,office_branch_id) VALUES ('$fname', '$mname', '$lname','$mobile','$email','$pfno','$password', '$usertype','$branchid')";
$result=mysqli_query($conn, $sql);

if($result)
        {
            echo "<script>alert('Registration successfull. Now you can login');document.location ='users.php'; </script>";
        }
        else 
        {
            echo "<script>alert('Something went wrong. Please try again'); document.location ='users.php';</script>";
        }


?>
