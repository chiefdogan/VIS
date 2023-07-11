<?php
// include('../includes/check_login.php');
// //include('../includes/dbconnection.php');

// if (isset($_GET['reset_user_id'])) {
//     $reset_user_id = $_GET['reset_user_id'];
//     $default_password = md5('mungukwanza');
//     $sql = "UPDATE staff_tb SET password = ?, reset = 0 WHERE staff_id = ?";
//     $stmt = mysqli_prepare($conn, $sql);

//     if (!$stmt) {
//         echo "<script>alert('Error preparing statement.');</script>";
//     } else {
//         mysqli_stmt_bind_param($stmt, "si", $default_password, $reset_user_id);
//         $result = mysqli_stmt_execute($stmt);

//         if ($result) {
//             $url = $_SERVER['REQUEST_URI'];
//             $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
//             $action = 'update';
//             $ip = $_SERVER['REMOTE_ADDR'];
//             $user_id = $_SESSION['visaid'];
//             $record_id = $reset_user_id;
//             logActivity66($dbh, $url, $referrer, $action, $ip, $user_id, $record_id);
//             echo "<script>alert('Password reset successfully.');window.location.href = 'users.php';</script>";
//         } else {
//             echo "<script>alert('Password reset failed. Please try again.');</script>";
//         }
//     }
// }


//this code is for resseting the user mnyiro
/*
this is block comment

*/

session_start();
error_reporting(0);
include('../includes/dbconnection.php');
include('../includes/check_login.php');

if(isset($_GET['reset_user_id'])) {
    $reset_user_id = $_GET['reset_user_id'];
    $default_password = md5('mungukwanza');
    $sql = "UPDATE staff_tb SET password = :password, reset = 0 WHERE id = :staff_id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':password', $default_password, PDO::PARAM_STR);
    $stmt->bindParam(':staff_id', $reset_user_id, PDO::PARAM_INT);
    $result = $stmt->execute();

    if ($result) {
        $url = $_SERVER['REQUEST_URI'];
        $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        $action = 'update';
        $ip = $_SERVER['REMOTE_ADDR'];
        $user_id = $_SESSION['visaid'];
        $record_id = $reset_user_id;
        logActivity66($dbh, $url, $referrer, $action, $ip, $user_id, $record_id);
        echo "<script>alert('Password reset successfully.');window.location.href = 'users.php';</script>";
    } else {
        echo "<script>alert('Password reset failed. Please try again.');</script>";
    }
}

?>
