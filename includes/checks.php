<!DOCTYPE html>  
<html>  
    <head>  
        <title>Login Modal Popup After Session Timeout in PHP using Ajax</title> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <style>  
        #box  
        {  
            width:600px;
            color:white;  
            margin:0 auto;  
            padding:10px;  
            text-align:center;  
        }  
        </style>  
    </head>  
    <body>
 <br />

    <?php  
    session_start();  
    if(isset($_SESSION["visaid"]))
    {  
  echo "<h1 align='center'>Login Modal Popup After Session Timeout in PHP using Ajax</h1>";
        echo "<h1 align='center'>".$_SESSION["visaid"]."</h1>";  
        echo "<p align='center'><a href='logout.php'>Logout</a></p>";  
    }  
    else  
    {  
        header('location:login.php');  
    }  
    ?>  
    </body>  
</html>

<div class="modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog modal-sm">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title">Session Expired Login Again</h4>
   </div>
   <div class="modal-body">
    <form method="post" id="login_form">  
     <input type="text" name="email" placeholder="Enter Email" class="form-control" required /><br />  
     <input type="password" name="password" placeholder="Enter Password" class="form-control" required /><br />  
     <input type="submit" name="submit" id="submit" class="btn btn-info" value="Login" />  
    </form>
   </div>
  </div>
    </div>
</div>

<script>  
$(document).ready(function(){
 
 var is_session_expired = 'no';
    function check_session()
    {
        $.ajax({
            url:"check_session.php",
            method:"POST",
            success:function(data)
            {
    if(data == '1')
    {
     $('#loginModal').modal({
      backdrop: 'static',
      keyboard: false,
     });
     is_session_expired = 'yes';
    }
   }
        })
    }
 
 var count_interval = setInterval(function(){
        check_session();
  if(is_session_expired == 'yes')
  {
   clearInterval(count_interval);
  }
    }, 10000);
 
 $('#login_form').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"check_login.php",
   method:"POST",
   data:$(this).serialize(),
   success:function(data){
    if(data != '')
    {
     $('#error_message').html(data);
    }
    else
    {
     location.reload();
    }
   }
  });
 });

});  
</script>