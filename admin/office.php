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
					<h3 class="page-title">office</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
						<li class="breadcrumb-item active">office</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title mb-0">Add Office</h4>
					</div>
					<div class="card-body">
						<form action="addoffice.php" method="post">
							<div class="form-group">
								<label>Office Name <span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="oname" class="col-md-6">
							</div>
							<div class="form-group">
								<label>Branch <span class="text-danger">*</span></label>
								<select class="select" name="branchid">
									<?php
									include('../includes/dbconnection.php');

                                                           // Query to retrieve data from the database
									$sql = "SELECT * FROM office_branch_tb ";

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
								<button class="btn btn-primary submit-btn" name="addoffice">Register</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card mb-0">
					<div class="card-header">
						<h4 class="card-title mb-0">Office List</h4>	
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover mb-0 datatable">
								<thead>
									<tr>
										<th style="width: 30px;">#</th>
										<th>Office </th>
										<th>Branch</th>
										<th >Status</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql = "SELECT o.id as id,o.name as office ,o.status as status ,c.name as branch FROM office_tb o
									LEFT JOIN office_branch_tb c ON c.id = o.office_branch_id";
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
												<td><?php  echo htmlentities($row->office);?></td>
												<td><?php  echo htmlentities($row->branch);?></td>
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
															<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_office<?php echo ($row->id); ?>" id="<?php echo ($row->id); ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
															<?php if ($row->status == 1) { ?>
																<a class="dropdown-item" href="#" data-toggle="modal" data-target="#deactivate_office<?php echo ($row->id); ?>" id="<?php echo ($row->id); ?>"><i class="fa fa-ban"></i> Deactivate</a>
															<?php } else { ?>
																<a class="dropdown-item" href="#" data-toggle="modal" data-target="#activate_office<?php echo ($row->id); ?>" id="<?php echo ($row->id); ?>"><i class="fa fa-check"></i> Activate</a>
															<?php } ?>
														</div>
													</div>
												</td>


												
												
												<!-- Activate Office Modal -->
												<div id="activate_office<?php echo ($row->id); ?>" class="modal custom-modal fade" role="dialog">
													<div class="modal-dialog modal-dialog-centered">
														<div class="modal-content">
															<div class="modal-body">
																<form>
																	<div class="form-header">
																		<h3>Ativate Office</h3>
																		<p>Are you sure want to deactivate?</p>
																	</div>
																	<div class="modal-btn delete-action">
																		<div class="row">
																			<div class="col-6">
																				<a href="activate_office.php?activate_office=<?php echo ($row->id); ?>" class="btn btn-primary continue-btn">Activate</a>
																			</div>
																			<div class="col-6">
																				<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
																			</div>
																		</div>
																	</div>
																</form> <!-- Here is the missing closing tag -->
															</div>
														</div>
													</div>
												</div>



												<!-- Deactivate Office Modal -->
												<div id="deactivate_office<?php echo ($row->id); ?>" class="modal custom-modal fade" role="dialog">
													<div class="modal-dialog modal-dialog-centered">
														<div class="modal-content">
															<div class="modal-body">
																<form>
																	<div class="form-header">
																		<h3>Deactivate Office</h3>
																		<p>Are you sure want to deactivate?</p>
																	</div>
																	<div class="modal-btn delete-action">
																		<div class="row">
																			<div class="col-6">
																				<a href="deactivate_office.php?deactivate_office=<?php echo ($row->id); ?>" class="btn btn-primary continue-btn">Deactivate</a>
																			</div>
																			<div class="col-6">
																				<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
																			</div>
																		</div>
																	</div>
																</form> <!-- Here is the missing closing tag -->
															</div>
														</div>
													</div>
												</div>


												<!-- Edit Office Modal -->
												<div id="edit_office<?php echo  ($row->id); ?>" class="modal custom-modal fade" role="dialog">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Edit Office</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<form action="edit_offices.php" method="post">
																	<input type="hidden" name="office_id" value="<?php echo $row->id;?>">
																	<div class="form-group">
																		<label>Office Name <span class="text-danger">*</span></label>
																		<input class="form-control" value="<?php  echo htmlentities($row->office);?>" type="text" name="oname" required >

																	</div>
																	<div class="form-group">
																		<label>Branch <span class="text-danger">*</span></label>
																		<select name="branchy" class="select">
																			<?php
																			include('../includes/dbconnection.php');
																			$sql = "SELECT * FROM office_branch_tb";
																			$result = mysqli_query($conn, $sql);
																			while ($row = mysqli_fetch_assoc($result)) {
																				$selected = ($row['id'] == $user_branch_id) ? 'selected' : '';
																				echo "<option value='".$row["id"]."' ".$selected.">".$row["name"]."</option>";
																			}
																			mysqli_close($conn);
																			?>
																		</select>
																	</div>




																	<div class="submit-section">
																		
																		<button class="btn btn-primary submit-btn" name="UpdateOffice">Update</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
												<!-- /Edit Office Modal -->	

											</tr>
											<?php $cnt=$cnt+1;
										}
									} ?>

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
<!--  -->
</body>
</html>