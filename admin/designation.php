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
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title mb-0">Add Designation</h4>
					</div>
					<div class="card-body">
						<form action="addoffice.php" method="post">
							<div class="form-group">
								<label>Designation Name <span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="oname" class="col-md-6">
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
						<h4 class="card-title mb-0">Designation Lists</h4>	
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover mb-0 datatable-designation">
								<thead>
									<tr>
										<th style="width: 30px;">#</th>
										<th>Designation </th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
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
											<tr>
												<td><?php echo htmlentities($cnt);?></td>
												<td><?php  echo htmlentities($row->name);?></td>
												<td class="text-right">
													<div class="dropdown dropdown-action">
														<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_designation" id="<?php echo  ($row->id); ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
															<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_designation" id="<?php echo  ($row->id); ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
														</div>
													</div>
												</td>
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

			<!-- Edit Designation Modal -->
			<div id="edit_designation" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Designation</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="form-group">
									<label>Designation Name <span class="text-danger">*</span></label>
									<input class="form-control" value="" type="text">
								</div>

								<div class="submit-section">
									<button class="btn btn-primary submit-btn">Update</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Edit Designation Modal -->	

			<!-- Delete Designation Modal -->
			<div class="modal custom-modal fade" id="delete_designation" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body">
							<div class="form-header">
								<h3>Delete Designation</h3>
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





		</div>
	</div>
	<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->


<?php @include("../includes/foot.php");?>
<?php @include("../includes/footer.php");?>


</body>
</html>