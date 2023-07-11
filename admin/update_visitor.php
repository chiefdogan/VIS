<?php 
//include('../includes/dbconnection.php');

include("../includes/check_login.php");
check_login();

// Retrieve the user ID from the session variable

$staff_id = $_SESSION['visaid'];
error_reporting(0);
if(isset($_POST['updateVisitor'])) {
   
    $visitorId = $_POST['visitorId'];
    $_SESSION['visaid'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $mobile = $_POST['mobileNumber'];
    $district = $_POST['districts'];
    $address = $_POST['address'];
    $toWhom = $_POST['toWhom'];
    $visitPurpose = $_POST['visit_purpose'];
    $officeId = $_POST['office_id'];
    $idsName = $_POST['ids_name'];
    $idNumber = $_POST['id_number'];
     $_POST['tbs_card'];


    // Update data in visitor_tb
    $stmt = mysqli_prepare($conn, "UPDATE visitor_tb SET first_name=?, middle_name=?, last_name=?, mobile=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "ssssi", $fname, $mname, $lname, $mobile, $visitorId);
    mysqli_stmt_execute($stmt);
      $visitorID = mysqli_insert_id($conn);

    // Update data in visit_tb
    $stmt = mysqli_prepare($conn, "UPDATE visit_tb SET card_no=?,time_in=?, time_out=?, to_whom=?, address=?, id_number=?, visit_purpose=?, idcategory=?, staff_id=?, visitor_id=?, districts_id=?, office_id=? WHERE visitor_id=?");
    mysqli_stmt_bind_param($stmt, "sssssssiiiiii",$_POST['tbs_card'], $_POST['time_in'], $_POST['time_out'], $toWhom, $address, $idNumber, $visitPurpose, $idsName, $_SESSION['visaid'], $visitorId, $district, $officeId, $visitorId);
    mysqli_stmt_execute($stmt);

// // check if the form is submitted
// if(isset($_POST['updateVisitor'])) {

//     $visitorId = $_POST['visitorId'];
//     $_SESSION['visaid'];
//     $fname = $_POST['fname'];
//     $mname = $_POST['mname'];
//     $lname = $_POST['lname'];
//     $mobile = $_POST['mobileNumber'];
//     $district = $_POST['districts'];
//     $address=$_POST['address'];
//     $_POST['toWhom'];
//     $_POST['visit_purpose'];
//     $_POST['office_id'];
//     $_POST['ids_name'];
//     $_POST['id_number'];


// // update data in the visitor_tb
//     $sql = "UPDATE visitor_tb SET first_name=:fname, middle_name=:mname, last_name=:lname, mobile=:mobile WHERE id=:visitorId";
//     $query = $dbh->prepare($sql);
//     $query->bindParam(':fname', $fname, PDO::PARAM_STR);
//     $query->bindParam(':mname', $mname, PDO::PARAM_STR);
//     $query->bindParam(':lname', $lname, PDO::PARAM_STR);
//     $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
//     $query->bindParam(':visitorId', $visitorId, PDO::PARAM_INT);
//     $query->execute();

// // get the last updated ID from visitor_tb
//     $lastVisitorId = $dbh->lastInsertId();

// // update data in the visit_tb
//     $sql = "UPDATE visit_tb SET time_in=:time_in, time_out=:time_out, to_whom=:to_whom, address=:address, id_number=:id_number, visit_purpose=:visit_purpose, idcategory=:idcategory, staff_id=:staff_id, visitor_id=:visitor_id, districts_id=:districts_id,office_id=:office_id WHERE visitor_id=:lastVisitorId";
//     $query = $dbh->prepare($sql);
//     $query->bindParam(':time_in', $_POST['time_in'], PDO::PARAM_STR);
//     $query->bindParam(':time_out', $_POST['time_out'], PDO::PARAM_STR);
//     $query->bindParam(':to_whom', $_POST['to_whom'], PDO::PARAM_STR);
//     $query->bindParam(':address', $_POST['address'], PDO::PARAM_STR);
//     $query->bindParam(':id_number', $_POST['id_number'], PDO::PARAM_STR);
//     $query->bindParam(':visit_purpose', $_POST['visit_purpose'], PDO::PARAM_STR);
//     $query->bindParam(':idcategory', $_POST['ids_name'], PDO::PARAM_INT);
//     $query->bindParam(':staff_id', $_SESSION['visaid'], PDO::PARAM_INT);
//     $query->bindParam(':visitor_id', $lastVisitorId, PDO::PARAM_INT);
//     $query->bindParam(':districts_id', $_POST['districts'], PDO::PARAM_INT);
//     $query->bindParam(':office_id', $_POST['office_id'], PDO::PARAM_INT);
//     $query->bindParam(':visitorId', $lastVisitorId, PDO::PARAM_INT);
//     $query->execute();
    if($stmt){
        $url = $_SERVER['REQUEST_URI'];
        $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        $action = 'update';
        $ip = $_SERVER['REMOTE_ADDR'];
        $user_id = $_SESSION['visaid'];
        $record_id = $visitorId;
        logActivity66($dbh, $url, $referrer, $action, $ip, $user_id, $record_id);

        echo "<script>alert('Success: Visitor updated Successfully.');document.location ='edit_visitor.php';</script>";

    }
    else{

        echo "<script>alert('Error: Failed to Register Visitor.');document.location ='edit_visitor.php';</script>";
    }

}
else{

    echo "<script>alert('Error: Failed to update Visitor on the first query.');document.location ='edit_visitor.php';</script>";

}



