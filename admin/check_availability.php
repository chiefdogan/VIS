<?php 
include('../includes/dbconnection.php');
// code user email availablity

if(!empty($_POST["emailid"])) {
  $email= $_POST["emailid"];
  if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

    echo "error : You did not enter a valid email.";
  }
  else {
    $sql ="SELECT email FROM staff_tb WHERE email=:email";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query -> rowCount() > 0)
    {
      echo "<span style='color:red'> Email already exists .</span>";
      echo "<script>$('#submit').prop('disabled',true);</script>";
    } else{

      echo "<span style='color:green'> Email available for Registration .</span>";
      echo "<script>$('#submit').prop('disabled',false);</script>";
    }
  }
}

if(!empty($_POST["mobileid"])) {
  $mobileid= $_POST["mobileid"];

  $sql ="SELECT mobile  FROM staff_tb WHERE mobile=:mobileid";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':mobileid', $mobileid, PDO::PARAM_STR);
  $query-> execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query -> rowCount() > 0)
  {
    echo "<span style='color:red'> Mobile number already exists .</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  } else{

    echo "<span style='color:green'> Mobile number available for Registration .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}
/*
if(!empty($_POST["emailid"])) {
  $email= $_POST["fullname"];
  
  $sql ="SELECT email FROM staff_tb WHERE email=:email";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':email', $email, PDO::PARAM_STR);
  $query-> execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query -> rowCount() > 0)
  {
    echo "<span style='color:red'> email already exists .</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  } else{
    
    echo "<span style='color:green'> email available for Registration .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}
*/

if(!empty($_POST["pf_no"])) {
  $pf_no= $_POST["pf_no"];
  
  $sql ="SELECT pf_no FROM staff_tb WHERE pf_no=:pf_no";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':pf_no', $pf_no, PDO::PARAM_STR);
  $query-> execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query -> rowCount() > 0)
  {
    echo "<span style='color:red'> Pf Number already exists .</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  } else{
    
    echo "<span style='color:green'> Pf Number available for Registration .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}

if(!empty($_POST["region_name"])) {

    $region_name= $_POST["region_name"];
  
  $sql ="SELECT name FROM regions_tb WHERE name=:region_name";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':region_name', $region_name, PDO::PARAM_STR);
  $query-> execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query -> rowCount() > 0)
  {
    echo "<span style='color:red'> Region already exists .</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  } 
  else
  {
    
    echo "<span style='color:green'> Region available for Registration .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}



if(!empty($_POST["postal_code"])) {

 //echo '<font color="red">error : Please Fill this field.</font>';
  $postal_code= $_POST["postal_code"];

  $sql ="SELECT postal_code FROM regions_tb WHERE postal_code=:postal_code";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':postal_code', $postal_code, PDO::PARAM_STR);
  $query-> execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query -> rowCount() > 0)
  {
    echo "<span style='color:red'> Postal Code already exists .</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  } else{
    
    echo "<span style='color:green'> Postal Code available for Registration .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}

if(!empty($_POST["postal_update"])) {
  $postal_update= $_POST["postal_update"];
  
  $sql ="SELECT postal_code FROM regions_tb WHERE postal_code=:postal_update";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':postal_update', $postal_update, PDO::PARAM_STR);
  $query-> execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query -> rowCount() > 0)
  {
    echo "<span style='color:red'> Postal Code already exists .</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  } else{
    
    echo "<span style='color:green'> Postal Code available for Registration .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}
if(!empty($_POST["region_update"])) {
  $region_update= $_POST["region_update"];
  
   $sql ="SELECT * FROM regions_tb WHERE name=:region_update";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':region_update', $region_update, PDO::PARAM_STR);
  $query-> execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query -> rowCount() > 0)
  {
    echo "<span style='color:red'> Region already exists .</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  } 
  else
  {
    
    echo "<span style='color:green'> Region available for Registration .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}



?>
