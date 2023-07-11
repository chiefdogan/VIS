<?php
include('../includes/dbconnection.php');
// Check if form is submitted
if (isset($_POST['save'])) {
    $id = $_POST['id'];
    //$id = $_GET['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $retype_password = md5($_POST['retype_password']);

    // Retrieve old password hash from database
    $query = "SELECT password FROM staff_tb WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $old_password = $row['password'];

    // Verify old password
    if ($current_password != $old_password) {
        //$_SESSION['error'] = "Current password is incorrect.";
       echo "<script>alert('Current password is incorrect!! .');document.location ='profile.php';</script>";
    }

    // Verify new password match
    if ($new_password != $retype_password) {
        //$_SESSION['error'] = "New passwords do not match.";
        echo "<script>alert('New password and confirm password do not match!! .');document.location ='profile.php';</script>";
    }

    // Update password hash in database
    $query = "UPDATE staff_tb SET password='$new_password' WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        //$_SESSION['success'] = "Password changed successfully.";
        echo "<script>alert('Password changed successfully please login with your new password!! .');document.location ='../index.php';</script>";
             //include('../includes/logout.php');
    } else {
        //$_SESSION['error'] = "Error updating password.";
        echo "<script>alert('Error updating password.!! .');document.location ='profile.php';</script>";
    }
}
?>
