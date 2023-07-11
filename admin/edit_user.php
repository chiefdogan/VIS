<?php

//include('../includes/dbconnection.php');
include('../includes/check_login.php');

// Check if the form has been submitted
if (isset($_POST['updateUser'])) {
    // Get the user ID from the hidden field
    $userId = $_POST['user_id'];
    
    // Get the form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $email = $_POST['emailID'];
    $mobile = $_POST['mobileID'];
    $office_branch_id = $_POST['branchID'];
    $designation_id= $_POST['roleID'];
    $pf_no = $_POST['Pfnumber'];

    // Update the user record in the database
    $sql = "UPDATE staff_tb SET first_name = :first_name, last_name = :last_name, middle_name = :middle_name, email = :email, mobile = :mobile, office_branch_id = :office_branch_id, designation_id = :designation_id, pf_no = :pf_no WHERE id = :userId";
    $query = $dbh->prepare($sql);
    $query->bindParam(':first_name', $first_name, PDO::PARAM_STR);
    $query->bindParam(':last_name', $last_name, PDO::PARAM_STR);
    $query->bindParam(':middle_name', $middle_name, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $query->bindParam(':office_branch_id', $office_branch_id, PDO::PARAM_INT);
    $query->bindParam(':designation_id', $designation_id, PDO::PARAM_INT);
    $query->bindParam(':pf_no', $pf_no, PDO::PARAM_INT);
    $query->bindParam(':userId', $userId, PDO::PARAM_INT);
    $query->execute();

     if ($query) {
      $url = $_SERVER['REQUEST_URI'];
        $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        $action = 'update';
        $ip = $_SERVER['REMOTE_ADDR'];
        $user_id = $_SESSION['visaid'];
        $record_id = $userId;
        logActivity66($dbh, $url, $referrer, $action, $ip, $user_id, $record_id);

        echo "<script>alert('Wow! User updated successfully.');document.location ='users.php';</script>";
        
      }
       else {
        echo "<script>alert('Woops! Something Wrong Went.');document.location ='users.php';</script>";
      }
}
?>

