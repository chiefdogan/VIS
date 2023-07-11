<?php
session_start();
//error_reporting(0);
include('dbconnection.php');



// Function to check login
function check_login()
{
    if(strlen($_SESSION['visaid']) == 0)
    {   
        $host = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = "../index.php";        
        $_SESSION["id"] = "";
        header("Location: http://$host$uri/$extra");
    }
}

function getRecentActivity($staff_tb_id) {
    global $dbh;
    $sql = "SELECT * FROM activity_logs_tb WHERE staff_tb_id = :staff_tb_id   ORDER BY date ASC ";
    $query = $dbh->prepare($sql);
    $query->bindParam(':staff_tb_id', $staff_tb_id, PDO::PARAM_INT);
    $query->execute();
    $logs = $query->fetchAll(PDO::FETCH_ASSOC);
    return $logs;
}


function logActivity66($dbh,$url, $referrer, $action, $ip, $user_id, $record_id = null) {
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




// function get_all_Activity() {
//     global $dbh;
//     $sql = "SELECT * FROM activity_logs   ORDER BY date DESC ";
//     $query = $dbh->prepare($sql);
//     $query->execute();
//     $logs = $query->fetchAll(PDO::FETCH_ASSOC);
//     return $logs;
// }


// // Function to insert a record
// function insertRecord($table, $data)
// {
//     global $dbh;
//     $columns = implode(',', array_keys($data));
//     $placeholders = ':' . implode(',:', array_keys($data));
//     $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
//     $query = $dbh->prepare($sql);
//     foreach ($data as $key => $value) {
//         $query->bindValue(':' . $key, $value);
//     }
//     $query->execute();

//     // Log the activity
//     $action = 'insert';
//     $description = "New record inserted into $table";
//     insertLog($action, $description);
// }

// // Function to update a record
// function updateRecord($table, $data, $where)
// {
//     global $dbh;
//     $set = '';
//     foreach ($data as $key => $value) {
//         $set .= $key . ' = :' . $key . ',';
//     }
//     $set = rtrim($set, ',');
//     $sql = "UPDATE $table SET $set WHERE $where";
//     $query = $dbh->prepare($sql);
//     foreach ($data as $key => $value) {
//         $query->bindValue(':' . $key, $value);
//     }
//     $query->execute();

//     // Log the activity
//     $action = 'update';
//     $description = "Record updated in $table";
//     insertLog($action, $description);
// }

// // Function to delete a record
// function deleteRecord($table, $where)
// {
//     global $dbh;
//     $sql = "DELETE FROM $table WHERE $where";
//     $query = $dbh->prepare($sql);
//     $query->execute();

//     // Log the activity
//     $action = 'delete';
//     $description = "Record deleted from $table";
//     insertLog($action, $description);
// }

// function getRecentActivity($staff_id) {
//     global $dbh;
//     $sql = "SELECT * FROM activity_logs WHERE staff_id = :staff_id AND date(date)=CURDATE()  ORDER BY date DESC LIMIT 7";
//     $query = $dbh->prepare($sql);
//     $query->bindParam(':staff_id', $staff_id, PDO::PARAM_INT);
//     $query->execute();
//     $logs = $query->fetchAll(PDO::FETCH_ASSOC);
//     return $logs;
// }


// SELECT * FROM logs
// WHERE DATE(date) = CURDATE()
// ORDER BY date DESC
// LIMIT 7;
// function log_actions($dbh, $action, $description, $staff_tb_id) {
//   $description = ''; // Default empty description
//   $staff_tb_id = $_SESSION['visaid'];
//   $ip = $_SERVER['REMOTE_ADDR'];
//   $date = date('Y-m-d H:i:s');
//   $url = $_SERVER['REQUEST_URI'];

//   // Determine the description based on the action
//   switch ($action) {
//     case 'login':
//       $description = 'User logged in';
//       break;
//     case 'logout':
//       $description = 'User logged out';
//       break;
//     case 'insert':
//       // Set $description to the ID of the newly inserted record
//       $description = 'New record inserted (id: ' . $dbh->lastInsertId($table_name) . ')';
//       break;
//     case 'update':
//       // Set $description to the ID of the updated record
//       $description = 'Record updated (id: ' . $staff_tb_id . ')';
//       break;
//     case 'delete':
//       // Set $description to the ID of the deleted record
//       $description = 'Record deleted (id: ' . $staff_tb_id . ')';
//       break;
//     default:
//       // Set $description to the action name if no specific description is provided
//       $description = ucfirst($action);
//   }

//   // Prepare and execute the SQL query to insert the log record
//   $sql = "INSERT INTO logs (date, action, description, ip, staff_tb_id) VALUES (:date, :action, :description, :ip, :staff_tb_id)";
//   $query = $dbh->prepare($sql);
//   $query->bindParam(':date', $date, PDO::PARAM_STR);
//   $query->bindParam(':action', $url, PDO::PARAM_STR);
//   $query->bindParam(':description', $description, PDO::PARAM_STR);
//   $query->bindParam(':ip', $ip, PDO::PARAM_STR);
//   $query->bindParam(':staff_tb_id', $staff_tb_id, PDO::PARAM_STR);
//   $query->execute();
// }



// // // Function to insert a log entry
// // function log_actiont($dbh, $action, $staff_tb_id, $record_id = null) {
// //     $ip = $_SERVER['REMOTE_ADDR'];
// //     $date = date('Y-m-d H:i:s');
//     $url = $_SERVER['REQUEST_URI'];
//     $description = '';

//     switch ($action) {
//         case 'login':
//             $description = 'User logged in';
//             break;
//         case 'logout':
//             $description = 'User logged out';
//             break;
//         case 'insert':
//             $description = 'New record inserted (id: ' . $record_id . ')';
//             break;
//         case 'update':
//             $description = 'Record updated (id: ' . $record_id . ')';
//             break;
//         case 'delete':
//             $description = 'Record deleted (id: ' . $record_id . ')';
//             break;
//         default:
//             $description = ucfirst($action);
//     }

//     $sql = "INSERT INTO logs (date, action, description, ip, staff_tb_id) VALUES (:date, :action, :description, :ip, :staff_tb_id)";
//     $query = $dbh->prepare($sql);
//     $query->bindParam(':date', $date, PDO::PARAM_STR);
//     $query->bindParam(':action', $url, PDO::PARAM_STR);
//     $query->bindParam(':description', $description, PDO::PARAM_STR);
//     $query->bindParam(':ip', $ip, PDO::PARAM_STR);
//     $query->bindParam(':staff_tb_id', $staff_tb_id, PDO::PARAM_STR);
//     $query->execute();
// }
// function logActivity($action, $description) {
//   $date = date('Y-m-d H:i:s');
//   $ip = $_SERVER['REMOTE_ADDR'];
//   $url = $_SERVER['REQUEST_URI'];
//   $user_id = $_SESSION['visaid']; // assuming you have a user ID stored in a session variable

//   // Prepare and execute the SQL query to insert the log record
//   $stmt = $dbh->prepare('INSERT INTO logs (date, action, description, ip, staff_tb_id) VALUES (?, ?, ?, ?, ?)');
//   $stmt->execute([$date, $url, $description . ' (id: ' . $user_id . ')', $ip, $user_id]);
// }




// // Function to insert a log entry
// function logs_action($dbh, $action, $description, $staff_tb_id) {
//     $ip = $_SERVER['REMOTE_ADDR'];
//     $staff_tb_id = $_SESSION['visaid'];
//     $date = date('Y-m-d H:i:s');
//     $url = $_SERVER['REQUEST_URI'];
//     $sql = "INSERT INTO logs (date, action, description, ip, staff_tb_id) VALUES (:date, :action, :description, :ip, :staff_tb_id)";
//     $query = $dbh->prepare($sql);
//     $query->bindParam(':date', $date, PDO::PARAM_STR);
//     $query->bindParam(':action', $url, PDO::PARAM_STR);
//     $query->bindParam(':description', $description, PDO::PARAM_STR);
//     $query->bindParam(':ip', $ip, PDO::PARAM_STR);
//     $query->bindParam(':staff_tb_id', $staff_tb_id, PDO::PARAM_STR);
//     $query->execute();
// }


?>
