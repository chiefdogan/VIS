<?php
include('../includes/dbconnection.php');
if ($_POST['save']) {

  $staff_id=$_SESSION['visaid'];
  $new_password  = $_POST['new_password'];
  $password = md5($new_password);
  $sql4="update staff_tb set password=:password where id=:staff_id";
  $query4 = $dbh->prepare($sql4);
  $query4->bindParam(':new_password',$password,PDO::PARAM_STR);
  $query4->bindParam(':visaid',$staff_id,PDO::PARAM_STR);
  $query4->execute();
  if ($query4->execute()){
    echo '<script>alert("password has been updated")</script>';
    echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
  }
  else
  {
    echo '<script>alert("update failed! try again later")</script>';
     echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
  }

}

?>