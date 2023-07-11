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
                	<?php

                       $staff_id=$_SESSION['visaid'];
                       $cpassword=md5($_POST['current_password']);
                       $newpassword=md5($_POST['new_password']);
			           $sql ="select * from staff_tb where id = '$staff_id'";
			           $query= $dbh ->prepare($sql);
                       $query-> bindParam(':visaid', $staff_id, PDO::PARAM_STR);
                       $query-> execute();
                       $results = $query -> fetchAll(PDO::FETCH_OBJ);
                       if($query->rowCount() > 0)
                                                                       {
                                                                         foreach($results as $row)

                                                                        {   

					?>		
					<div class="row">
						<div class="col-md-6 offset-md-3">
						
							<!-- Page Header -->
							<div class="page-header">
								<div class="row">
									<div class="col-sm-12">
										<h3 class="page-title">Change Password</h3>
									</div>
								</div>
							</div>
							<!-- /Page Header -->
							
							<form action="changepass.php" id="change_password" method="post">
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

							<?php 

                                                }
                                            } 

                                            ?>
						</div>
					</div>
				</div>
				<!-- /Page Content -->
				
			</div>
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->
		
		<?php @include("../includes/foot.php");?>
    </body>
</html>
