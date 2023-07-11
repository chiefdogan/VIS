<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/logger.php');
if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $sql ="SELECT * FROM staff_tb WHERE email=:username and password=:password";
    $query=$dbh->prepare($sql);
    $query-> bindParam(':username', $username, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {
        foreach ($results as $result) 
        {
            $_SESSION['visaid']=$result->id;
            $_SESSION['login']=$result->username;
            $_SESSION['names']=$result->first_name;
            $_SESSION['emailid']=$result->email;
            $_SESSION['permission']=$result->designation_id;
            $get=$result->designation_id;
            $url = $_SERVER['REQUEST_URI'];
            $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
            $user_id = $result->id;

          // get the record ID and action
            $record_id = $result->id; // replace with the ID of the affected record
            $action = 'login'; // replace with the action performed (insert, update, or delete)
                  }




                  $aa= $_SESSION['visaid'];
                  $sql="SELECT * from staff_tb  where id=:aa";
                  $query = $dbh -> prepare($sql);
                  $query->bindParam(':aa',$aa,PDO::PARAM_STR);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $cnt=1;
                  if($query->rowCount() > 0)
                  {
                    foreach($results as $row)
                    {            
                        if($row->designation_id=="1" && $row->status=="1")
                        { 

                         echo "<script>
                         alert('Your logged in');document.location ='admin/index.php';
                         </script>";     



                         logActivity6($dbh,$url, $referrer, $action, $_SERVER['REMOTE_ADDR'], $user_id, $record_id);



                     } 

                     elseif($row->designation_id=="2" && $row->status=="1")
                     { 
                        echo "<script>
                        alert('Your logged in');document.location ='admin/users-dashboard.php';
                        </script>";

                        logActivity6($dbh,$url, $referrer, $action, $_SERVER['REMOTE_ADDR'], $user_id, $record_id);

                    }
                    elseif($row->designation_id=="3" && $row->status=="1")
                    { 
                        echo "<script>
                        alert('Your logged in');document.location ='admin/users-dashboard.php';
                        </script>";

                        logActivity6($dbh,$url, $referrer, $action, $_SERVER['REMOTE_ADDR'], $user_id, $record_id);

                    }
                } 
            } 
        } 
        else
        {
            echo "<script>alert('Invalid Details');</script>";
        }
    }


    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
        <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Login - VIS</title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/logoo.png">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">

    </head>

    <body class="account-page">
      <!-- Main Wrapper -->
      <div class="main-wrapper">
        <!-- Loader -->
        <div id="loader-wrapper">
            <div id="loader">
               <div class="loader-ellips">
                 <span class="loader-ellips__dot"></span>
                 <span class="loader-ellips__dot"></span>
                 <span class="loader-ellips__dot"></span>
                 <span class="loader-ellips__dot"></span>
             </div>
         </div>
     </div>
     <!-- /Loader -->




     <div class="account-content">

        <div class="container">

           <!-- Account Logo -->
           <div class="account-logo">
              <a href="index.php"><img src="assets/img/logoo.png" alt="Tbs Vis"></a>
          </div>
          <!-- /Account Logo -->

          <div class="account-box">
              <div class="account-wrapper">
                 <h3 class="account-title">Login</h3>
                 <p class="account-subtitle">Access to our dashboard</p>

                 <!-- Account Form -->

                 <form  method="post" id="" enctype="multipart/form-data" >
                    <div class="form-group">
                       <label>Email Address</label>
                       <input class="form-control" type="text" placeholder="Your Email" name="username">
                   </div>
                   <div class="form-group">
                       <div class="row">
                          <div class="col">
                             <label>Password</label>
                         </div>
                         <!-- <div class="col-auto">
                             <a class="text-muted" href="forgot-password.php">
                                Forgot password?
                            </a>
                        </div> -->
                    </div>
                    <input class="form-control" type="password" name="password" placeholder="Your password"> <small id="emailHelp" class="form-text text-muted" style="font-style: italic;">never share your Password with anyone else.</small>
                </div>
                <div class="form-group text-center">
                   <button class="btn btn-primary account-btn" type="submit" name="login">Login</button>
               </div>
               <!-- <div class="account-footer">
                   <p>Don't have an account yet? <a href="register.php">Register</a></p>
               </div> -->
           </form>
           <!-- /Account Form -->

       </div>
   </div>
</div>
</div>
</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="assets/js/jquery-3.2.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Custom JS -->
<script src="assets/js/app.js"></script>

</body>
</html>