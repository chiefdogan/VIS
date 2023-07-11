<?php

//includes the file for user permission
include("../includes/check_login.php");
//include("../includes/logger.php");

check_login();
if(isset($_GET['checkOutID']))
{
// $url = $_SERVER['REQUEST_URI'];
// $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
	$rid=intval($_GET['checkOutID']);
// $user_id = $_SESSION['visaid'];
// $record_id = $rid; // replace with the ID of the affected record
// $action = 'update'; // replace with the action performed (insert, update, or delete)
	$time_out = date('Y-m-d H:i:s');
	$sql="update visit_tb set time_out='$time_out' where visitor_id='$rid'";
	$query=$dbh->prepare($sql);
	$query->bindParam(':rid',$rid,PDO::PARAM_STR);
	$query->execute();
	if ($query->execute()){
		$url = $_SERVER['REQUEST_URI'];
		$referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
		$action = 'update';
		$ip = $_SERVER['REMOTE_ADDR'];
		$user_id = $_SESSION['visaid'];
		$record_id = $rid;
		logActivity66($dbh, $url, $referrer, $action, $ip, $user_id, $record_id);
		echo "<script>alert('User Signed Out');</script>"; 
		echo "<script>window.location.href = 'visitors-list.php'</script>";
//logActivity66($dbh,$url, $referrer, $action, $_SERVER['REMOTE_ADDR'], $user_id, $record_id);
	}else{
		echo '<script>alert("Failed to Sign Out Visitors!! try again ")</script>';
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

				</div>
			</div>
			<!-- /Page Header -->



			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-striped custom-table datatable-signout">
							<thead>
								<tr>
									<th>#</th>
									<th>FullName</th>
									<th>Tbs Card</th>
									<th>Address</th>
									<th>Mobile</th>
									<th>Purpose</th>
									<th>Timein</th>
									<th>Status</th>
									<th></th>
									<th class="text-right">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php


								$sql = "SELECT v.id as visit_id,v.card_no,v.time_in,v.time_out,v.to_whom,v.address,v.id_number as idsNumber,p.name as purpose,v.idcategory as category, v.staff_id as staffID , v.visitor_id as visitorID, v.districts_id as districtsID, v.logs_id as logs, v.office_id as officeID, s.first_name, s.middle_name,s.last_name, s.mobile as mobileNumber , i.name as cardName, d.name as districtName, s.id as visitorIDs , o.name as officeName
								FROM visit_tb v
								LEFT JOIN visitor_tb s ON v.visitor_id = s.id
								LEFT JOIN office_tb o ON v.office_id = o.id
								LEFT JOIN idcategory_tb i ON v.idcategory = i.id
								LEFT JOIN staff_tb b ON v.staff_id = b.id
								LEFT JOIN visit_purpose_tb p ON v.visit_purpose = p.id
								LEFT JOIN districts_tb d ON v.districts_id = d.id
								WHERE  v.time_out IS NULL";
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
												<?php  echo htmlentities($row->first_name);?>&nbsp;<?php  echo htmlentities($row->middle_name);?>&nbsp;<?php  echo htmlentities($row->last_name);?> 
											</td>
											<td><?php echo ($row->card_no);?></td>
											
											<td><?php  echo htmlentities($row->address);?></td>
											<td><?php  echo htmlentities($row->mobileNumber);?></td>
											<td><?php  echo htmlentities($row->purpose);?></td>
											<td><?php  echo htmlentities($row->time_in);?></td>
											
											<td>
												<?php

												if ($row->time_out == NULL) {
													echo '<span class="badge bg-inverse-success">Active</span>';
												} 
												else
												{
													echo '<span class="badge bg-inverse-danger">In-active</span>';
												}
												?>

											</td>
											<td><a class="btn btn-sm btn-primary" href="visitors-list.php?checkOutID=<?php echo ($row->visitorID);?>" onclick="return confirm('Do you really want to Sign Out This Visitor ?');" >CHECK OUT</a></td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<!-- <a class="dropdown-item" href="visitors.php" data-toggle="modal"><i class="fa fa-pencil m-r-5"></i>Add New Visitor</a> -->
														
														<a class="dropdown-item" href="view_visit_details.php?visitorId=<?php echo ($row->visitorID);?>" data-id="<?php echo $row->visitorID; ?>" >
															<i class="fa fa-eye" href=""></i> View profile</a>

														</div>
													</div>
												</td>


												<!-- Add Client Modal -->
												<div id="add_visitor" class="modal custom-modal fade" role="dialog">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Register visitor</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<form>
																	<div class="row">
																		<div class="col-md-6">
																			<div class="form-group">
																				<label >First Name <span class="text-danger"></span></label>
																				<input class="form-control" type="text">
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<label >Middle Name</label>
																				<input class="form-control" type="text">
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<label >Last Name</label>
																				<input class="form-control" type="text">
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<label >Mobile</label>
																				<input class="form-control" type="text">
																			</div>
																		</div>


																		<div class="col-md-6">
																			<div class="form-group">
																				<label>Regions</label>
																				<select class="select">
																					<option>mwanza</option>
																					<option>kigoma</option>
																					<option>simiyu</option>
																				</select>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<label>District</label>
																				<select class="select">
																					<option>mwanza</option>
																					<option>kigoma</option>
																					<option>simiyu</option>
																				</select>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<label >Address</label>
																				<input class="form-control" type="text">
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<label >Whom to meet <span class="text-danger"></span></label>
																				<input class="form-control" type="text">
																			</div>
																		</div>
																		<div class="col-md-12">
																			<div class="form-group">
																				<label>Department</label>
																				<select class="select">
																					<option>ICT</option>
																					<option>HR</option>
																					<option>LAB</option>
																				</select>
																			</div>
																		</div>
																		<div class="col-md-12">
																			<div class="form-group">
																				<label>Visit Purpose</label>
																				<textarea class="form-control"></textarea>
																			</div>
																		</div>

																		<div class="col-md-6">
																			<div class="form-group">
																				<label>ID Type</label>
																				<select class="select">
																					<option>NIDA</option>
																					<option>NEC CARD</option>
																					<option>DRIVING LICENCE</option>
																					<option>UNIVERSITY CARD</option>
																					<option>STUDENT ID</option>
																					<option>Others</option>
																				</select>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<label >ID No.</label>
																				<input class="form-control" type="text">
																			</div>
																		</div>
																	</div>

																	<div class="submit-section">
																		<button class="btn btn-primary submit-btn">Register</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
												<!-- /Add Client Modal -->

												<!-- Edit Client Modal -->
												<div id="edit_client<?php echo $row->visitorID; ?>" class="modal custom-modal fade" role="dialog">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Edit visitor</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<form>
																	<div class="row">
																		<div class="col-md-4">
																			<div class="form-group">
																				<label class="col-form-label">First Name <span class="text-danger"></span></label>
																				<input class="form-control" type="text">
																			</div>
																		</div>
																		<div class="col-md-4">
																			<div class="form-group">
																				<label class="col-form-label">Middle Name</label>
																				<input class="form-control" type="text">
																			</div>
																		</div>
																		<div class="col-md-4">
																			<div class="form-group">
																				<label class="col-form-label">Last Name</label>
																				<input class="form-control" type="text">
																			</div>
																		</div>
																		<div class="col-md-4">
																			<div class="form-group">
																				<label>Address</label>
																				<select class="select">
																					<option>mwanza</option>
																					<option>kigoma</option>
																					<option>simiyu</option>
																				</select>
																			</div>
																		</div>
																		<div class="col-md-4">
																			<div class="form-group">
																				<label class="col-form-label">Whom to meet <span class="text-danger"></span></label>
																				<input class="form-control" type="text">
																			</div>
																		</div>
																		<div class="col-md-4">
																			<div class="form-group">
																				<label>Department</label>
																				<select class="select">
																					<option>ICT</option>
																					<option>HR</option>
																					<option>LAB</option>
																				</select>
																			</div>
																		</div>
																		<div class="col-md-8">
																			<div class="form-group">
																				<label class="col-form-label">Purpose <span class="text-danger"></span></label>
																				<textarea class="form-control floating" ></textarea>
																			</div>
																		</div>
																		<div class="col-md-4">
																			<div class="form-group">
																				<label class="col-form-label">Mobile</label>
																				<input class="form-control" type="text">
																			</div>
																		</div>

																		<div class="col-md-4">  
																			<div class="form-group">
																				<label class="col-form-label">TBS Card No. <span class="text-danger"></span></label>
																				<input class="form-control floating" type="text">
																			</div>
																		</div>
																		<div class="col-md-4">
																			<div class="form-group">
																				<label>ID Type</label>
																				<select class="select">
																					<option>NIDA</option>
																					<option>NEC CARD</option>
																					<option>DRIVING LICENCE</option>
																					<option>UNIVERSITY CARD</option>
																					<option>STUDENT ID</option>
																					<option>Others</option>
																				</select>
																			</div>
																		</div>
																		<div class="col-md-4">
																			<div class="form-group">
																				<label class="col-form-label">ID No.</label>
																				<input class="form-control" type="text">
																			</div>
																		</div>
																	</div>

																	<div class="submit-section">
																		<button class="btn btn-primary submit-btn">Update</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
												<!-- /Edit Client Modal -->

												<!-- Delete Client Modal -->
												<div class="modal custom-modal fade" id="delete_client" role="dialog">
													<div class="modal-dialog modal-dialog-centered">
														<div class="modal-content">
															<div class="modal-body">
																<div class="form-header">
																	<h3>Delete Client</h3>
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
												<!-- /Delete Client Modal -->












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
			


		</div>
		<!-- /Page Wrapper -->

	</div>
	<!-- /Main Wrapper -->

	<?php @include("../includes/foot.php");?>
	<?php @include("../includes/footer.php");?>
</body>
</html>