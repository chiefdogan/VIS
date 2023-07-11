<?php

//includes the file for user permission
include("../includes/check_login.php");
check_login();

if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from staff_tb  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();

$msg="Data Deleted successfully";
}

if(isset($_POST['submit']))
{
$staffid=intval($_GET['staffid']);
$designation=$_POST['designation'];
$branch=$_POST['branch'];
$sql="update staff_tb set designation_id=:designation,office_branch_id=:branch where id=:staffid";
$query = $dbh->prepare($sql);
$query->bindParam(':designation',$designation,PDO::PARAM_STR);
$query->bindParam(':branch',$branch,PDO::PARAM_STR);
$query->bindParam(':staffid',$staffid,PDO::PARAM_STR);
$query->execute();

$msg="Data updated successfully";

}
 ?>


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
								<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_user"><i class="fa fa-plus"></i> Add User</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
<!-- Search Filter -->
					<div class="row filter-row">
						<div class="col-sm-6 col-md-3">  
							<div class="form-group form-focus">
								<input type="text" class="form-control floating">
								<label class="focus-label">Name</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3"> 
							<div class="form-group form-focus select-focus">
								<select class="select floating"> 
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
								<label class="focus-label">Branch</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3"> 
							<div class="form-group form-focus select-focus">
								<select class="select floating"> 
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
								<label class="focus-label">Role</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">  
							<a href="#" class="btn btn-success btn-block"> Search </a>  
						</div>     
                    </div>
					<!-- /Search Filter -->

					<!-- Company List -->
<div class="row">
    <div class="col-md-12">
        <div class="card mb-0">
							<div class="table-responsive">
								<div class="card-body">
								<table class="table table-hover mb-0 datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>PF N0</th>
                        <th>Created</th>
                        <th>Branch</th>
                        <th>Role</th>
                        <th>Action</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT staff_tb.*, designation_tb.name as designation_name, office_branch_tb.name as branch_name
                        FROM staff_tb
                        JOIN designation_tb ON staff_tb.designation_id = designation_tb.id
                        JOIN office_branch_tb ON staff_tb.office_branch_id = office_branch_tb.id";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        $cnt = 1;
                        if ($query->rowCount() > 0) {
                            foreach ($results as $row) {
                    ?>
                    <tr>
                        <td><?php echo htmlentities($cnt); ?></td>
                        <td>
                            <h2 class="table-avatar">
                                <a href="client-profile.php" class="avatar"><img src="../profileimages/<?php echo $row->photo; ?>" alt="">
                                <a href="profile.php"><?php echo htmlentities($row->first_name); ?>&nbsp;<?php echo htmlentities($row->last_name); ?></a>
                            </h2>
                        </td>
                        <td><?php echo htmlentities($row->mobile); ?></td>
                        <td><?php echo htmlentities($row->email); ?></td>
                        <td><?php echo htmlentities($row->pf_no); ?></td>
                        <td><?php echo htmlentities(date("d-m-Y", strtotime($row->Regdate))); ?></td>
                        <td><?php echo htmlentities($row->branch_name); ?></td>
                        <td><?php echo htmlentities($row->designation_name); ?></td>
                        <td><a class="btn btn-primary btn-sm" href="edit-staff.php?id=<?php echo $row->id; ?>">Edit</a></td>
                        <td>
                            <div class="status-toggle">
                                <?php if ($row->status == 1) { ?>
                                    <input type="checkbox" id="staff_<?php echo $row->id; ?>" class="check" checked>
                                <?php } else { ?>
                                    <input type="checkbox" id="staff_<?php echo $row->id; ?>" class="check">
                                <?php } ?>
                                <label for="staff_<?php echo $row->id; ?>" class="checktoggle"></label>
                            </div>
                        </td>
                    </tr>
                    <?php
                                $cnt = $cnt + 1;
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /Company List -->


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
                                            
								<form action="reg.php" method="post">
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>First Name <span class="text-danger">*</span></label>
												<input class="form-control" type="text" name="fname">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Middle Name</label>
												<input class="form-control" type="text" name="mname">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Last Name</label>
												<input class="form-control" type="text" name="lname">
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
												<input class="form-control" type="password" name="password">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Confirm Password</label>
												<input class="form-control" type="password" name="cpassword" onBlur="checkAvailability3()">
											</div>
										</div>
										
										<div class="col-sm-6">
											<div class="form-group">
												<label>Mobile</label>
												<input class="form-control" type="text" name="mobileid" onBlur="checkAvailability4()" id="mobileid">
												<span id="user-availability-status4" style="font-size:12px;"></span> 
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Role</label>
												<select name="role" class="select">
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
					
					<!-- Upgrade Plan Modal -->
					<div class="modal custom-modal fade" id="upgrade_plan" role="dialog">
						<div class="modal-dialog modal-md modal-dialog-centered">
							<div class="modal-content">
								<button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
								<div class="modal-body">
									<h5 class="modal-title text-center mb-3">Upgrade Plan</h5>
									<form>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Plan Name</label>
													<input type="text" placeholder="Free Trial" class="form-control" value="Free Trial">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Amount</label>
													<input type="text" class="form-control" value="$500">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Plan Type</label>
													<select class="select"> 
														<option> Monthly </option>
														<option> Yearly </option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>No of Users</label>
													<select class="select"> 
														<option> 5 Users </option>
														<option> 50 Users </option>
														<option> Unlimited </option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>No of Projects</label>
													<select class="select"> 
														<option> 5 Projects </option>
														<option> 50 Projects </option>
														<option> Unlimited </option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>No of Storage Space</label>
													<select class="select"> 
														<option> 5 GB </option>
														<option> 100 GB </option>
														<option> 500 GB </option>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label>Plan Description</label>
											<textarea class="form-control" rows="4" cols="30"></textarea>
										</div>
										<div class="form-group">
											<label class="d-block">Status</label>
											<div class="status-toggle">
												<input type="checkbox" id="upgrade_plan_status" class="check">
												<label for="upgrade_plan_status" class="checktoggle">checkbox</label>
											</div>
										</div>
										<div class="m-t-20 text-center">
											<button class="btn btn-primary submit-btn">Save</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- /Upgrade Plan Modal -->
                </div>
				<!-- /Page Content -->
				
            </div>
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="../assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
		<script src="../assets/js/jquery.slimscroll.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="../assets/js/select2.min.js"></script>
		
		<!-- Custom JS -->
		<script src="../assets/js/app.js"></script>
		
    </body>
</html>