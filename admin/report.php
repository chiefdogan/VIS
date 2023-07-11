<?php
//includes the file for user permission
include("../includes/check_login.php");
check_login();



// handle search parameters
$search_type = $_GET['search_type'] ?? 'day';
$from_date = $_GET['from_date'] ?? date('Y-m-d');
$to_date = $_GET['to_date'] ?? date('Y-m-d');
if ($search_type === 'day') {
$from_date = $to_date;
}
elseif ($search_type === 'week') {
$from_date = date('Y-m-d', strtotime('last week', strtotime($to_date)));
}

// build query
$sql = "SELECT v.id as visit_id,v.card_no,v.time_in as time_in,v.time_out as time_out,v.to_whom as to_whom,v.address as address,v.id_number as idsNumber,v.visit_purpose as visit_purpose,v.idcategory as category, v.staff_id as staffID , v.visitor_id as visitorID, v.districts_id as districtsID, v.logs_id as logs, v.office_id as officeID, s.first_name, s.middle_name,s.last_name, s.mobile , i.name as cardName, d.name as districtName,b.email as email
FROM visit_tb v
LEFT JOIN visitor_tb s ON v.visitor_id = s.id
LEFT JOIN office_tb o ON v.office_id = o.id
LEFT JOIN idcategory_tb i ON v.idcategory = i.id
LEFT JOIN districts_tb d ON v.districts_id = d.id
LEFT JOIN staff_tb b ON v.staff_id = b.id
WHERE v.time_in BETWEEN '$from_date 00:00:00' AND '$to_date 23:59:59'
ORDER BY v.time_in DESC";
$result = mysqli_query($conn, $sql);

// close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<?php @include("../includes/head.php");?>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
<?php @include("../includes/sidebar.php");?>
</div>
<!-- /Sidebar -->

<!-- Page Wrapper -->
<div class="page-wrapper">

<!-- Page Content -->
<div class="content container-fluid">

<!-- Page Header -->
<div class="page-header">
<div class="row
">
<div class="col-sm-12">
<h3 class="page-title">Visitor Report</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="../dashboard.php">Dashboard</a></li>
<li class="breadcrumb-item active">Visitor Report</li>
</ul>
</div>
</div>
</div>
<!-- /Page Header -->

<!-- Search Form -->
<div class="row filter-row">
<div class="col-sm-6 col-md-3">  
<div class="form-group">
<label>Search Type</label>
<select class="select floating" name="search_type" id="search_type">
<option value="day" <?php if($search_type === 'day') { echo 'selected'; } ?>>Day</option>
<option value="week" <?php if($search_type === 'week') { echo 'selected'; } ?>>Week</option>
</select>
</div>
</div>
<div class="col-sm-6 col-md-3">  
<div class="form-group">
<label>From Date</label>
<input type="date" class="form-control" name="from_date" id="from_date" value="<?php echo $from_date; ?>">
</div>
</div>
<div class="col-sm-6 col-md-3">  
<div class="form-group">
<label>To Date</label>
<input type="date" class="form-control" name="to_date" id="to_date" value="<?php echo $to_date; ?>">
</div>
</div>
<div class="col-sm-6 col-md-3">  
<div class="form-group">
<button type="button" class="col-sm-6 col-md-3" onclick="searchLogs()">Search</button>
</div>
</div>
</div>
<!-- /Search Form -->

<!-- Visitor Logs Table -->
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0" id="example">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Card Number</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>To Whom</th>
                        <th>Address</th>
                        <th>ID Number</th>
                        <th>Visit Purpose</th>
                        <th>Category</th>
                        <th>Staff ID</th>
                        <th>Visitor ID</th>
                        <th>Districts ID</th>
                        <th>Logs</th>
                        <th>Office ID</th>
                        <th>Staff Name</th>
                        <th>Mobile</th>
                        <th>Card Name</th>
                        <th>District Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row['visit_id']; ?></td>
                                <td><?php echo $row['card_no']; ?></td>
                                <td><?php echo $row['time_in']; ?></td>
                                <td><?php echo $row['time_out']; ?></td>
                                <td><?php echo $row['to_whom']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['idsNumber']; ?></td>
                                <td><?php echo $row['visit_purpose']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td><?php echo $row['staffID']; ?></td>
                                <td><?php echo $row['visitorID']; ?></td>
                                <td><?php echo $row['districtsID']; ?></td>
                                <td><?php echo $row['logs']; ?></td>
                                <td><?php echo $row['officeID']; ?></td>
                                <td><?php echo $row['first_name'].' '.$row['middle_name'].' '.$row['last_name']; ?></td>
                                <td><?php echo $row['mobile']; ?></td>
                                <td><?php echo $row['cardName']; ?></td>
                                <td><?php echo $row['districtName']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="19">No records found</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


</tbody>
</table>
</div>
</div>
</div>
<!-- /Visitor Logs Table -->
<footer class="footer">
<div class="container">
<div class="row">
<div class="col-md-6">

</div>
<div class="col-md-6">
<ul class="list-inline">
<li class="list-inline-item"><a href="#">&copy; 2023 Visitor Tbs</a></li>
<li class="list-inline-item"><a href="terms.php">Terms of Use</a></li>
</ul>
</div>
</div>
</div>
</footer>


<!-- jQuery -->
<script src="../assets/js/jquery-3.2.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>

<!-- Slimscroll JS -->
<script src="../assets/js/jquery.slimscroll.min.js"></script>

<!-- Select2 JS -->
<script src="../assets/js/select2.min.js"></script>

<!-- Datatable JS -->
<script src="../assets/js/jquery.dataTables.min.js"></script>
<script src="../assets/js/dataTables.bootstrap4.min.js"></script>

<!-- Datetimepicker JS -->
<script src="../assets/js/moment.min.js"></script>
<script src="../assets/js/bootstrap-datetimepicker.min.js"></script>

<!-- Custom JS -->
<script src="../assets/js/app.js"></script>
<script type="text/javascript" class="init">

$(document).ready(function() {
    $('#example').DataTable( {
       
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ]
    } );
} );



    </script>


</body>
</html>
<script type="text/javascript">
   $(document).ready(function () {
  $('.datatable-report').DataTable({
    buttons: [
      'copy', 'excel', 'pdf', 'print'
    ]
  });
});

</script>
<script type="text/javascript">
    $('#example').DataTable( {
    buttons: [
        {
            extend: 'excel',
            text: 'Save current page',
            exportOptions: {
                modifier: {
                    page: 'current'
                }
            }
        }
    ]
} );

</script>



<script>
function searchLogs() {
var search_type = $('#search_type').val();
var from_date = $('#from_date').val();
var to_date = $('#to_date').val();

window.location.href = 'report.php?search_type=' + search_type + '&from_date=' + from_date + '&to_date=' + to_date;
}
</script>
