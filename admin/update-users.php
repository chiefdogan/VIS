<?php 

include('../includes/dbconnection.php');

//error_reporting(0);

//session_start();

//if (isset($_SESSION['username'])) {
  //  header("Location: index.php");
//}

if (isset($_POST['user_id'])) {

       $uid=$_POST['user_id'];
      $firstname=$_POST['first_name'];
        $middlename=$_POST['middle_name'];
        $lastname=$_POST['last_name']; 
        $mobile=$_POST['mobile'];
        $emailid=$_POST['email']; 
        $pfnumber=$_POST['Pfnumber']; 
        $designation=$_POST['role'];
        $brach=$_POST['branch'];  

 

    $sql1 = "SELECT * FROM staff_tb WHERE id='$uid'";
    $results = mysqli_query($conn, $sql1);
    if (!$results->num_rows > 0) {
      $sql = "UPDATE  staff_tb SET first_name='$firstname',middle_name='$middlename',last_name='$lastname',mobile='$mobile',email='$emailid',pf_no='$pfnumber',designation_id='$designation',office_branch_id='$brach' WHERE id='$uid'";
      $result = mysqli_query($conn, $sql);
      if ($result) {

        echo "<script>alert('Wow! User updated successfully.');document.location ='users.php';</script>";
        
      }
       else {
        echo "<script>alert('Woops! Something Wrong Went.');document.location ='users.php';</script>";
      }
    }

    } 

?>