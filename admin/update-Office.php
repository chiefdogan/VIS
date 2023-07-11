<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['editoffice']))
{
  $id = $_GET['id'];
  $BranchEditID=$_POST['branchEdit'];;
  $OfficeEditName=$_POST['officenameEdit'];
  $sql = "UPDATE office_tb SET name='$BranchEditID', office_branch_id='$OfficeEditName' WHERE id=$id";
  $query = $dbh->prepare($sql);
  $query->bindParam(':branchEdit',$BranchEditID,PDO::PARAM_STR);
  $query->bindParam(':officenameEdit',$OfficeEditName,PDO::PARAM_STR);
  $query->execute();
  if ($query->execute()){
    echo '<script>alert("Profile has been updated")</script>';
  }else{
    echo '<script>alert("update failed! try again later")</script>';
  }
}
?>
