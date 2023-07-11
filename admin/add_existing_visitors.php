<?php 
//include('../includes/dbconnection.php');

include("../includes/check_login.php");
//check_login();

error_reporting(0);

if (isset($_POST['addvisitors'])) { 

    $staff_id = $_SESSION['visaid'];
    $visitorId =$_GET['visitor_ID'];
    $districts = $_POST['districts'];
    $address=$_POST['Address'];
    $toWhom = $_POST['toWhom'];
    $visit_purpose = $_POST['Purpose'];
    $office = $_POST['office'];
    $ids_type = $_POST['ids_name'];
    $id_number = $_POST['idnumber'];
    $tbs_card_number = $_POST['tbs_card'];

                // Insert visit data into visit_tb
    $sql = "INSERT INTO visit_tb (card_no,to_whom,address,id_number,visit_purpose,idcategory,staff_id,visitor_id,districts_id,office_id)
    VALUES ('$tbs_card_number','$toWhom','$address','$id_number','$visit_purpose','$ids_type','$staff_id','$visitorId', '$districts', '$office')";
    $result = mysqli_query($conn, $sql);
    if($result){
        $url = $_SERVER['REQUEST_URI'];
        $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        $action = 'insert';
        $ip = $_SERVER['REMOTE_ADDR'];
        $user_id = $staffid;
        $record_id = $visitor_Id;
        logActivity66($dbh, $url, $referrer, $action, $ip, $user_id, $record_id);

        echo "<script>alert('Success: Visitor Registered Successfully.');document.location ='visitors.php';</script>";

    }
    else 
    {

     echo "<script>alert('Error: Failed to Register Visitor.');document.location ='visitors.php';</script>";
 }

}
