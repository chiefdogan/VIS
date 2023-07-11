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
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Office</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Office</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
								<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_designation"><i class="fa fa-plus"></i> Add Office</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="card mb-0">
							<div class="table-responsive">
								<div class="card-body">
								<table class="table table-hover mb-0 datatable">
									<thead>
										<tr>
											<th style="width: 30px;">#</th>
											<th>Office </th>
											<th>Branch</th>
											<th >Action</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										  <?php
										  $sql = "SELECT o.id,o.name as office ,c.name as branch FROM office_tb o
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
											<td><a  href="#" class="btn btn-primary btn-sm"  id="<?php echo  ($row->id); ?>" data-toggle="modal" data-target="#edit_office">Edit</a></td>
											<td>
												<div class="status-toggle">
													<input type="checkbox"  id='company_status' class="check" checked value="0">
													<label for="company_status" class="checktoggle">checkbox</label>
												</div>
											</td>
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
				<!-- /Page Content -->

				<!-- Add Office Modal -->
				<div id="add_designation" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Office</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="addoffice.php" method="post">
									<div class="form-group">
										<label>Office Name <span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="oname">
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
				</div>
				<!-- /Add Designation Modal -->
				
				<!-- Edit Designation Modal -->
				<div id="edit_office" class="modal custom-modal fade" role="dialog">
					
					   <?php @include("update_office.php");?>
					   
					
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
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->
		
		<?php @include("../includes/foot.php");?>

    </body>
</html>