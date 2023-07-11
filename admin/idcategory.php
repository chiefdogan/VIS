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
								<h3 class="page-title">IDS</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">IDS</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title mb-0">New IDS</h4>
								</div>
								<div class="card-body">
									<form action="addIDS.php" method="post">
									<div class="form-group">
										<label>IDS Name <span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="IDS" class="col-md-6" required >
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn" name="addIDS">Register</button>
									</div>
								</form>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card mb-0">
								<div class="card-header">
									<h4 class="card-title mb-0">IDS List</h4>	
								</div>
								<div class="card-body">
								  <div class="table-responsive">
								 <table class="table table-hover mb-0 datatable-designation">
									<thead>
										<tr>
											<th style="width: 30px;">#</th>
											<th>Name</th>
											<th>Status</th>
											<th >Action</th>
										</tr>
									</thead>
									<tbody>
										  <?php
										  $sql = "SELECT * FROM idcategory_tb";
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
											<td><?php if($row->status=="1"){
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
															<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_ids<?php echo ($row->id); ?>" id="<?php echo ($row->id); ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
															<?php if ($row->status == 1) { ?>
																<a class="dropdown-item" href="#" data-toggle="modal" data-target="#deactivate_ids<?php echo ($row->id); ?>" id="<?php echo ($row->id); ?>"><i class="fa fa-ban"></i> Deactivate</a>
															<?php } else { ?>
																<a class="dropdown-item" href="#" data-toggle="modal" data-target="#activate_ids<?php echo ($row->id); ?>" id="<?php echo ($row->id); ?>"><i class="fa fa-check"></i> Activate</a>
															<?php } ?>
														</div>
													</div>
												</td>



												<!-- Activate Office Modal -->
												<div id="activate_ids<?php echo ($row->id); ?>" class="modal custom-modal fade" role="dialog">
													<div class="modal-dialog modal-dialog-centered">
														<div class="modal-content">
															<div class="modal-body">
																<form>
																	<div class="form-header">
																		<h3>Ativate ID</h3>
																		<p>Are you sure want to Activate?</p>
																	</div>
																	<div class="modal-btn delete-action">
																		<div class="row">
																			<div class="col-6">
																				<a href="activate_ids.php?activate_ids=<?php echo ($row->id); ?>" class="btn btn-primary continue-btn">Activate</a>
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



												<!-- Deactivate ID Modal -->
												<div id="deactivate_ids<?php echo ($row->id); ?>" class="modal custom-modal fade" role="dialog">
													<div class="modal-dialog modal-dialog-centered">
														<div class="modal-content">
															<div class="modal-body">
																<form>
																	<div class="form-header">
																		<h3>Deactivate ID</h3>
																		<p>Are you sure want to deactivate?</p>
																	</div>
																	<div class="modal-btn delete-action">
																		<div class="row">
																			<div class="col-6">
																				<a href="deactivate_ids.php?deactivate_ids=<?php echo ($row->id); ?>" class="btn btn-primary continue-btn">Deactivate</a>
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


												<!-- Edit ids Modal -->
												<div id="edit_ids<?php echo  ($row->id); ?>" class="modal custom-modal fade" role="dialog">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Edit IDS</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<form action="edit_IDS.php" method="post">
																	<input type="hidden" name="ids_id" value="<?php echo $row->id;?>">
																	<div class="form-group">
																		<label>IDS Name <span class="text-danger">*</span></label>
																		<input class="form-control" value="<?php  echo htmlentities($row->name);?>" type="text" name="iname" required >

																	</div>
																	
																	<div class="submit-section">
																		
																		<button class="btn btn-primary submit-btn" name="UpdateIDS">Update</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
												<!-- /Edit ids Modal -->	




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


					<!-- Edit Designation Modal -->
<!-- 				<div id="edit_ids" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit IDS</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group">
										<label>IDS Name <span class="text-danger">*</span></label>
										<input class="form-control" value="" type="text" required name="edit_ids">
									</div>

									<div class="form-group">
											<label class="d-block">Status</label>
											<div class="status-toggle">
												<input type="checkbox" id="upgrade_plan_status" class="check" name="edit_status">
												<label for="upgrade_plan_status" class="checktoggle">checkbox</label>
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
		 /Edit Designation Modal -->	

					<!-- Delete IDS Modal -->
				<!-- <div class="modal custom-modal fade" id="delete_ids" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-header">
									<h3>Delete IDS</h3>
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
				</div> --> -->
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

