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

	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Visitors</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
						<li class="breadcrumb-item active">Visitors</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title mb-0">Edit Visitor</h4>
					</div>
					<div class="card-body">
						<form action="update_visitor.php?visitorId=<?php echo $row->visitorID;?>" class="needs-validation" novalidate method="post">
							<?php
							$visitorId = $_GET['visitorId'];

							$sql = "SELECT v.id,v.card_no as card_no,v.time_in as time_in,v.time_out as time_out,v.to_whom as to_whom,v.address as address,v.id_number as idsNumber,p.name as visit_purpose,v.idcategory as category, v.staff_id as staffID , v.visitor_id as visitorID, v.districts_id as districtsID, v.logs_id as logs, v.office_id as officeID, s.first_name, s.middle_name,s.last_name, s.mobile , i.name as cardName, d.name as districtName,b.email as email
							FROM visit_tb v
							LEFT JOIN visitor_tb s ON s.id = v.visitor_id
							LEFT JOIN office_tb o ON v.office_id = o.id
							LEFT JOIN idcategory_tb i ON v.idcategory = i.id
							LEFT JOIN staff_tb b ON v.staff_id = b.id
							LEFT JOIN visit_purpose_tb p ON v.visit_purpose = p.id
							LEFT JOIN districts_tb d ON v.districts_id = d.id  WHERE v.visitor_id='24'";
							$query = $dbh->prepare($sql);
							$query->bindParam(':visitorId', $visitorId, PDO::PARAM_STR);
							$query->execute();
							$result = $query->fetch(PDO::FETCH_OBJ);
							if ($query->rowCount() > 0) {
								?>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Full Name</label>
											<input class="form-control" type="text" name="fname" pattern="[A-Za-z ]+" placeholder="Your full name"  value="<?php echo htmlentities($result->first_name); ?>" required>
											<div class="invalid-feedback">
												Please enter your first name using only alphabets .
											</div>
										</div>

									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Middle Name</label>
											<input class="form-control " type="text"  name="mname" pattern="[A-Za-z ]+"  placeholder="Visitor mname" required value="<?php echo htmlentities($result->middle_name); ?>">
											<div class="invalid-feedback">
												Please enter your Middle name using only alphabets.
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Last Name</label>
											<input class="form-control" type="text" name="lname" placeholder="Visitor Last name" pattern="[A-Za-z ]+"  value="<?php echo htmlentities($result->last_name); ?>" required>
											<div class="invalid-feedback">
												Please enter your Last name using only alphabets .
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Mobile</label>
											<input class="form-control" type="text" name="mobileNumber" placeholder="Visitor Mobile" value="<?php echo htmlentities($result->mobile); ?>" required onkeyup="this.value=this.value.replace(/[^\d]/,'')">
											<div class="invalid-feedback">
												Please enter a valid Mobile Number only numbers required.
											</div>
										</div>

									</div>


									<div class="col-md-6">
										<div class="form-group">
											<label  >Regions</label>
											<select class="select form-control" name="Regions" required>
												<option value="" disabled selected>Open this select regions</option>
												<?php
												include('../includes/dbconnection.php');

// Query to retrieve data from the database
												$sql = "SELECT * FROM regions_tb WHERE status='1' ";

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
												Please select regions.
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >District <span class="text-danger">*</span></label>
											<select class="select form-control" name="districts" required>
												<option value="<?php echo htmlentities($result->districtName); ?>" disabled selected></option>
												<?php
												include('../includes/dbconnection.php');

// Query to retrieve data


												$sql = "SELECT * FROM districts_tb WHERE status='1' ";


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
												Please select a district.
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Address</label>
											<input class="form-control" type="text" name="address" value="<?php echo htmlentities($result->address); ?>" required>
											<div class="invalid-feedback">
												Please enter Address.
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Whom to meet <span class="text-danger"></span></label>
											<input class="form-control" type="text" name="toWhom" pattern="[A-Za-z ]+"  placeholder="Name for staff or office" value="<?php echo htmlentities($result->to_whom); ?>" required>
											<div class="invalid-feedback">
												Please Enter the name for Whom to meet using only alphabets .
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Office to</label>
											<select class="select form-control" name="office" required>
												<option value="<?php echo htmlentities($result->officeName); ?>" selected></option>
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
											<div class="invalid-feedback">
												Please choose Office.
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Tbs BadgeNo.</label>
											<input class="form-control" type="number" name="tbs_card"  placeholder="Tbs Card Number" required onkeyup="this.value=this.value.replace(/[^\d]/,'')" value="<?php echo htmlentities($result->card_no); ?>">
											<div class="invalid-feedback">
												Please enter a valid Badge number.
											</div>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label for="validationCustom386">Visit Purpose</label>
											<textarea class="form-control" name="Purpose"  value="<?php echo htmlentities($result->visit_purpose); ?>" required></textarea>
											<div class="invalid-feedback">
												Please enter Visiting Purpose.
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label >ID Type</label>
											<select class="select form-control" name="ids_name" required>
												<option value="<?php echo htmlentities($result->cardName); ?>" selected></option>
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
											<div class="invalid-feedback">
												Please Choose ID.
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="validationCustom386">ID No.</label>
											<input class="form-control" type="text" name="idnumber"  placeholder="Identity number"  value="<?php echo htmlentities($result->idsNumber); ?>" required>
											<div class="invalid-feedback">
												Please enter a valid number.
											</div>
										</div>
									</div>
								</div>

								<div class="submit-section">
									<button class="btn btn-primary submit-btn" name="updateVisitor">Update</button>
								</div>
							</form>
						</div>
						<?php 
					}
					?>
				</div>
			</div>



		</div>
	</div>
	<!-- /Add Client Modal -->








</div>
</div>
</div>
</div>




</div>
</div>
<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->

<?php @include("../includes/foot.php");?>
<?php @include("../includes/footer.php");?>
<script type="text/javascript">
	$(document).ready(function() {
// Handle edit button click
		$('.pro-edit').click(function(e) {
			e.preventDefault();

// Get the visitor's id from the data-id attribute
			var visitorId = $(this).data('id');

// Load the edit form using AJAX
			$.ajax({
				url: 'view_visitor_details.php',
				type: 'GET',
				data: { edit_id: visitorId },
				success: function(response) {
// Show the edit form in a modal
					$('#editVisitor1 .modal-body').html(response);
					$('#editVisitor1').modal('show');
				},
				error: function(xhr, status, error) {
					console.log(error);
				}
			});
		});
	});

</script>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click','.edit_office',function()
		{
			var btn btn-primary btn-sm=$(this).attr('id');
			$.ajax(
			{
				url:"update_office.php",
				type:"post",
				data:{edit_office:edit_office},

				success:function(data)
				{
					$("#edit_office").html(data);
					$("#edit_office").modal('show');
				}

			});
		});
	});
</script>

</body>
</html>