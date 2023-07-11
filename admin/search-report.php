<?php
// Database connection
include('../includes/dbconnection.php');

// include("../includes/check_login.php");
// check_login();

// error_reporting(0);

// Search query
if(isset($_POST['search'])) {
  $from_date = $_POST['from_date'];
  $to_date = $_POST['to_date'];
  
  $query = "SELECT v.id as visit_id,v.card_no,v.time_in,v.time_out,v.to_whom,v.address,v.id_number as idsNumber,v.visit_purpose,v.idcategory as category, v.staff_id as staffID , v.visitor_id as visitorID, v.districts_id as districtsID, v.logs_id as logs, v.office_id as officeID, s.first_name, s.middle_name,s.last_name, s.mobile , i.name as cardName, d.name as districtName, s.id as visitorIDs , o.name as officeName
            FROM visit_tb v
            LEFT JOIN visitor_tb s ON v.visitor_id = s.id
            LEFT JOIN office_tb o ON v.office_id = o.id
            LEFT JOIN idcategory_tb i ON v.idcategory = i.id
            LEFT JOIN staff_tb b ON v.staff_id = b.id
            LEFT JOIN districts_tb d ON v.districts_id = d.id
            WHERE v.time_in BETWEEN '$from_date' AND '$to_date'";
  
  $result = mysqli_query($conn, $query);
}
?>

<!-- Search Filter -->
<form method="POST" action="search.php">
  <div class="row filter-row">
    <div class="col-sm-6 col-md-3">  
      <div class="form-group form-focus">
        <div class="cal-icon">
          <input class="form-control floating datetimepicker" type="text" name="from_date">
        </div>
        <label class="focus-label">From</label>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">  
      <div class="form-group form-focus">
        <div class="cal-icon">
          <input class="form-control floating datetimepicker" type="text" name="to_date">
        </div>
        <label class="focus-label">To</label>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">  
      <button type="submit" class="btn btn-success btn-block" name="search"> Search </button>  
    </div>     
  </div>
</form>
<!-- /Search Filter -->

<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">
      <table class="table table-striped custom-table mb-0 datatable98" id="kaguareport">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th class="d-none d-sm-table-cell">Purpose</th>
            <th>Tbs-n0</th>
            <th>To</th>
            <th>Address</th>
            <th>Card</th>
            <th>Id-n0</th>
            <th>TimeIN</th>
            <th>TimeOUT</th>
            <th>Signed By</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if(mysqli_num_rows($result) > 0) {
            $counter = 1;
            while($row = mysqli_fetch_assoc($result

)) {
$visitor_name = $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'];
$visitor_mobile = $row['mobile'];
$visit_purpose = $row['visit_purpose'];
$card_no = $row['card_no'];
$to_whom = $row['to_whom'];
$address = $row['address'];
$card_name = $row['cardName'];
$ids_number = $row['idsNumber'];
$time_in = date('d/m/Y h:i A', strtotime($row['time_in']));
$time_out = date('d/m/Y h:i A', strtotime($row['time_out']));
$signed_by = $row['visitorIDs'];

          echo "<tr>";
          echo "<td>".$counter."</td>";
          echo "<td>".$visitor_name."<br/><small>".$visitor_mobile."</small></td>";
          echo "<td class='d-none d-sm-table-cell'>".$visit_purpose."</td>";
          echo "<td>".$card_no."</td>";
          echo "<td>".$to_whom."</td>";
          echo "<td>".$address."</td>";
          echo "<td>".$card_name."</td>";
          echo "<td>".$ids_number."</td>";
          echo "<td>".$time_in."</td>";
          echo "<td>".$time_out."</td>";
          echo "<td>".$signed_by."</td>";
          echo "</tr>";

          $counter++;
        }
      } else {
        echo "<tr><td colspan='11'>No results found</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>
  </div>
</div>