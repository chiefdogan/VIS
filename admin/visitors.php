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
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title mb-0">Add Visitor</h4>
						</div>
						<div class="card-body">
							<form action="process-form.php" class="needs-validation" novalidate method="post">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>First Name</label>
											<input class="form-control" type="text" name="fname" pattern="[A-Za-z ]+" placeholder="Your full name" required>
											<div class="invalid-feedback">
												Please enter your first name using only alphabets .
											</div>
										</div>

									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Middle Name</label>
											<input class="form-control " type="text"  name="mname" pattern="[A-Za-z ]+"  placeholder="Visitor mname" required>
											<div class="invalid-feedback">
												Please enter your Middle name using only alphabets.
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Last Name</label>
											<input class="form-control" type="text" name="lname" placeholder="Visitor Last name" pattern="[A-Za-z ]+" required>
											<div class="invalid-feedback">
												Please enter your Last name using only alphabets .
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Mobile</label>
											<input class="form-control" type="text" id="phone" name="mobileNumber" placeholder="Visitor Mobile" required onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="15" minlength="10">
											<div class="invalid-feedback">
												Please enter a valid Mobile Number only numbers required.
											</div>
										</div>

									</div>


									<!-- <div class="col-md-6">
										<div class="form-group">
											<label  >Regions</label>
											<select class="select form-control" name="Regions" required>
												<option value="" disabled selected>Open this select regions</option> -->
												<?php
												// include('../includes/dbconnection.php');

                        						// Query to retrieve data from the database
												// $sql = "SELECT * FROM regions_tb WHERE status='1' ";

                       			  				// Execute query
												// $result = mysqli_query($conn, $sql);

                      							// Display retrieved data in dropdown menu
												// while ($row = mysqli_fetch_assoc($result)) {

												// 	echo "<option value='".$row["id"]."'>".$row["name"]."</option>";

												// }

                       							 // Close connection
												// mysqli_close($conn);
												?>
											<!-- </select>
											<div class="invalid-feedback">
												Please select regions.
											</div>
										</div>
									</div> -->
									<div class="col-md-12">
										<div class="form-group">
											<label >District <span class="text-danger">*</span></label>
											<select class="select2_demo_2 form-control" name="districts" required>
												<option value="" disabled selected>Open this select district</option>
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
												//mysqli_close($conn);
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
											<input class="form-control" type="text" name="Address"  required>
											<div class="invalid-feedback">
												Please enter Address.
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Whom to meet <span class="text-danger"></span></label>
											<input class="form-control" type="text" name="toWhom" pattern="[A-Za-z ]+"  placeholder="Name for staff or office" required>
											<div class="invalid-feedback">
												Please Enter the name for Whom to meet using only alphabets .
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Office to</label>
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
												//mysqli_close($conn);
												?>
											</select>
											<div class="invalid-feedback">
												Please choose Office.
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >TBS No.</label>
											<input class="form-control" type="number" name="tbs_card"  placeholder="Tbs Card Number" onkeyup="this.value=this.value.replace(/[^\d]/,'')" required>
											<div class="invalid-feedback">
												Please enter a valid Badge number.
											</div>
										</div>
									</div>

									<!-- <div class="col-md-12">
										<div class="form-group">
											<label for="validationCustom386">Visit Purpose</label>
											<textarea class="form-control" name="Purpose"  required></textarea>
											<div class="invalid-feedback">
												Please enter Visiting Purpose.
											</div>
										</div>
									</div> -->
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
												//mysqli_close($conn);
												?>
											</select>
											<div class="invalid-feedback">
												Please choose Purpose.
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label >ID Type</label>
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
												//mysqli_close($conn);
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
											<input class="form-control" type="text" name="idnumber"  placeholder="Identity number" required>
											<div class="invalid-feedback">
												Please enter a valid number.
											</div>
										</div>
									</div>
								</div>

								<div class="submit-section">
									<button class="btn btn-primary submit-btn" name="addvisitor">Register</button>
								</div>
							</form>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="card mb-0">
						<div class="card-header">
							<h4 class="card-title mb-0">Visitors Lists</h4>	
						</div>
						<div class="card-body">
<div class="table-responsive">
    <table class="table table-hover mb-0 datatable-visitorsy" id="visitorsu">
        <thead>
            <tr class="text-uppercase">
                <th style="width: 30px;">#</th>
                <th>Fullname</th>
                <th>Mobile</th>
                <th>CardName</th>
                <th>Office</th>
                <th class="text-right">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT v.id as visit_id, v.card_no, v.time_in, v.time_out, v.to_whom, v.address, v.id_number as idsNumber, v.visit_purpose as visit_purposeID, v.idcategory as category, v.staff_id as staffID, v.visitor_id as visitorID, v.districts_id as districtsID, v.logs_id as logs, v.office_id as officeID, s.first_name, s.middle_name, s.last_name, s.mobile, i.name as cardName, d.name as districtName, s.id as visitorIDs, o.name as officeName, p.name as visit_purpose
                    FROM visit_tb v
                    LEFT JOIN visitor_tb s ON v.visitor_id = s.id
                    LEFT JOIN office_tb o ON v.office_id = o.id
                    LEFT JOIN idcategory_tb i ON v.idcategory = i.id
                    LEFT JOIN staff_tb b ON v.staff_id = b.id
                    LEFT JOIN visit_purpose_tb p ON v.visit_purpose = p.id
                    LEFT JOIN districts_tb d ON v.districts_id = d.id";

            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) {
                foreach ($results as $row) {
                    ?>
                    <tr>
                        <td><?php echo htmlentities($cnt); ?></td>
                        <td class="text-uppercase">
                            <a href="#">
                                <?php echo htmlentities($row->first_name); ?>&nbsp;<?php echo htmlentities($row->middle_name); ?>&nbsp;<?php echo htmlentities($row->last_name); ?>
                            </a>
                        </td>
                        <td><?php echo htmlentities($row->mobile); ?></td>
                        <td><?php echo htmlentities($row->cardName); ?> (<?php echo htmlentities($row->idsNumber); ?>)</td>
                        <td><?php echo htmlentities($row->officeName); ?></td>
                        <td class="text-center">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">&nbsp;<i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="view_visit_details.php?visitorId=<?php echo $row->visitorID; ?>" data-id="<?php echo $row->visitorID; ?>" title="click to view"><i class="fa fa-eye"></i> View</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php $cnt = $cnt + 1;
                }
            }
            ?>
        </tbody>
    </table>
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