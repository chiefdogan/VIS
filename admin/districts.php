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
					<h3 class="page-title">Districts</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
						<li class="breadcrumb-item active">Districts</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title mb-0">Add Districts</h4>
					</div>
					<div class="card-body">
						<form action="addDistricts.php" method="post">
							<div class="form-group">
								<label>District Name <span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="district_name" class="col-md-6" onBlur="checkAvailability10()" id="district_name" required >
								<span id="user-availability-status5" style="font-size:12px;"></span> 
							</div>
							<div class="form-group">
								<label>Region <span class="text-danger">*</span></label>
								<select name="regionID" class="select2_demo_2 form-control">
									<?php
									include('../includes/dbconnection.php');

                                           // Query to retrieve data from the database
									$sql = "SELECT * FROM regions_tb  WHERE status ='1'";

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
							<div class="submit-section">
								<button class="btn btn-primary submit-btn" name="addDistricts">Register</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card mb-0">
					<div class="card-header">
						<h4 class="card-title mb-0">District List</h4>	
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover mb-0 datatable-" id="kagua" >
								<thead>
									<tr>
										<th style="width: 30px;">#</th>
										<th>Name</th>
										<th>Region</th>
										<th>Status</th>
										<th >Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql = "SELECT d.id as district_id ,d.name as district_name,r.name as region_name,d.status as status
									FROM districts_tb d
									JOIN regions_tb r  ON r.id = d.regions_id";




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
												<td><?php  echo htmlentities($row->district_name);?></td>
												<td><?php  echo htmlentities($row->region_name);?></td>
												<td>
													<?php if($row->status=="1"){
														echo '<span class="badge bg-inverse-success">Active</span>';
													}
													else{
														echo '<span class="badge bg-inverse-danger">In-active</span>';
													}
													?>
												</td>
												<td class="text-right">
													<div class="dropdown dropdown-action">
														<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_district<?php echo ($row->district_id); ?>" id="<?php echo ($row->district_id); ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
															<?php if ($row->status == 1) { ?>
																<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_district<?php echo ($row->district_id); ?>" id="<?php echo ($row->district_id); ?>"><i class="fa fa-ban"></i> deactivate</a>
															<?php } else { ?>
																<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_district<?php echo ($row->district_id); ?>" id="<?php echo ($row->district_id); ?>"><i class="fa fa-check"></i> Activate</a>
															<?php } ?>
														</div>
													</div>
												</td>

												<!-- Edit Designation Modal -->
												<div id="edit_district<?php echo $row->district_id; ?>"  class="modal custom-modal fade" role="dialog">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Edit District</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<form action="update_district.php" method="post">
																	<input type="hidden" name="districts_id" value="<?php echo $row->district_id; ?>">
																	<div class="form-group">
																		<label>District Name <span class="text-danger">*</span></label>
																		<input class="form-control" value="<?php echo $row->district_name; ?>" type="text" name="update_districts" onBlur="checkAvailability7()" required >
																		<span id="user-availability-status7" style="font-size:12px;"></span> 
																	</div>
																	<div class="form-group">
																		<label>Region <span class="text-danger">*</span></label>
																		<select name="regions_id" class="select">
																			
																			<?php
																			include('../includes/dbconnection.php');

                                           // Query to retrieve data from the database
																			$sql = "SELECT * FROM regions_tb ";

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
																	
																	<div class="submit-section">
																		<button class="btn btn-primary submit-btn" name="saveupdates">Update</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>

												<!-- /Edit Districts Modal -->	

												<!-- Delete District Modal -->
												<div id="delete_district<?php echo ($row->district_id); ?>" class="modal custom-modal fade" role="dialog">
													<div class="modal-dialog modal-dialog-centered">
														<div class="modal-content">
															<div class="modal-body">
																<div class="form-header">
																	<h3>Delete District</h3>
																	<p>Are you sure want to delete?</p>
																</div>
																<div class="modal-btn delete-action">
																	<div class="row">
																		<div class="col-6">
																			<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
																		</div>
																		<div class="col-6">
																			<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!-- /Delete Designation Modal -->



												<?php $cnt=$cnt+1;
											}
										} ?>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- / Table content Modal -->







		</div>
	</div>
	<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->


<?php @include("../includes/foot.php");?>

</body>
</html>

