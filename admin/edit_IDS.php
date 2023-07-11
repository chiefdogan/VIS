<?php
include('../includes/dbconnection.php');
include('../includes/check_login.php');

if (isset($_POST['UpdateIDS'])) {
    $ids_id = $_POST['ids_id'];
    $iname = $_POST['iname'];
 

    // Update the idcategory record in the database
    $sql = "UPDATE idcategory_tb SET name = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "si", $iname,$ids_id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $url = $_SERVER['REQUEST_URI'];
        $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        $action = 'update';
        $ip = $_SERVER['REMOTE_ADDR'];
        $user_id = $_SESSION['visaid'];
        $record_id = $ids_id;
        logActivity66($dbh, $url, $referrer, $action, $ip, $user_id, $record_id);

        echo "<script>alert('ID updated successfully.');window.location.href = 'idcategory.php';</script>";
    } else {
        echo "<script>alert('Something went wrong while updating the IDS.');window.location.href = 'idcategory.php';</script>";
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
?>
