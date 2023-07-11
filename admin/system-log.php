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
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">System Log</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">System log</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table mb-0 datatablec" id="visitor-logs">
									<thead>
										<tr class="text-center">
											<th>Id</th>
											<th>Date</th>
											<th>Action</th>
											<th>Description</th>
											<th>Url</th>
											<th>Remote_ip</th>
											<th>Staff_id</th>
											<th >Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php

                             $sql = "SELECT * FROM activity_logs_tb
                             JOIN staff_tb ON activity_logs_tb.staff_tb_id = staff_tb.id ";
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
												<?php  echo htmlentities(date("Y-m-d H:i:s", strtotime($row->date)));?>
											</td>
											<td><strong><?php echo htmlentities($row->action);?></strong></td>
											<td><?php echo htmlentities($row->description);?></td>
											<td><?php echo htmlentities($row->url);?></td>
											<td><?php echo htmlentities($row->ip);?></td>
											<td><?php echo htmlentities($row->email);?></td>
											<td >
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_asset"><i class="fa fa-trash-o m-r-5"></i> Delete</a> -->
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
				<!-- /Page Content -->
			
				
				
				
				
				<!-- Delete Asset Modal -->
				<div class="modal custom-modal fade" id="delete_asset" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-header">
									<h3>Delete Logs</h3>
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
				<!-- /Delete Asset Modal -->
				
            </div>
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->
		
		<?php @include("../includes/foot.php");?>
		<?php @include("../includes/footer.php");?>
		
    </body>
</html>