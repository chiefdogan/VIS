<?php

//includes the file for user permission
include("../includes/check_login.php");
check_login();



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
				<div class="row">
					<div class="col">
						<h3 class="page-title">Designations</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
							<li class="breadcrumb-item active">Desisgnations</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /Page Header -->
			
			<div class="row">
				<div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
					<a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#add_role"><i class="fa fa-plus"></i> Add Designation</a>
					<div class="roles-menu">
						<ul>
							<?php

							$sql = "SELECT * FROM designation_tb ";
							$query = $dbh -> prepare($sql);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
							$cnt=1;
							if($query->rowCount() > 0)
							{
								foreach($results as $row)

								{    
									
									?>
									<li class="active">
										<a href="javascript:void(0);"><?php  echo htmlentities($row->name);?>
										<span class="role-action">
											<span class="action-circle large" data-toggle="modal" data-target="#edit_role<?php echo  ($row->id); ?>" id="<?php echo  ($row->id); ?>">
												<i class="material-icons">edit</i>
											</span>
											<span class="action-circle large delete-btn" data-toggle="modal" data-target="#delete_role<?php echo  ($row->id); ?>" id="<?php echo  ($row->id); ?>">
												<i class="material-icons">delete</i>
											</span>
										</span>
									</a>
								</li>
								<!-- Edit Role Modal -->
								<div id="edit_role<?php echo  ($row->id); ?>" class="modal custom-modal fade" role="dialog">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content modal-md">
											<div class="modal-header">
												<h5 class="modal-title">Edit Designation</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="card-body">
												<div class="row">
													<div class="col-sm">
														<form class="needs-validation" novalidate>

															<div class="form-row">
																<div class="col-md-12 mb-12">
																	<label for="validationCustom03">Designation</label>
																	<input type="text" class="form-control" id="validationCustom03" name="update_design" placeholder="Designation name" value="<?php echo $row->name;?>" required >
																	<div class="invalid-feedback">
																		Please provide a valid name.
																	</div>

																</div>

															</div>

															<div class="submit-section">
																<input type="hidden" name="id" value="<?php echo $row->id;?>">
																<button class="btn btn-primary submit-btn" name="updateroles">Update</button>
															</div>

														</form>

													</div>

												</div>


											</div>
										</div>
									</div>
								</div>
								<!-- /Edit Role Modal -->

								<!-- Delete Role Modal -->
								<div class="modal custom-modal fade" id="delete_role<?php echo  ($row->id); ?>" role="dialog">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-body">
												<form >
													<div class="form-header">
														<h3>Delete Role</h3>
														<p>Are you sure want to delete?</p>
													</div>
													<div class="modal-btn delete-action">
														<div class="row">
															<div class="col-6">
																<a href="delete_role.php?delete_role=<?php echo ($row->id);?>" class="btn btn-primary continue-btn">Delete</a>
															</div>
															<div class="col-6">
																<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<!-- /Delete Role Modal -->






								<?php $cnt=$cnt+1;
							}
						} ?>
						
					</ul>
				</div>
			</div>
			<div class="col-sm-8 col-md-8 col-lg-8 col-xl-9">
				<h6 class="card-title m-b-20">Permissions Access</h6>
				<div class="m-b-30">
					<ul class="list-group notification-list">
						<?php

						$sql = "SELECT * FROM permissions";
						$query = $dbh -> prepare($sql);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$cnt=1;
						if($query->rowCount() > 0)
						{
							foreach($results as $row)

							{    
								
								?>
								<li class="list-group-item">
									<?php echo  ($row->permission); ?>
									<a href="#" class="edit-icon" data-toggle="modal" data-target="#edit_permission<?php echo  ($row->id); ?>" id="<?php echo  ($row->id); ?>"><i class="fa fa-pencil"></i></a>
								</li>

								<!-- Edit permission Modal -->
								<div id="edit_permission<?php echo  ($row->id); ?>" class="modal custom-modal fade" role="dialog">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content modal-md">
											<div class="modal-header">
												<h5 class="modal-title">Edit Permision</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body" id="edit_permission<?php echo  ($row->id); ?>">
												<?php @include("change_permissions.php");?>
											</div>
										</div>
									</div>
								</div>
								<!-- /Edit permission Modal -->






								<?php $cnt=$cnt+1;
							}
						} ?>
						
					</ul>
				</div>      	
				<div class="table-responsive">
					<table class="table table-hover custom-table">
						<thead>
							<tr>
								<th>Module Permission</th>
								<th class="text-center">CreateUser</th>
								<th class="text-center">DeleteUser</th>
								<th class="text-center">CreateBid</th>
								<th class="text-center">DeleteBid</th>
							</tr>
						</thead>
						<tbody>
							<?php

							$sql = "SELECT * FROM permissions";
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
										<td><?php  echo htmlentities($row->permission);?></td>
										<?php if($row->createuser==1)
										{?>
											<td class="text-center">
												<input type="checkbox" checked="" value="1">
											</td>
											<?php
										} else { ?>

											<td class="text-center">
												<input type="checkbox"  value="1">
											</td>

											<?php 
										} ?>

										<?php if($row->deleteuser==1)
										{?>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											<?php
										} else { ?>
											<td class="text-center">
												<input type="checkbox"  value="1">
											</td>

											<?php 
										} ?>

										<?php if($row->createbid==1)
										{?>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											<?php
										} 
										else
											{ ?>
												<td class="text-center">
													<input type="checkbox"  value="1">
												</td>

												<?php 
											} ?>

											<?php if($row->updatebid==1)
											{?>
												<td class="text-center">
													<input type="checkbox" checked="">
												</td>
												<?php
											} else { ?>
												<td class="text-center">
													<input type="checkbox"  value="1">
												</td>
												<?php 
											} ?>
										</tr>
										<?php $cnt=$cnt+1;
									}
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- /Page Content -->
		
		<!-- Add Role Modal -->
		<div id="add_role" class="modal custom-modal fade" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Designations</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm">
								<form action="addRoles.php" method="POST" class="needs-validation" novalidate>
									<div class="form-row">
										<div class="col-md-12 mb-12">
											<label for="validationCustom03">Designation</label>
											<input type="text" class="form-control" id="validationCustom08" name="roname" placeholder="Designation name" required>
											<div class="invalid-feedback">
												Please provide a valid name.
											</div>
										</div>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn" name="addroles" type="submit">Register</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Designations Modal -->

		
		

		

		
		
	</div>
	<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->


<?php @include("../includes/foot.php");?>

</body>
</html>