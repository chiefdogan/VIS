<?php
//include('../includes/dbconnection.php');

include("../includes/check_login.php");
check_login();

// Retrieve the user ID from the session variable
$user_id = $_SESSION['visaid'];

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  // Check if a file was uploaded
  if (!empty($_FILES['imageUpdated']['name'])) {
    
    // Get the uploaded file information
    $file_name = $_FILES['imageUpdated']['name'];
    $file_size = $_FILES['imageUpdated']['size'];
    $file_tmp = $_FILES['imageUpdated']['tmp_name'];
    $file_type = $_FILES['imageUpdated']['type'];
   // $file_ext = strtolower(end(explode('.', $file_name)));
    $file_parts = explode('.', $file_name);
$file_ext = strtolower(end($file_parts));

    
    // Define allowed file extensions
    $extensions = array("jpeg", "jpg", "png");
    
    // Check if the file has an allowed extension
    if (in_array($file_ext, $extensions) === false) {

      echo "<script>alert('Error: File extension not allowed, please choose a JPEG, JPG, or PNG file..');document.location ='profile.php';</script>";

    } 
    else {
      
      // Define the directory where the uploaded file will be stored
      $upload_dir = "../profileimages/";
      
      // Generate a unique name for the uploaded file
      $new_file_name = $user_id . "." . $file_ext;
      
      // Move the uploaded file to the desired directory
      if (move_uploaded_file($file_tmp, $upload_dir . $new_file_name)) {
        
        // Update the user's photo in your database
        // Example SQL query (replace with your own code)
        $sql = "UPDATE staff_tb SET photo = '$new_file_name' WHERE id = '$user_id'";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
          echo "<script>alert('Success: Profile photo updated.');document.location ='profile.php';</script>";
          // Update the record

          // Log the activity with the updated record ID
          logActivity('update', 'Record updated', $user_id);


          
        } 
        else {
           echo "<script>alert('Error: Could not update profile photo.');document.location ='profile.php';</script>";
         
        }
        
      } 
      else {
        echo "<script>alert('Error: File upload failed.');document.location ='profile.php';</script>";

      }
      
    }
    
  } 
  else {
     echo "<script>alert('Error: Please choose a file to upload.');document.location ='profile.php';</script>";
 
  }
  
} 
else {
  // Redirect the user back to the profile page or display an error message
  header('Location: profile.php');
}



?>
