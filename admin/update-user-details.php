<?php
include('../includes/dbconnection.php');
// Check if form is submitted
if (isset($_POST['EditProf'])) {

if(!empty($_POST["emailid"])) {
  $emailid= $_POST["emailid"];
  if (filter_var($emailid, FILTER_VALIDATE_EMAIL)===false) {

    echo "<script>alert('error : You did not enter a valid email.');document.location ='profile.php';</script>";
  }
  
  else
   {
    $id = $_POST['id'];
    $middle_name =($_POST['mname']);
    $first_name = ($_POST['fname']);
    $last_name = ($_POST['lname']);
    $emailid =($_POST['emailid']);

    // Update details in database
    $query = "UPDATE staff_tb SET first_name='$first_name',middle_name='$middle_name',last_name='$last_name',email='$emailid' WHERE id='$id'";
    $results=mysqli_query($conn,$query);
    if ($results) {

        echo "<script>alert('Update successfully.');document.location ='profile.php';</script>";
            
    } 
    else 
    {
        
        echo "<script>alert('Error updating details.!! .');document.location ='profile.php';</script>";
    }
}
}
}
?>
