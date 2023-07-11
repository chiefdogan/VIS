<?php
include('../includes/dbconnection.php');
include('../includes/check_login.php');

if (isset($_GET['deactivate_office'])) {
    $office_id = $_GET['deactivate_office'];

    // Update the office record in the database
    $sql = "UPDATE office_tb SET status = '0' WHERE id = ?";
    $query = $dbh->prepare($sql);
    $query->execute([$office_id]);

    if ($query) {
        $url = $_SERVER['REQUEST_URI'];
        $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        $action = 'update';
        $ip = $_SERVER['REMOTE_ADDR'];
        $user_id = $_SESSION['visaid'];
        $record_id = $office_id;
        logActivity66($dbh, $url, $referrer, $action, $ip, $user_id, $record_id);
        echo "<script>alert('Office deactivated successfully.');window.location.href = 'office.php';</script>";
    } else {
        echo "<script>alert('Something went wrong while deactivating the office.');window.location.href = 'office.php';</script>";
    }
}
?>
