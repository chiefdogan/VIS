<?php

//includes the file for user permission
include("../includes/check_login.php");
check_login();



?>
<?php @include("../includes/head.php");?>   

<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
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
                if($row->designation_id=="1")
                { 
                   echo "<script type='text/javascript'>alert('Your logged in');document.location ='index.php'; </script>";

                      //$_SESSION['visaid']=time() + 180;  

                   //echo "<script type='text/javascript'>alert('Your logged in');document.location ='admin/index.php'; </script>";          
                } 

                elseif($row->designation_id=="2")
                { 
                    echo "<script>
                    alert('Your logged in');document.location ='users-dashboard.php';
                    </script>";
                  
                }
                elseif($row->designation_id=="3")
                { 
                    echo "<script>
                    alert('Your logged in');document.location ='users-dashboard.php';
                    </script>";
                    
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



<!-- HTML code for the Bootstrap popup form -->
<div class="modal" id="session-expired-popup">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Session Expired</h5>
      </div>
      <div class="modal-body">
        <p>Your session has expired. Please enter your login details again to continue.</p>
        <form id="" enctype="multipart/form-data"  method="post">
          <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username">
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <button type="submit" class="btn btn-primary" name="login">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript code to show the popup form when the session expires -->
<script>
  // Check if the session has expired every second
  setInterval(function() {
    if (<?php echo time(); ?> >= <?php echo $_SESSION['visaid']; ?>) {
      // Show the popup form
      $('#session-expired-popup').modal('show');
      // Disable all links and buttons on the page
      $('a, button').attr('disabled', false);
    }
  }, 1000);
</script>
<?php @include("../includes/foot.php");?>