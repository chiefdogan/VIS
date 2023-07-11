
<?php

											//includes the file for user permission
include("../includes/check_login.php");
check_login();
if(isset($_GET['delid']))
{
	$rid=intval($_GET['delid']);
	$sql="update staff_tb set status='0' where id='$rid'";
	$query=$dbh->prepare($sql);
	$query->bindParam(':rid',$rid,PDO::PARAM_STR);
	$query->execute();
	if ($query->execute()){
		echo "<script>alert('User blocked');</script>"; 
		echo "<script>window.location.href = 'users.php'</script>";
	}else{
		echo '<script>alert("update failed! try again later")</script>';
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
						<h3 class="page-title">Users</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
							<li class="breadcrumb-item active">Users</li>
						</ul>
					</div>
					<div class="col-auto float-right ml-auto">
						<a href="#" class="btn add-btn" data-toggle="modal" data-target="#blocked_user"><i class="fa fa-plus"></i> Blocked user</a>
					</div>
					<div class="col-auto float-right ml-auto">
						<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_user"><i class="fa fa-plus"></i> Add User</a>
					</div>
				</div>
			</div>
			<!-- /Page Header -->

			<div class="row">
				<div class="col-md-12">
					<div class="card mb-0">
						<div class="table-responsive">
							<div class="card-body">
								<table class="table table-hover mb-0 datatable-userst" id="view-users">
									<thead>
										<tr>
											<th>N0.</th>
											<th>Name</th>
											<th>Email</th>
											<th>Mobile</th>
											<th>Branch</th>
											<th class="text-center">Role</th>
											<th>Created</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

										<?php

										$sql = "SELECT s.id AS staff_id, s.first_name, s.middle_name, s.last_name, s.mobile, s.email, s.pf_no,
										s.password, s.photo, s.Regdate, s.status AS status, s.designation_id AS designation_id, 
										d.name AS designation_name, 
										o.name AS office_branch_name
										FROM staff_tb s
										LEFT JOIN designation_tb d ON s.designation_id = d.id
										LEFT JOIN office_branch_tb o ON s.office_branch_id = o.id";
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
													<td>
														<h2 class="table-avatar">
															<a href="profile.php" class="avatar">

																<img src="../profileimages/<?php  echo $row->photo;?>" alt="">
															</a>
															<a href="profile.php"><?php  echo htmlentities($row->first_name);?>&nbsp;<?php  echo htmlentities($row->last_name);?></a>
														</h2>
													</td>
													<td><?php  echo htmlentities($row->email);?></td>
													<td><?php  echo htmlentities($row->mobile);?></td>
													<td><?php  echo htmlentities($row->office_branch_name);?></td>
													<td class="text-center">
														<?php

														if ($row->designation_id == '1') {
															echo '<div class="action-label">
															<a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
															<i class="fa fa-dot-circle-o text-danger"></i>Admin
															</a>
															</div>';
														} 
														elseif ($row->designation_id == '2') {
															echo '<div class="action-label">
															<a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
															<i class="fa fa-dot-circle-o text-success"></i>Reporting
															</a>
															</div>';
														} 
														else
														{
															echo '<div class="action-label">
															<a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
															<i class="fa fa-dot-circle-o text-purple"></i>User
															</a>
															</div>';
														}

														?>

													</td>
													<td><?php  echo htmlentities(date("d-m-Y", strtotime($row->Regdate)));?></td>
													<td><?php if($row->status=="1"){
														echo '<span class="badge bg-inverse-success">Active</span>';
													}
													else{
														echo '<span class="badge bg-inverse-danger">In-active</span>';
													}
												?></td>
												<td>


													<div class="dropdown dropdown-action">
    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <i class="material-icons">more_vert</i>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_user<?php echo  ($row->staff_id); ?>" id="<?php echo  ($row->staff_id); ?>">
            <i class="fa fa-pencil m-r-5"></i> Edit
        </a>
        <a class="dropdown-item" href="javascript:void(0)" id="<?php echo  ($row->staff_id); ?>" data-toggle="modal" data-target="#delete_user<?php echo  ($row->staff_id); ?>">
            <i class="fa fa-ban "></i> Deactivate
        </a>
        <a class="dropdown-item" href="#" id="<?php echo  ($row->staff_id); ?>" data-toggle="modal" data-target="#reset_password<?php echo  ($row->staff_id); ?>">
            <i class="fa fa-refresh"></i> Reset Password
        </a>
    </div>
</div>


												</td>

												<!-- Edit User Modal -->
												<div id="edit_user<?php echo  ($row->staff_id); ?>" class="modal custom-modal fade" role="dialog">
													<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Edit User</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<form action="edit_user.php" method="post">
																	<input type="hidden" name="user_id" value="<?php echo $row->staff_id; ?>">
																	<div class="row">
																		<div class="col-sm-6">
																			<div class="form-group">
																				<label class="control-label">First Name <span class="text-danger">*</span></label>
																				<input class="form-control" type="text" name="first_name" value="<?php echo $row->first_name; ?>">
																			</div>
																		</div>
																		<div class="col-sm-6">
																			<div class="form-group">
																				<label class="control-label">Last Name <span class="text-danger">*</span></label>
																				<input class="form-control" type="text" name="last_name" value="<?php echo $row->last_name; ?>">
																			</div>
																		</div>
																	</div>
																	<div class="row">

																		<div class="col-sm-12">
																			<div class="form-group">
																				<label class="control-label">Middle Name <span class="text-danger">*</span></label>
																				<input class="form-control" type="text" name="middle_name" value="<?php echo $row->middle_name; ?>">
																			</div>
																		</div>
																	</div>


																	<div class="row">
																		<div class="col-sm-6">
																			<div class="form-group">
																				<label class="control-label">Email <span class="text-danger">*</span></label>
																				<input class="form-control" type="email" name="emailID" value="<?php echo $row->email; ?>">
																			</div>
																		</div>
																		<div class="col-sm-6">
																			<div class="form-group">
																				<label class="control-label">Mobile <span class="text-danger">*</span></label>
																				<input class="form-control" type="text" name="mobileID" value="<?php echo $row->mobile; ?>">
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-sm-6">
																			<div class="form-group">
																				<label class="control-label">Branch <span class="text-danger">*</span></label>
																				<select class="select" name="branchID">
																					<option value="">Select Branch</option>
																					<?php
						// Fetch the branches from the database and populate the dropdown
																					$sql = "SELECT id, name FROM office_branch_tb";
																					$query = $dbh->prepare($sql);
																					$query->execute();
																					$branches = $query->fetchAll(PDO::FETCH_OBJ);
																					foreach ($branches as $branch) {
																						$selected = ($row->
																							branch_id == $branch->id) ? "selected" : "";
																						echo "<option value='$branch->id' $selected>$branch->name</option>";
																					}
																					?>
																				</select>
																			</div>
																		</div>
																		<div class="col-sm-6">
																			<div class="form-group">
																				<label class="control-label">Role <span class="text-danger">*</span></label>
																				<select class="select" name="roleID">
																					<option value="">Select Role</option>
																					<?php
						// Fetch the branches from the database and populate the dropdown
																					$sql = "SELECT id, name FROM designation_tb";
																					$query = $dbh->prepare($sql);
																					$query->execute();
																					$designations = $query->fetchAll(PDO::FETCH_OBJ);
																					foreach ($designations as $designation) {
																						$selected = ($row->
																							branch_id == $branch->id) ? "selected" : "";
																						echo "<option value='$designation->id' $selected>$designation->name</option>";
																					}
																					?>
																				</select>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-sm-12">
																			<div class="form-group">
																				<label class="control-label">Pfnumber</label>
																				<input class="form-control" type="Number" name="Pfnumber" value="<?php echo $row->pf_no; ?>">
																			</div>
																		</div>

																	</div>

																	<div class="m-t-20 text-center">
																		<input type="hidden" name="user_id" value="<?php echo $row->staff_id; ?>">
																		<button class="btn btn-primary submit-btn" type="submit" name="updateUser">Save Changes</button>
																	</div>
																</form>
															</div>
														</div>
													</div>

												</div>


												<!-- Delete User Modal -->
												<div class="modal custom-modal fade" id="delete_user<?php echo ($row->staff_id);?>" role="dialog">
													<div class="modal-dialog modal-dialog-centered">
														<div class="modal-content">
															<div class="modal-header"> <!-- Add modal header -->
																<!-- <h5 class="modal-title">Deactivate User</h5> -->
																<button type="button" class="close" data-dismiss="modal">&times;</button>
															</div>
															<div class="modal-body">
																<form method="post">
																	<div class="form-header">
																		<h3>Deactivate User</h3>
																		<p>Are you sure you want to deactivate this user?</p> <!-- Add confirmation message -->
																	</div>
																	<div class="modal-btn delete-action">
																		<div class="row">
																			<div class="col-6">
																				<a href="delete_user.php?delete_user=<?php echo ($row->staff_id);?>" class="btn btn-primary continue-btn">Deactivate</a> <!-- Use double quotes in HTML attributes -->
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
												<!-- /Delete User Modal -->


<!-- Delete User Modal -->
												<div class="modal custom-modal fade" id="reset_password<?php echo ($row->staff_id); ?>" role="dialog">
													<div class="modal-dialog modal-dialog-centered">
														<div class="modal-content">
															<div class="modal-header"> <!-- Add modal header -->
																<!-- <h5 class="modal-title">Deactivate User</h5> -->
																<button type="button" class="close" data-dismiss="modal">&times;</button>
															</div>
															<div class="modal-body">
																<form method="post">
																	<div class="form-header">
																		<h3>Reset Password</h3>
																		<p>Are you sure you want to reset the password for this user?</p> <!-- Add confirmation message -->
																	</div>
																	<div class="modal-btn delete-action">
																		<div class="row">
																			<div class="col-6">
																				<a href="reset_passwords.php?reset_user_id=<?php echo ($row->staff_id);?>" class="btn btn-primary continue-btn">Reset</a> <!-- Use double quotes in HTML attributes -->
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
												<!-- /Delete User Modal -->










												<!-- Reset Password Modal -->
<!-- Reset Password Modal -->
<!-- <div class="modal custom-modal fade" id="reset_password<?php //echo ($row->staff_id); ?>" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reset Password</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="post" >
                    <div class="form-header">
                        <p>Are you sure you want to reset the password for this user?</p>
                    </div>
                    <div class="modal-btn reset-password-action">
                        <div class="row">
                            <div class="col-6">
                                <input type="hidden" name="reset_user_id" value="<?php// echo $row->staff_id; ?>">
                                <button type="submit" name="reset_password" class="btn btn-primary continue-btn">Reset</button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-primary cancel-btn" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->
<!-- /Reset Password Modal -->

<?php
// if (isset($_POST['reset_password'])) {
//     $reset_user_id = $_POST['reset_user_id'];
//     $default_password = md5('mungukwanza');
//     $sql = "UPDATE staff_tb SET password = ?, resets = 0 WHERE staff_id = ?";
//     $stmt = mysqli_prepare($conn, $sql);
//     mysqli_stmt_bind_param($stmt, "si", $default_password, $reset_user_id);
//     $result = mysqli_stmt_execute($stmt);

//     if ($result) {
//         echo "<script>alert('Password reset successfully.');window.location.href = 'users.php';</script>";
//     } else {
//         echo "<script>alert('Password reset failed. Please try again.');</script>";
//     }
// }
?>



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
			<!-- /Page Content -->

			<!-- Add User Modal -->
			<div id="add_user" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add User</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							<form action="reg.php" method="post" class="needs-validation" novalidate>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>First Name <span class="text-danger">*</span></label>
											<input class="form-control" type="text" name="fname" placeholder="firstname" required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Middle Name</label>
											<input class="form-control" type="text" name="mname" placeholder="middlename" required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Last Name</label>
											<input class="form-control" type="text" name="lname" placeholder="lastname" required>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<label>Email <span class="text-danger">*</span></label>
											<input class="form-control" type="email" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="Email Address" required="required">
											<span id="user-availability-status" style="font-size:12px;"></span> 
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Password</label>
											<input class="form-control" type="password" name="password" placeholder="password" required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Confirm Password</label>
											<input class="form-control" type="password" name="cpassword" onBlur="checkAvailability3()" placeholder="confirm password" required>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<label>Mobile</label>
											<input class="form-control" type="text" name="mobileid" onBlur="checkAvailability4()" id="mobileid" placeholder="mobile" required>
											<span id="user-availability-status4" style="font-size:12px;"></span> 
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Role</label>
											<select name="role" class="select" required>
												<?php
												include('../includes/dbconnection.php');

											// Query to retrieve data from the database
												$sql = "SELECT * FROM designation_tb ";

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
									<div class="col-sm-6">
										<div class="form-group">
											<label>Branch</label>
											<select class="select" name="branchid" required>
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
									</div>
									<div class="col-sm-6">  
										<div class="form-group">
											<label>Pf No. <span class="text-danger">*</span></label>
											<input type="text" class="form-control floating" name="pfnumber" id="pf_no" placeholder="Pf Number" onBlur="checkAvailability2()" required="required">
											<span id="user-availability-status2" style="font-size:12px;"></span>
										</div>
									</div>
								</div>

								<div class="submit-section">
									<button class="btn btn-primary submit-btn" name="addregister">Register</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Add User Modal -->

			<!-- blocked user Modal -->
			<div id="blocked_user" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Blocked User</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							<?php @include("blocked-users.php"); ?>

						</div>

					</div>
				</div>
			</div>
			<!-- /blocked user Modal -->



		</div>
		<!-- /Page Wrapper -->

	</div>
	<!-- /Main Wrapper -->


	<?php @include("../includes/foot.php");?>
	<?php @include("../includes/footer.php");?>
											<!-- <script type="text/javascript">
											$(document).ready(function(){
											$(document).on('click','.edit_user',function()
											{
											var dropdown-item.$(this).attr('id');
											$.ajax(
											{
											url:"",
											type:"",
											data:{edit_user:edit_user},

											success:function(data)
											{
											$("#edit_user").html(data);
											$("#edit_user").modal('show');
											}

											});
											});
											});
										</script> -->

									</body>
									</html>