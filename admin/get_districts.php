<?php
include("../includes/dbconnection.php");

// Check if the form has been submitted
if (isset($_POST['submit'])) {

    // Get the values from the form
    $region_id = $_POST['Regions'];
    $district_id = $_POST['districts'];

    // Retrieve the selected region name from the database
    $sql = "SELECT name FROM regions_tb WHERE id = $region_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $region_name = $row['name'];

    // Retrieve the selected district name from the database
    $sql = "SELECT name FROM districts_tb WHERE id = $district_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $district_name = $row['name'];

    // Display the selected region and district names
    //echo "You have selected region $region_name and district $district_name.";

    // Close the database connection
    mysqli_close($conn);
}
?>
