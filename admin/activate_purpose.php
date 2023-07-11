<?php
//include('../includes/dbconnection.php');
include('../includes/check_login.php');

if (isset($_GET['activate_purpose'])) {
    $purpose_id = $_GET['activate_purpose'];

    // Update the office record in the database
    $sql = "UPDATE visit_purpose_tb SET status = '1' WHERE id = ?";
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
        //logActivity6($dbh, $_SERVER['REQUEST_URI'], $_SERVER['HTTP_REFERER'], 'update', $_SERVER['REMOTE_ADDR'], $user_id, $office_id);



        echo "<script>alert('purpose activated successfully.');window.location.href = 'purpose.php';</script>";
    } else {
        echo "<script>alert('Something went wrong while deactivating the purpose.');window.location.href = 'purpose.php';</script>";
    }
}
?>
