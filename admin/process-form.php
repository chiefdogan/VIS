<?php
include("../includes/check_login.php");

if (isset($_POST['addvisitor'])) {
    // Retrieve data from the form
    $firstName = $_POST['fname'];
    $middleName = $_POST['mname'];
    $lastName = $_POST['lname'];
    $mobileNumber = $_POST['mobileNumber'];
    $districts = $_POST['districts'];
    $address = $_POST['Address'];
    $toWhom = $_POST['toWhom'];
    $visit_purpose = $_POST['Purpose'];
    $office = $_POST['office'];
    $ids_type = $_POST['ids_name'];
    $id_number = $_POST['idnumber'];
    $tbs_card_number = $_POST['tbs_card'];
    $staff_id = $_SESSION['visaid'];

    // Insert visitor data into visitor_tb
    $sql = "INSERT INTO visitor_tb (first_name, middle_name, last_name, mobile)
            VALUES ('$firstName', '$middleName', '$lastName', '$mobileNumber')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Get the visitor ID for the new record
        $visitorId = mysqli_insert_id($conn);

        // Insert visit data into visit_tb
        $sql = "INSERT INTO visit_tb (card_no, to_whom, address, id_number, visit_purpose, idcategory, staff_id, visitor_id, districts_id, office_id)
                VALUES ('$tbs_card_number', '$toWhom', '$address', '$id_number', '$visit_purpose', '$ids_type', '$staff_id', '$visitorId', '$districts', '$office')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $url = $_SERVER['REQUEST_URI'];
            $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
            $action = 'insert';
            $ip = $_SERVER['REMOTE_ADDR'];
            $user_id = $_SESSION['visaid'];
            $record_id = $visitorId;
            logActivity66($dbh, $url, $referrer, $action, $ip, $user_id, $record_id);

            echo "<script>alert('Success: Visitor Registered Successfully.');document.location ='visitors.php';</script>";
        } else {
            echo "<script>alert('Error: Failed to Register Visitor.');document.location ='visitors.php';</script>";
        }
    } else {
        echo "<script>alert('Error: Failed to Register Visitor on the first query.');document.location ='visitors.php';</script>";
    }
}
?>
