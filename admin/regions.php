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
					<h3 class="page-title">Regions</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
						<li class="breadcrumb-item active">Regions</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title mb-0">Add Regions</h4>
					</div>
					<div class="card-body">
						<form action="addRegions.php" method="post">
							<div class="form-group">
								<label>Region Name <span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="region_name" class="col-md-6" onBlur="checkAvailability5()" id="region_name" required >
								<span id="user-availability-status5" style="font-size:12px;"></span> 
							</div>
							<div class="form-group">
								<label>Postal Code <span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="postal_code" class="col-md-6" onBlur="checkAvailability6()"  id="postal_code" required >
								<span id="user-availability-status6" style="font-size:12px;"></span> 
							</div>
							<div class="submit-section">
								<button class="btn btn-primary submit-btn" name="addRegions">Register</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card mb-0">
					<div class="card-header">
						<h4 class="card-title mb-0">Regions List</h4>	
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover mb-0 datatablehy" id="grace">
								<thead>
									<tr>
										<th style="width: 30px;">#</th>
										<th>Name</th>
										<th>Postal</th>
										<th>Status</th>
										<th >Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql = "SELECT * FROM regions_tb";
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
												<td><?php  echo htmlentities($row->name);?></td>
												<td><?php  echo htmlentities($row->postal_code);?></td>
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
															<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_region_<?php echo $row->id; ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
															<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_region"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
														</div>
													</div>
												</td>

												<!-- Edit Designation Modal -->
												<div id="edit_region_<?php echo $row->id; ?>"  class="modal custom-modal fade" role="dialog">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Edit IDS</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<form action="update_region.php" method="post">
																	<input type="hidden" name="region_id" value="<?php echo $row->id; ?>">
																	<div class="form-group">
																		<label>Region Name <span class="text-danger">*</span></label>
																		<input class="form-control" value="<?php echo $row->name; ?>" type="text" name="update_region" onBlur="checkAvailability7()" required >
																		<span id="user-availability-status7" style="font-size:12px;"></span> 
																	</div>
																	<div class="form-group">
																		<label>Postal Code <span class="text-danger">*</span></label>
																		<input class="form-control" value="<?php echo $row->postal_code; ?>" type="text" name="update_postal" onBlur="checkAvailability8()" required >
																		<span id="user-availability-status8" style="font-size:12px;"></span> 
																	</div>

																	<div class="form-group">
																		<label class="d-block">Status</label>
																		<div class="status-toggle">
																			<?php if ($row->status == 1) { ?>
																				<input type="checkbox" id="staff_<?php echo $row->id; ?>" class="check" checked name="edit_status" value="1" >
																			<?php } else { ?>
																				<input type="checkbox" id="staff_<?php echo $row->id; ?>" class="check" name="edit_status" value="0">
																			<?php } ?>
																			<label for="staff_<?php echo $row->id; ?>" class="checktoggle">checkbox</label>
																		</div>
																	</div>
																	
																	<div class="submit-section">
																		<button class="btn btn-primary submit-btn" name="saveupdates">Update</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
												<!-- /Edit Designation Modal -->	

												<!-- Delete IDS Modal -->
												<div class="modal custom-modal fade" id="delete_region" role="dialog">
													<div class="modal-dialog modal-dialog-centered">
														<div class="modal-content">
															<div class="modal-body">
																<div class="form-header">
																	<h3>Delete Region</h3>
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
										} 

										?>
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

