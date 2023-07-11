<?php
//include('../includes/dbconnection.php');
include('../includes/check_login.php');

if (isset($_GET['deactivate_ids'])) {
    $ids_id = $_GET['deactivate_ids'];

    // Update the ids record in the database
    $sql = "UPDATE idcategory_tb SET status = '0' WHERE id = ?";
    $query = $dbh->prepare($sql);
    $query->execute([$ids_id]);

    if ($query) {
        $url = $_SERVER['REQUEST_URI'];
        $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        $action = 'update';
        $ip = $_SERVER['REMOTE_ADDR'];
        $user_id = $_SESSION['visaid'];
        $record_id = $ids_id;
        logActivity66($dbh, $url, $referrer, $action, $ip, $user_id, $record_id);
        echo "<script>alert('IDS deactivated successfully.');window.location.href = 'idcategory.php';</script>";
    } else {
        echo "<script>alert('Something went wrong while deactivating the IDS.');window.location.href = 'idcategory.php';</script>";
    }
}
?>
