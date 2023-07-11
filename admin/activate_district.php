<?php
//include('../includes/dbconnection.php');
include('../includes/check_login.php');

if (isset($_GET['activate_district'])) {
    $district_id = $_GET['activate_district'];

    // Update the office record in the database
    $sql = "UPDATE districts_tb SET status = '1' WHERE id = ?";
    $query = $dbh->prepare($sql);
    $query->execute([$office_id]);

    if ($query) {
    	$url = $_SERVER['REQUEST_URI'];
        $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        $action = 'update';
        $ip = $_SERVER['REMOTE_ADDR'];
        $user_id = $_SESSION['visaid'];
        $record_id = $district_id;
        logActivity66($dbh, $url, $referrer, $action, $ip, $user_id, $record_id);
        //logActivity6($dbh, $_SERVER['REQUEST_URI'], $_SERVER['HTTP_REFERER'], 'update', $_SERVER['REMOTE_ADDR'], $user_id, $office_id);



        echo "<script>alert('Office activated successfully.');window.location.href = 'district.php';</script>";
    } else {
        echo "<script>alert('Something went wrong while deactivating the office.');window.location.href = 'district.php';</script>";
    }
}
?>
