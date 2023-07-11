<?
function log_actions($dbh, $action, $table_name) {
  $description = ''; // Default empty description
  $staff_tb_id = $_SESSION['visaid'];
  $ip = $_SERVER['REMOTE_ADDR'];
  $date = date('Y-m-d H:i:s');
  $url = $_SERVER['REQUEST_URI'];

  // Determine the description based on the action
  switch ($action) {
    case 'login':
      $description = 'User logged in';
      break;
    case 'logout':
      $description = 'User logged out';
      break;
    case 'insert':
      // Set $description to the ID of the newly inserted record
      $description = 'New record inserted (ID: ' . $dbh->lastInsertId($table_name) . ')';
      break;
    case 'update':
      // Set $description to the ID of the updated record
      $description = 'Record updated (ID: ' . $staff_tb_id . ')';
      break;
    case 'delete':
      // Set $description to the ID of the deleted record
      $description = 'Record deleted (ID: ' . $staff_tb_id . ')';
      break;
    default:
      // Set $description to the action name if no specific description is provided
      $description = ucfirst($action);
  }

  // Prepare and execute the SQL query to insert the log record
  $sql = "INSERT INTO logs (date, action, description, ip, staff_tb_id) VALUES (:date, :action, :description, :ip, :staff_tb_id)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':date', $date, PDO::PARAM_STR);
  $query->bindParam(':action', $url, PDO::PARAM_STR);
  $query->bindParam(':description', $description, PDO::PARAM_STR);
  $query->bindParam(':ip', $ip, PDO::PARAM_STR);
  $query->bindParam(':staff_tb_id', $staff_tb_id, PDO::PARAM_STR);
  $query->execute();
}
