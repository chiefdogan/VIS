<?php
//include('../includes/dbconnection.php');
include('../includes/check_login.php');

if (isset($_POST['UpdateOffice'])) {
    $office_id = $_POST['office_id'];
    $oname = $_POST['oname'];
    $branchy = $_POST['branchy'];

    // Update the office record in the database
    $sql = "UPDATE office_tb SET name = ?, office_branch_id = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sii", $oname, $branchy, $office_id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $url = $_SERVER['REQUEST_URI'];
        $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        $action = 'update';
        $ip = $_SERVER['REMOTE_ADDR'];
        $user_id = $_SESSION['visaid'];
        $record_id = $office_id;
        logActivity66($dbh, $url, $referrer, $action, $ip, $user_id, $record_id);
        echo "<script>alert('Office updated successfully.');window.location.href = 'office.php';</script>";
    } else {
        echo "<script>alert('Something went wrong while updating the office.');window.location.href = 'office.php';</script>";
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
?>
