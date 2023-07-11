<?php
include('../includes/dbconnection.php');
if(isset($_POST['changephoto'])) 
{

  $id = $_POST['imageid'];
  $imageUpdated=$_FILES["imageUpdated"]["name"];
  move_uploaded_file($_FILES["imageUpdated"]["tmp_name"],"../profileimages/".$_FILES["imageUpdated"]["name"]);
  $sql="update  staff_tb set photo=:imageUpdated where id=:id";
  $query = $dbh->prepare($sql);
  $query->bindParam(':imageUpdated',$imageUpdated,PDO::PARAM_STR);
  $query->bindParam(':imageid',$id,PDO::PARAM_STR);
  $query->execute();

  //$_SESSION['msg']="profile Image Updated Successfully !!";
  echo "<script>alert('profile Image Updated Successfully !! .');document.location ='profile.php';</script>";
  }
  ?>