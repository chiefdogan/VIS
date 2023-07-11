<?php
//077fd57e57aab32087b0466fe6ebcca8
include('../includes/dbconnection.php');
if(isset($_POST['saveupdates']))
{
  $region_id = $_POST['region_id'];
  $update_region=$_POST['update_region'];
  $update_postal=$_POST['update_postal'];
  $edit_status=$_POST['edit_status'];
  $sql4="update regions_tb set name=:update_region,postal_code=:update_postal,status=:edit_status where id=:region_id";
  $query4 = $dbh->prepare($sql4);
  $query4->bindParam(':update_region',$update_region,PDO::PARAM_STR);
  $query4->bindParam(':update_postal',$update_postal,PDO::PARAM_STR);
  $query4->bindParam(':edit_status',$edit_status,PDO::PARAM_STR);
  $query4->bindParam(':region_id',$region_id,PDO::PARAM_STR);
  $query4->execute();
  if ($query4->execute()){
    echo '<script>alert("Profile has been updated")</script>';
    echo "<script type='text/javascript'> document.location = 'regions.php'; </script>";
  }
  else
  {
    echo '<script>alert("update failed! try again later")</script>';
     echo "<script type='text/javascript'> document.location = 'regions.php'; </script>";
  }

}

?>