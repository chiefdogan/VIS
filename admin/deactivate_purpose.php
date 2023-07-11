<?php
//include('../includes/dbconnection.php');
include('../includes/check_login.php');

if (isset($_GET['deactivate_purpose'])) {
    $purpose_id = $_GET['deactivate_purpose'];

    // Update the ids record in the database
    $sql = "UPDATE visit_purpose_tb SET status = '0' WHERE id = ?";
    $query = $dbh->prepare($sql);
    $query->execute([$purpose_id]);

    if ($query) {
        $url = $_SERVER['REQUEST_URI'];
        $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        $action = 'update';
        $ip = $_SERVER['REMOTE_ADDR'];
        $user_id = $_SESSION['visaid'];
        $record_id = $purpose_id;
        logActivity66($dbh, $url, $referrer, $action, $ip, $user_id, $record_id);
        echo "<script>alert('Purpose deactivated successfully.');window.location.href = 'purpose.php';</script>";
    } else {
        echo "<script>alert('Something went wrong while deactivating the Purpose.');window.location.href = 'purpose.php';</script>";
    }
}
?>
