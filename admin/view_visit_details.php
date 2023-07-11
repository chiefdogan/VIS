
<?php

//includes the file for user permission
include("../includes/check_login.php");
check_login();
error_reporting(0);



if (isset($_POST['addvisitors'])) { 

	$staff_id = $_SESSION['visaid'];
	$visitorId =$_GET['visitorId'];
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
		$action = 'update';
		$ip = $_SERVER['REMOTE_ADDR'];
		$user_id = $_SESSION['visaid'];
		$record_id = $ids_id;
		logActivity66($dbh, $url, $referrer, $action, $ip, $user_id, $record_id);

		echo "<script>alert('Success: Visitor Registered Successfully.');document.location ='visitors.php';</script>";

	}
	else 
	{
		// echo  mysqli_error($conn);
		echo "<script>alert('Error: Failed to Register Visitor.');document.location ='visitors.php';</script>";
	}

}



?>
<!DOCTYPE html>
<html lang="en">
<?php @include("../includes/head.php");?>                                                                                                   
<body>

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
				<div class="row align-items-center">
					<div class="col">
						<h3 class="page-title">Visitor</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
							<li class="breadcrumb-item active">Visitor</li>
						</ul>
					</div>


<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-6 m-b-20">
						<img src="../assets/img/logoo.png" class="inv-logo" alt="">
						<ul class="list-unstyled">
							<li>Tanzania Bureau Of Standards</li>
							<li>Morogoro Road, Ubungo, Dar es Salaam.</li>
							<li>Headquarters Office</li>

						</ul>
					</div>
					<div class="col-sm-6 m-b-20">
						<div class="invoice-details">
							<?php
							$visitorId = $_GET['visitorId'];
							$sql89 = "SELECT v.id as visit_id,v.card_no,v.time_in,v.time_out,v.to_whom,v.address,v.id_number as ids_number,v.visit_purpose,v.idcategory as category, v.staff_id as staffID , v.visitor_id as visitorID, v.districts_id as districtsID, v.logs_id as logs, v.office_id as officeID, s.first_name, s.middle_name,s.last_name, s.mobile , i.name as cardName, d.name as districtName
							FROM visit_tb v
							LEFT JOIN visitor_tb s ON v.visitor_id = s.id
							LEFT JOIN office_tb o ON v.office_id = o.id
							LEFT JOIN idcategory_tb i ON v.idcategory = i.id
							LEFT JOIN staff_tb b ON v.staff_id = b.id
							LEFT JOIN districts_tb d ON v.districts_id = d.id  WHERE s.id='$visitorId' LIMIT 1";
							$query = $dbh -> prepare($sql89);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
							$cnt=1;
							if($query->rowCount() > 0)
							{
								foreach($results as $row)

								{    

									?>
									<h3 class="text-uppercase">VISITOR&nbsp;-&nbsp;FULLNAME-&nbsp;
										&nbsp;<?php  echo htmlentities($row->first_name);?>&nbsp;<?php  echo htmlentities($row->middle_name);?>&nbsp;<?php  echo htmlentities($row->last_name);?></h3>
										<?php $cnt=$cnt+1;
									}
								} ?>
								<ul class="list-unstyled">
									<li>Date: <span><?php echo date('F j, Y'); ?></span></li>
								</ul>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="view-visitor">
								<thead>
									<tr class="text-uppercase">
										<th>#</th>
										<th>Address</th>
										<th>Card</th>
										<th>Tbs-BadgeN0</th>
										<th>To</th>
										<th class="d-none d-sm-table-cell">Purpose</th>
										<th>DATE</th>
										<th>TimeIN</th>
										<th>TimeOUT</th>
										<th>Signed By</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$visitorId = $_GET['visitorId'];


									$sql = "SELECT v.id as visit_id,v.card_no,v.time_in as time_in,v.time_out as time_out,v.to_whom as to_whom,v.address as address,v.id_number as idsNumber,p.name as visit_purpose,v.idcategory as category, v.staff_id as staffID , v.visitor_id as visitorID, v.districts_id as districtsID, v.logs_id as logs, v.office_id as officeID, s.first_name, s.middle_name,s.last_name, s.mobile , i.name as cardName, d.name as districtName,b.email as email,b.first_name as staff_fname, b.last_name as staff_lname,b.middle_name as staff_mname
									FROM visit_tb v
									LEFT JOIN visitor_tb s ON v.visitor_id = s.id
									LEFT JOIN office_tb o ON v.office_id = o.id
									LEFT JOIN idcategory_tb i ON v.idcategory = i.id
									LEFT JOIN staff_tb b ON v.staff_id = b.id
									LEFT JOIN visit_purpose_tb p ON v.visit_purpose = p.id
									LEFT JOIN districts_tb d ON v.districts_id = d.id  WHERE s.id='$visitorId'";
									$query = $dbh -> prepare($sql);
									$query->execute();
									$results=$query->fetchAll(PDO::FETCH_OBJ);
									$cnt=1;
									if($query->rowCount() > 0)
									{
										foreach($results as $row)

										{    

											?>
											<tr>
												<td><?php echo htmlentities($cnt);?></td>
												<td class="text-uppercase"><?php  echo htmlentities($row->address);?></td>
												<td><?php echo htmlentities($row->cardName);?> (<?php echo htmlentities($row->idsNumber);?>)</td>
												<td><?php  echo htmlentities($row->card_no);?></td>
												<td class="text-uppercase"><?php  echo htmlentities($row->to_whom);?></td>
												<td class="d-none d-sm-table-cell"><?php  echo htmlentities($row->visit_purpose);?></td>
												<td><?php echo date('Y-m-d', strtotime($row->time_in)); ?></td>
												<td><?php echo date('H:i:s', strtotime($row->time_in)); ?></td>
												<td><?php echo date('H:i:s', strtotime($row->time_out)); ?></td>
												<td><?php  echo htmlentities($row->staff_fname);?>&nbsp;<?php  echo htmlentities($row->staff_mname);?>&nbsp;<?php  echo htmlentities($row->staff_lname);?></td>

											</tr>
											<?php $cnt=$cnt+1;
										}
									} ?>

								</tbody>
							</table>
						</div>
					</div>
					<div>
						<div class="row invoice-payment">
							<div class="col-sm-7">
							</div>
							<div class="col-sm-5">
								<div class="m-b-20">
									<div class="table-responsive no-border">
										<?php
										// Get the visitor ID from the URL parameter
										$visitorId = mysqli_real_escape_string($conn, $_GET['visitorId']);

										// Check if the visitor has made any visits
										$stmt = mysqli_prepare($conn, "SELECT COUNT(*) AS count FROM visit_tb WHERE id=?");
										mysqli_stmt_bind_param($stmt, "i", $visitorId);
										mysqli_stmt_execute($stmt);
										$result = mysqli_stmt_get_result($stmt);
										$count_total_visits = mysqli_fetch_assoc($result)['count'];

										// Count the number of visits made in the last week
										$stmt = mysqli_prepare($conn, "SELECT COUNT(*) AS count FROM visit_tb WHERE id=? AND time_in >= DATE(NOW()) - INTERVAL 7 DAY");
										mysqli_stmt_bind_param($stmt, "i", $visitorId);
										mysqli_stmt_execute($stmt);
										$result = mysqli_stmt_get_result($stmt);
										$count_perweek_visits = mysqli_fetch_assoc($result)['count'];

										// Count the number of visits made in the last month
										$stmt = mysqli_prepare($conn, "SELECT COUNT(*) AS count FROM visit_tb WHERE id=? AND time_in >= DATE(NOW()) - INTERVAL 31 DAY");
										mysqli_stmt_bind_param($stmt, "i", $visitorId);
										mysqli_stmt_execute($stmt);
										$result = mysqli_stmt_get_result($stmt);
										$count_permonth_visits = mysqli_fetch_assoc($result)['count'];
										?>

										<table class="table mb-0">
											<tbody>
												<tr>
													<th>Week:</th>
													<td class="text-right"><?php echo $count_perweek_visits?></td>
												</tr>
												<tr>
													<th>Months:</th>
													<td class="text-right"><?php echo $count_permonth_visits?></td>
												</tr>
												<tr>
													<th>Total:</th>
													<td class="text-right text-primary"><h1><?php echo $count_total_visits?></h1></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="invoice-info">

				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h4 class="text-center">Add Visitor If Existing On the Database</h4>
						</div>
						<div class="card-body">
							<form action="view_visit_details.php?visitorId=<?php echo ($row->visitorID);?>" class="needs-validation" novalidate method="post">
								<div class="row">
							<!-- <div class="col-md-6">
							<div class="form-group">
							<label>Regions</label>
							<select class="select" name="Regions" required>
								<option value="" disabled selected>Open this select regions</option> -->
								<?php
							// 				include('../includes/dbconnection.php');

							// // Query to retrieve data from the database
							// 				$sql = "SELECT * FROM regions_tb WHERE status='1' ";

							//     // Execute query
							// 				$result = mysqli_query($conn, $sql);

							//  // Display retrieved data in dropdown menu
							// 				while ($row = mysqli_fetch_assoc($result)) {

							// 					echo "<option value='".$row["id"]."'>".$row["name"]."</option>";

							// 				}

							//          // Close connection
							// 				mysqli_close($conn);
								?>
							<!-- </select>
							</div>
							</div> -->
							<div class="col-md-6">
								<div class="form-group">
									<label for="districts">District</label>
									<div class="input-group ">
										<select class="select2_demo_2 form-control" name="districts">
											<option value="" disabled selected>Open this select district</option>
											<?php
											include('../includes/dbconnection.php');
							// Query to retrieve data from the database
											$sql = "SELECT * FROM districts_tb ";
							// Execute query
											$result = mysqli_query($conn, $sql);
							// Display retrieved data in dropdown menu
											while ($row = mysqli_fetch_assoc($result)) {
												echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
											}
							// Close connection
											mysqli_close($conn);
											?>
										</select>

									</div>
								</div>
							</div>




<script>
	$(document).ready(function() {
		$('#districts').select2({
			placeholder: "Select a district",
			allowClear: true,
			ajax: {
				url: 'search_districts.php',
				dataType: 'json',
				delay: 250,
				data: function(params) {
					return {
						q: params.term
					};
				},
				processResults: function(data) {
					return {
						results: data
					};
				},
				cache: true
			}
		});
	});
</script>

<div class="col-md-6">
	<div class="form-group">
		<label >Address</label>
		<input class="form-control" type="text" name="Address"  required>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label >Whom to meet <span class="text-danger"></span></label>
		<input class="form-control" type="text" name="toWhom" id="validationCustom039" placeholder="Name for staff or office" required>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label>Office to</label>
		<select class="select2_demo_2 form-control" name="office" required>
			<option value="" disabled selected>Open this select Office</option>
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
			mysqli_close($conn);
			?>
		</select>
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		<label >Tbs CardNo.</label>
		<input class="form-control" type="text" name="tbs_card" id="validationCustom03980" placeholder="Tbs Card Number" required>
	</div>
</div>

<div class="col-md-12">
	<div class="form-group">
		<label >Visit Purpose</label>
		<select class="select2_demo_2 form-control" name="Purpose" required>
			<option value="" disabled selected>Open this select Purpose</option>
			<?php
			include('../includes/dbconnection.php');

			// Query to retrieve data from the database
			$sql = "SELECT * FROM visit_purpose_tb WHERE status='1'";

			// Execute query
			$result = mysqli_query($conn, $sql);

			// Display retrieved data in dropdown menu
			while ($row = mysqli_fetch_assoc($result)) {

				echo "<option value='".$row["id"]."'>".$row["name"]."</option>";

			}

			// Close connection
			mysqli_close($conn);
			?>
		</select>
		<div class="invalid-feedback">
			Please choose Purpose.
		</div>
	</div>
</div>

<div class="col-md-6">
	<div class="form-group">
		<label>ID Type</label>
		<select class="select2_demo_2 form-control" name="ids_name" required>
			<option value="" disabled selected>Open this select Card</option>
			<?php
			include('../includes/dbconnection.php');

			// Query to retrieve data from the database
			$sql = "SELECT * FROM idcategory_tb WHERE status ='1' ";

			// Execute query
			$result = mysqli_query($conn, $sql);

			// Display retrieved data in dropdown menu
			while ($row = mysqli_fetch_assoc($result)) {

				echo "<option value='".$row["id"]."'>".$row["name"]."</option>";

			}

			// Close connection
			mysqli_close($conn);
			?>
		</select>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label >ID No.</label>
		<input class="form-control" type="text" name="idnumber" id="validationCustom0398" placeholder="Identity number" required>
	</div>
</div>
</div>

<div class="submit-section">
	<!-- <input type="hidden" name="visitor_ID" value="<?php //echo $row->visitorID;?>"> -->
	<button class="btn btn-primary submit-btn" name="addvisitors">Register</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- /Page Content -->

</div>
<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->


<?php @include("../includes/foot.php");?>
<?php @include("../includes/footer.php");?>

</body>
</html>