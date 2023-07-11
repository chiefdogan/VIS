<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
include('../includes/check_login.php');
if(isset($_GET['delete_user']))
{
    $uid=intval($_GET['delete_user']);
    $sql="update staff_tb set Status='0' where id='$uid'";
    $query=$dbh->prepare($sql);
    $query->bindParam(':rid',$rid,PDO::PARAM_STR);
    $query->execute();
    if ($query->execute()){
      $url = $_SERVER['REQUEST_URI'];
        $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        $action = 'update';
        $ip = $_SERVER['REMOTE_ADDR'];
        $user_id = $_SESSION['visaid'];
        $record_id = $uid;
        logActivity66($dbh, $url, $referrer, $action, $ip, $user_id, $record_id);
        echo "<script>alert('User Deactivated Successfuly');</script>"; 
        echo "<script>window.location.href = 'users.php'</script>";
    }else{
        echo '<script>alert("update failed! try again later")</script>';
    }
    
}
?>