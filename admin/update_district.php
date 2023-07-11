<?php
//077fd57e57aab32087b0466fe6ebcca8
include('../includes/check_login.php');
if(isset($_POST['saveupdates']))
{

  $districts_id = $_POST['districts_id'];
  $regions_id = $_POST['regions_id'];
  $update_districts=$_POST['update_districts'];
  $sql4="update districts_tb set name=:update_districts,regions_id=:regions_id where id=:districts_id";
  $query4 = $dbh->prepare($sql4);
  $query4->bindParam(':update_districts',$update_districts,PDO::PARAM_STR);
  $query4->bindParam(':regions_id',$regions_id,PDO::PARAM_STR);
  $query4->bindParam(':districts_id',$districts_id,PDO::PARAM_STR);
  $query4->execute();
  if ($query4->execute()){
    $url = $_SERVER['REQUEST_URI'];
        $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        $action = 'update';
        $ip = $_SERVER['REMOTE_ADDR'];
        $user_id = $_SESSION['visaid'];
        $record_id = $districts_id;
        logActivity66($dbh, $url, $referrer, $action, $ip, $user_id, $record_id);
    echo '<script>alert("District has been updated")</script>';
    echo "<script type='text/javascript'> document.location = 'districts.php'; </script>";
  }
  else
  {
    echo '<script>alert("update failed! try again later")</script>';
     echo "<script type='text/javascript'> document.location = 'districts.php'; </script>";
  }

}

?>