<?php
include('includes/dbconnection.php');

//session will be started here
session_start();

// Check if the login form has been submitted

if (isset($_POST['username']) && isset($_POST['password'])) {
    // Get the user credentials from the form
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    //$password = $_POST['password'];


    // Check if the user exists in the database

    $sql = "SELECT * FROM staff_tb WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {

        // if Login successful

        $row = mysqli_fetch_assoc($result);

        $_SESSION['emailid'] = $row['email'];

        $_SESSION['designation_id'] = $row['designation_id'];

        

        //echo"Login Successfuly Your Welcome";
        //header('Location: admin/index.php');

                                        } 

   /* else 
       {
        // if  Login failed

        echo "<script>
                    alert('Something went wrong Please Try Again');document.location ='index.php';
              </script>";
        }

       mysqli_stmt_close($stmt);
        }

        //colse the mysqli connection
        mysqli_close($conn);
*/

    if($row['designation_id']=='1'){
                
                header('Location: admin/index.php');
                exit();
                                   }

        elseif ($row['designation_id']=='2') {
                header("Location: users/user-dashboard.php");
                exit();
                                   }

        elseif ($row['designation_id']=='3') {
                header("Location: reporting/index.php");
                exit();
                                   }
                                  

        else
                                   {

               header("Location: admin/error-500.php");

    exit();
     
}
}
        

?>