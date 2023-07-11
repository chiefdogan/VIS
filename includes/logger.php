<?php
include('dbconnection.php');
function log_action($dbh, $action, $description, $staff_tb_id) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $staff_tb_id = $_SESSION['visaid'];
    $date = date('Y-m-d H:i:s');
    $url = $_SERVER['REQUEST_URI'];
    $sql = "INSERT INTO logs (date, action, description, ip, staff_tb_id) VALUES (:date, :action, :description, :ip, :staff_tb_id)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':date', $date, PDO::PARAM_STR);
    $query->bindParam(':action', $url, PDO::PARAM_STR);
    $query->bindParam(':description', $description, PDO::PARAM_STR);
    $query->bindParam(':ip', $ip, PDO::PARAM_STR);
    $query->bindParam(':staff_tb_id', $staff_tb_id, PDO::PARAM_STR);
    $query->execute();
}


function logActivity6($dbh,$url, $referrer, $action, $ip, $user_id, $record_id = null) {
        // connect to the database

    // get the current date and time
    $date = date('Y-m-d H:i:s');

    // get the description based on the action and record ID
    $description = '';
    switch ($action) {
        case 'login':
            $description = "User logged in (ID $record_id).";
            break;
        case 'insert':
            $description = "User inserted a new record (ID: $record_id).";
            break;
        case 'update':
            $description = "User updated record (ID: $record_id).";
            break;
        case 'delete':
            $description = "User deleted record (ID: $record_id).";
            break;
        default:
            $description = "User performed action '$action' on record (ID: $record_id).";
            break;
    }

    // prepare and execute the SQL query
    $stmt = $dbh->prepare("INSERT INTO activity_logs_tb (date, url, referrer, action, ip, staff_tb_id, description) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$date, $url, $referrer, $action, $ip, $user_id, $description]);
}


?>
