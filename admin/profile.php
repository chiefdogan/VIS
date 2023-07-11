
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
					<div class="col-sm-12">
						<h3 class="page-title">Profile</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
							<li class="breadcrumb-item active">Profile</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /Page Header -->

			<div class="card mb-0">
				<div class="card-body">

					<div class="col-md-12">
						<h3 class="page-title">Change Password</h3>
					</div>
					<form action="changepassword.php" id="change_password" method="post">
						<div class="form-group">
							<label>Old password</label>
							<input type="hidden" id="password" name="password" value="<?php echo $row->password; ?>"  placeholder="Current Password" class="form-control">

							<input type="password" id="current_password" name="current_password"  placeholder="Current Password" required class="form-control">
						</div>
						<div class="form-group">
							<label>New password</label>
							<input type="password" id="new_password" name="new_password" placeholder="New Password" required class="form-control">
						</div>
						<div class="form-group">
							<label>Confirm password</label>
							<input type="password" id="retype_password" name="retype_password" placeholder="Re-type Password" required class="form-control">
						</div>
						<div class="submit-section">
							<input type="hidden" name="id" value="<?php echo $row->id;?>">
							<button class="btn btn-primary submit-btn" id="save" name="save" >Update Password</button>
						</div>
					</form>


				</div>
			</div>

			<div class="card tab-box">
				<div class="row user-tabs">
					<div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
						<ul class="nav nav-tabs nav-tabs-bottom">
							<li class="nav-item"><a href="#emp_profile" data-toggle="tab" class="nav-link active">Profile</a></li>
							<li class="nav-item"><a href="#bank_statutory" data-toggle="tab" class="nav-link">Visitor Records</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="tab-content">

				<!-- Profile Info Tab -->
				<div id="emp_profile" class="pro-overview tab-pane fade show active">
					<div class="row">
						<div class="col-md-7 d-flex">
							<div class="card profile-box flex-fill">
								<div class="card-body">
									<h3 class="card-title">Personal Informations <a href="#" class="edit-icon" data-toggle="modal" data-target="#personal_info_modal" id="<?php echo  ($row->id); ?>"><i class="fa fa-pencil"></i></a></h3>
									<ul class="personal-info">
										<?php

							//$sql="SELECT * from staff_tb where designation_id='2' or designation_id='3'";
										$id = $_SESSION['visaid'];					
										$sql = "SELECT staff_tb.id,staff_tb.first_name,staff_tb.middle_name,staff_tb.last_name,staff_tb.mobile,staff_tb.pf_no,staff_tb.email,staff_tb.photo,staff_tb.Regdate,staff_tb.status,staff_tb.password,staff_tb.designation_id,staff_tb.office_branch_id,d.name as designation_name,b.name as branch_name
										FROM staff_tb
										LEFT JOIN designation_tb d ON staff_tb.designation_id = d.id
										LEFT JOIN office_branch_tb b ON staff_tb.office_branch_id = b.id


										WHERE staff_tb.id='$id'";

										$query = $dbh -> prepare($sql);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										$cnt=1;
										if($query->rowCount() > 0)
										{
											foreach($results as $row)

											{    

												?>
												<li>
													<div class="title">Fullname.</div>
													<div class="text"><?php  echo htmlentities($row->first_name);?>&nbsp;<?php  echo htmlentities($row->middle_name);?>&nbsp;<?php  echo htmlentities($row->last_name);?></div>
												</li>
												<li>
													<div class="title">Email</div>
													<div class="text"><?php echo htmlentities($row->email); ?></div>
												</li>
												<li>
													<div class="title">Mobile</div>
													<div class="text"><?php  echo htmlentities($row->mobile);?></a></div>
												</li>
							<!-- <li>
							<div class="title">Office</div>
							<div class="text"><?php  echo htmlentities($row->office_name);?></div>
						</li> -->
						<li>
							<div class="title">Branch</div>
							<div class="text"><?php  echo htmlentities($row->branch_name);?></div>
						</li>
						<li>
							<div class="title">Designation</div>
							<div class="text"><?php  echo htmlentities($row->designation_name);?></div>

						</li>

						<li>
							<div class="title">Pf N0</div>
							<div class="text"><?php  echo htmlentities($row->pf_no);?></div>
						</li>
						<li>
							<div class="title">Created</div>
							<div class="text"><?php  echo htmlentities(date("d-m-Y", strtotime($row->Regdate)));?></div>
						</li>

						<!-- Personal Info Modal -->
						<div id="personal_info_modal" class="modal custom-modal fade" role="dialog">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Edit Profile</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">

										<form action="update-user-details.php" method="post">
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<label>First Name <span class="text-danger">*</span></label>
														<input class="form-control" type="text" name="fname" value="<?php  echo htmlentities($row->first_name);?>" required>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label>Middle Name</label>
														<input class="form-control" type="text" name="mname" value="<?php  echo htmlentities($row->middle_name);?>" required>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label>Last Name</label>
														<input class="form-control" type="text"  name="lname" value="<?php  echo htmlentities($row->last_name);?>" required>
													</div>
												</div>

												<div class="col-sm-6">
													<div class="form-group">
														<label>Email <span class="text-danger">*</span></label>
														<input class="form-control" type="email" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="Email Address" value="<?php  echo htmlentities($row->email);?>" required>
														<span id="user-availability-status" style="font-size:12px;"></span> 
													</div>
												</div>
											</div>

											<div class="submit-section">
												<input type="hidden" name="id" value="<?php echo $row->id;?>">
												<button class="btn btn-primary submit-btn" name="EditProf">Update</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<!-- /Personal Info Modal -->
						<?php $cnt=$cnt+1;
					}
				} ?>
			</ul>
		</div>
	</div>
</div>
<div class="col-md-5 d-flex">
	<div class="card profile-box flex-fill">
		<div class="card-body">
			<h3 class="card-title">Profile Photo<a href="#"  data-toggle="modal" ></a></h3>
			<form class="form-horizontal row-fluid" action="update-images.php" method="post" enctype="multipart/form-data">
				<div class="profile-img-wrap edit-img">
					<img class="inline-block" src="../profileimages/<?php  echo $row->photo;?>" alt="user">
					<div class="fileupload btn">
						<span class="btn-text">edit</span>
						<input class="upload" type="file" name="imageUpdated">
					</div>

				</div>
				<div class="submit-section">
					<input type="hidden" name="id" value="<?php echo $row->id;?>">
					<button class="btn btn-primary submit-btn" id="changephoto" name="changephoto" >Update Photo</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>


</div>
<!-- /Profile Info Tab -->




<!-- HTML code for the table -->
<div class="tab-pane fade" id="bank_statutory">
	<div class="card">
		<div class="card-body">
			<h3 class="card-title">My Visitors Info Per Day</h3>
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-hover mb-0 datatable-visitorss">

						<?php

							// Get the staff ID from the session
						$staff_id = $_SESSION['visaid'];

							// Get today's date in the correct format for the query
						$date = date('Y-m-d');

						$sql = "SELECT v.id as visit_id,v.card_no,v.time_in as time_in,v.time_out as time_out,v.to_whom as to_whom,v.address as address,v.id_number as idsNumber,p.name as visit_purpose,v.idcategory as category, v.staff_id  , v.visitor_id as visitorID, v.districts_id as districtsID, v.logs_id as logs, v.office_id as officeID, s.first_name, s.middle_name,s.last_name, s.mobile , i.name as cardName, d.name as districtName,b.email as email
						FROM visit_tb v
						LEFT JOIN visitor_tb s ON v.visitor_id = s.id
						LEFT JOIN office_tb o ON v.office_id = o.id
						LEFT JOIN idcategory_tb i ON v.idcategory = i.id
						LEFT JOIN staff_tb b ON v.staff_id = b.id
						LEFT JOIN districts_tb d ON v.districts_id = d.id
						LEFT JOIN visit_purpose_tb p ON v.visit_purpose = p.id
						WHERE v.staff_id = :staff_id AND DATE(v.time_in) = :date AND v.time_out IS NULL";

						$query = $dbh->prepare($sql);
						$query->bindParam(':staff_id', $staff_id, PDO::PARAM_INT);
						$query->bindParam(':date', $date, PDO::PARAM_STR);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$cnt=1;

						?>



						<thead>
							<tr>
								<th>FullName</th>
								<th>CardName</th>
								<th>Address</th>
								<th>Mobile</th>
								<th>Purpose</th>
								<th>Timein</th>

								
							</tr>
						</thead>
						<tbody>
							<?php
							if($query->rowCount() > 0){
								foreach($results as $row) { 
									?>
									<tr>
										<td><?php echo htmlentities($row->first_name);?>&nbsp;<?php echo htmlentities($row->middle_name);?>&nbsp;<?php echo htmlentities($row->last_name);?></td>
										<td><?php echo htmlentities($row->cardName);?> (<?php echo htmlentities($row->card_no);?>)</td>
										<td><?php echo htmlentities($row->address);?></td>
										<td><?php echo htmlentities($row->mobile);?></td>
										<td><?php echo htmlentities($row->visit_purpose);?></td>
										<td><?php echo htmlentities($row->time_in);?></td>


									</tr>
									<?php 
								}
							} else { ?>
								<tr>
									<td colspan="9"><h6 class="text-center">No record found</h6></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

</div>
<?php
							// Close the database connection
$dbh = null;
?> 




<!-- /Page Content -->










</div>
<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->

<?php @include("../includes/foot.php");?>

<?php @include("../includes/footer.php");?>

</body>
</html>