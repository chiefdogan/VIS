<?php
// include the database functions file
require_once('database.php');

// call the insert function with the appropriate table name and data
insert('users', ['name' => 'John', 'email' => 'john@example.com']);

// call the update function with the appropriate table name, data, and ID
update('users', ['name' => 'Jane'], 1);

// call the delete function with the appropriate table name and ID
delete('users', 2);

// call the create function with the appropriate table name and column definitions
create('users', [
  'id' => 'INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY',
  'name' => 'VARCHAR(255) NOT NULL',
  'email' => 'VARCHAR(255) NOT NULL'
]);
?>

<?php
// database functions

function connect() {
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'visitor_db';
  $dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";
  $options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
  ];
  try {
    $pdo = new PDO($dsn, $user, $password, $options);
  } catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
  }
  return $pdo;
}

function insert($table, $data) {
  $pdo = connect();
  $columns = implode(', ', array_keys($data));
  $placeholders = implode(', ', array_fill(0, count($data), '?'));
  $values = array_values($data);
  $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute($values);
}

function update($table, $data, $id) {
  $pdo = connect();
  $set = implode('=?, ', array_keys($data)) . '=?';
  $values = array_values($data);
  $values[] = $id;
  $sql = "UPDATE $table SET $set WHERE id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute($values);
}

function delete($table, $id) {
  $pdo = connect();
  $sql = "DELETE FROM $table WHERE id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$id]);
}

function create($table, $columns) {
  $pdo = connect();
  $definitions = [];
  foreach ($columns as $column => $definition) {
    $definitions[] = "$column $definition";
  }
  $definition_string = implode(', ', $definitions);
  $sql = "CREATE TABLE $table ($definition_string)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
}
?>