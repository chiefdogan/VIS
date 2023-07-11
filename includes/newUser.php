<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(!empty($_POST["emailid"])) {
  $username= $_POST["emailid"];
  
  $sql ="SELECT email FROM staff_tb WHERE email=:username";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':emailid', $username, PDO::PARAM_STR);
  $query-> execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query -> rowCount() > 0)
  {
    echo "<script>alert('Username already exists. try another one');</script>";
} else{
    if(isset($_POST['signup']))
    { 
        $staffid=$_POST['staffid'];
        $firstname=$_POST['fname'];
        $middlename=$_POST['mname'];
        $lastname=$_POST['lname'];
        $email=$_POST['emailid']; 
        //$staffid=$_POST['id']; 
        $mobile=$_POST['mobileid'];
        $brachid=$_POST['brachid'];
        $pfno=$_POST['pfno'];
        $password=md5($_POST['password']); 
        $role=($_POST['usertype']); 
        $sql="INSERT INTO  staff_tb(first_name,middle_name,last_name,mobile,email,pf_no,password,role,office_branch_id) VALUES(:staffid,:firstname,:middlename,:lastname,:mobile,:email,:pfno,:password,:role,:branchid)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':first_name',$firstname,PDO::PARAM_STR);
        $query->bindParam('last_name',$lastname,PDO::PARAM_STR);
        $query->bindParam('middle_name',$middlename,PDO::PARAM_STR);
        $query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
        $query->bindParam(':email',$email,PDO::PARAM_STR);
        $query->bindParam(':pf_no',$pfno,PDO::PARAM_STR);
        $query->bindParam(':password',$password,PDO::PARAM_STR);
        $query->bindParam(':role',$role,PDO::PARAM_STR);
        $query->bindParam(':office_branch_id',$brachid,PDO::PARAM_STR);
        
        
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if($lastInsertId)
        {
            echo "<script>alert('Registration successfull. Now you can login');</script>";
        }
        else 
        {
            echo "<script>alert('Something went wrong. Please try again');</script>";
        }
    }
}
}

?>
