<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
 if(isset($_POST['addregister']))
    { 
        $firstname=$_POST['fname'];
        $middlename=$_POST['mname'];
        $lastname=$_POST['lname']; 
        $mobile=$_POST['mobileid'];
        $emailid=$_POST['emailid']; 
        $pfnumber=$_POST['pfnumber']; 
        $password=md5($_POST['password']);
        $cpassword=md5($_POST['cpassword']);
        $designation=$_POST['role'];
        $branch=$_POST['branchid'];  
        $sql="INSERT INTO  staff_tb (first_name,middle_name,last_name,mobile,email,pf_no,password,designation_id,office_branch_id) VALUES(:firstname,:middlename,:lastname,:mobile,:emailid,:pfnumber,:password,:designation,:branch)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':fname',$firstname,PDO::PARAM_STR);
        $query->bindParam(':mname',$middlename,PDO::PARAM_STR);
        $query->bindParam('lname',$lastname,PDO::PARAM_STR);
        $query->bindParam(':mobileid',$mobile,PDO::PARAM_STR);
        $query->bindParam(':emailid',$emailid,PDO::PARAM_STR);
        $query->bindParam(':pfnumber',$pfnumber,PDO::PARAM_STR);
        $query->bindParam(':password',$password,PDO::PARAM_STR);
        $query->bindParam(':role',$designation,PDO::PARAM_STR);
        $query->bindParam(':branchid',$branch,PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if($lastInsertId)
        {
            echo "<script>alert('Registration successfull. Now you can login');document.location ='users.php'; </script>";
        }
        else 
        {
            echo "<script>alert('Something went wrong. Please try again'); document.location ='users.php';</script>";
        }
    }

?>