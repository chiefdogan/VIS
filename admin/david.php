<?php

//includes the file for user permission
include("../includes/check_login.php");
check_login();



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
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Visitor Report</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Visitor Report</li>
					</ul>
				</div>
<!-- <div class="col-auto float-right ml-auto">
	<div class="btn-group btn-group-sm">
		<button class="btn btn-white">PDF</button>
		<button class="btn btn-white"><i class="fa fa-print fa-lg"></i> Print</button>
	</div>
</div> -->


</div>
</div>
<!-- /Page Header -->
<!-- Search Filter -->
<form method="POST" action="david.php">
	<div class="row filter-row">
		<div class="col-sm-6 col-md-3"> 
			<div class="form-group form-focus select-focus">
				<select class="select floating" name="office_id"> 
					<option value="all">All Offices</option>
					<?php
					include('../includes/dbconnection.php');
				// Query to retrieve data from the database
				$sql = "SELECT * FROM office_tb WHERE status='1'";

				// Execute query
				$result = mysqli_query($conn, $sql);

				// Display retrieved data in dropdown menu
				while ($row = mysqli_fetch_assoc($result)) {

					echo "<option value='".$row["id"]."'>".$row["name"]."</option>";

				}

				// Close connection
				//mysqli_close($conn);
				?>
			</select>
			<label class="focus-label">View By Office</label>
		</div>
	</div>
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
<?php


if(isset($_POST['search'])) {
	$date_from = $_POST['from_date'];
	$date_to= $_POST['to_date'];

	$to_date_ = date_create(str_replace( '/','-',$date_to));
	$to_date = date_format($to_date_,'Y-m-d H:s:i');

	$from_date_ = date_create(str_replace( '/','-',$date_from));
	$from_date = date_format($from_date_,'Y-m-d H:s:i');
	
	$office_id = $_POST['office_id'];

$query = "SELECT v.id as visit_id,v.card_no,v.time_in,v.time_out,v.to_whom,v.address,v.id_number as idsNumber,v.visit_purpose,v.idcategory as category, v.staff_id as staffID , v.visitor_id as visitorID, v.districts_id as districtsID, v.logs_id as logs, v.office_id as officeID, s.first_name, s.middle_name,s.last_name, s.mobile , i.name as cardName, d.name as districtName, s.id as visitorIDs , o.name as officeName,b.first_name as staff_name, b.last_name as staff_name
FROM visit_tb v
LEFT JOIN visitor_tb s ON v.visitor_id = s.id
LEFT JOIN office_tb o ON v.office_id = o.id
LEFT JOIN idcategory_tb i ON v.idcategory = i.id
LEFT JOIN staff_tb b ON v.staff_id = b.id
LEFT JOIN districts_tb d ON v.districts_id = d.id
WHERE v.time_in BETWEEN '$from_date' AND '$to_date'";

//WHERE v.time_in BETWEEN '$from_date' AND '$to_date'";
//

if($office_id != 'all'){
	$query .= " AND v.office_id = '$office_id'";
}else{
		$query .= " AND v.office_id != '' ";
}

//$query .= " ORDER BY v.time_in DESC";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0) {
	$counter = 1;
	while($row = mysqli_fetch_assoc($result)) {
		$visitor_fullname = $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'];
							$visitor_mobile = $row['mobile'];
							$visit_purpose = $row['visit_purpose'];
							$card_no = $row['card_no'];
							$to_whom = $row['to_whom'];
							$address = $row['address'];
							$card_name = $row['cardName'];
							$ids_number = $row['idsNumber'];
							$time_in = date('d/m/Y h:i A', strtotime($row['time_in']));
							$time_out = date('d/m/Y h:i A', strtotime($row['time_out']));
							$signed_by = $row['staff_name'];

							echo "<tr>";
							echo "<td>".$counter."</td>";
							echo "<td>".$visitor_fullname."<br/><small>".$visitor_mobile."</small></td>";
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
	echo "<table class='table table-striped custom-table mb-0 datatable9809' id='kaguareport34'>";
	echo "<tr><td colspan='11'>No results found</td...</tr>";
	echo "</table>";
}
}


					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

</div>
<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->

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
		$('#kaguareport43').DataTable( {

			dom: 'Bfrtip',
			buttons: [
// 'copyHtml5',
				'excelHtml5',
// 'csvHtml5',
				'pdf'
				]
		} );
	} );

</script>

<script type="text/javascript" class="init">

	$(document).ready(function() {
		$('#kaguareport34').DataTable( {

			dom: 'Bfrtip',
			buttons: [
// 'copyHtml5',
				'excelHtml5',
// 'csvHtml5',
				'pdf'
				]
		} );
	} );

</script>

<!-- <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5f.1.js"></script> -->
<!-- <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> -->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<!-- <script>
$(document).ready(function(){
$("#searchBtn").click(function(){
var fromDate = $(".datetimepicker:eq(0)").val();
var toDate = $(".datetimepicker:eq(1)").val();
$.ajax({
type: "POST",
url: "search-report.php",
data: { fromDate: fromDate, toDate: toDate },
dataType: "json",
success: function(data){
	var table = $("#kaguareport tbody");
	table.empty();
	$.each(data, function(index, value){
		var row = $("<tr></tr>");
		row.append($("<td>"+value.visit_id+"</td>"));
		row.append($("<td>"+value.first_name+" "+value.middle_name+" "+value.last_name+"</td>"));
		row.append($("<td class='d-none d-sm-table-cell'>"+value.visit_purpose+"</td>"));
		row.append($("<td>"+value.card_no+"</td>"));
		row.append($("<td>"+value.to_whom+"</td>"));
		row.append($("<td>"+value.address+"</td>"));
		row.append($("<td>"+value.cardName+"</td>"));
		row.append($("<td>"+value.idsNumber+"</td>"));
		row.append($("<td>"+value.time_in+"</td>"));
		row.append($("<td>"+value.time_out+"</td>"));
		row.append($("<td>"+value.staffID+"</td>"));
		table.append(row);
	});
}
});
});
});
</script> -->

</body>
</html>