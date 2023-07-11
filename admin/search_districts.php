<?php
  include('../includes/dbconnection.php');

  // Retrieve search term from AJAX call
  $searchTerm = $_GET['q'];

  // Query to retrieve filtered data from the database
  $sql = "SELECT * FROM districts_tb WHERE name LIKE '%".$searchTerm."%' ";

  // Execute query
  $result = mysqli_query($conn, $sql);

  // Format data into JSON
  $data = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = array(
      'id' => $row['id'],
      'text' => $row['name']
    );
  }

  // Close connection
  mysqli_close($conn);

  // Return data as JSON
  header('Content-Type: application/json');
  echo json_encode($data);
?>
