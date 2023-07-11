<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
include('../includes/check_login.php');
if(isset($_GET['delete_role']))
{
    $uid=intval($_GET['delete_role']);
    $sql="DELETE FROM designation_tb WHERE id='$uid'";
    $query=$dbh->prepare($sql);
    $query->bindParam(':rid',$rid,PDO::PARAM_STR);
    if($query->execute()){
        $url = $_SERVER['REQUEST_URI'];
        $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        $action = 'delete';
        $ip = $_SERVER['REMOTE_ADDR'];
        $user_id = $_SESSION['visaid'];
        $record_id = $uid;
        logActivity66($dbh, $url, $referrer, $action, $ip, $user_id, $record_id);
        echo "<script>alert('Role deleted Successfully');</script>"; 
        echo "<script>window.location.href = 'roles-permissions.php'</script>";
    }else{
        echo '<script>alert("Deletion failed! Please try again later.")</script>';
        echo "<script>window.location.href = 'roles-permissions.php'</script>";
    }
}
?>
