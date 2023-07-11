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
	<?php// @include("../includes/sidebar.php");?>
</div>
<!-- /Sidebar -->


<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">
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
				
				<?php
//session_start();
				error_reporting(0);
//include('../includes/dbconnection.php');
//include('../includes/check_login.php');

				if (isset($_POST['update_password'])) {
					$old_password = md5($_POST['old_password']);
					$new_password = md5($_POST['new_password']);
					$confirm_password = md5($_POST['confirm_password']);
					$user_id = $_SESSION['visaid'];

    // Check if the old password matches the current password
					$sql = "SELECT password FROM staff_tb WHERE id = ?";
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(1, $user_id, PDO::PARAM_INT);
					$stmt->execute();
					$result = $stmt->fetch();

					if ($result['password'] != $old_password) {
						echo "<script>alert('Old password is incorrect.');</script>";
					} else if ($new_password != $confirm_password) {
						echo "<script>alert('New password and confirm password do not match.');</script>";
					} else {
        // Update the password
						$sql = "UPDATE staff_tb SET password = ? WHERE id = ?";
						$stmt = $dbh->prepare($sql);
						$stmt->bindParam(1, $new_password, PDO::PARAM_STR);
						$stmt->bindParam(2, $user_id, PDO::PARAM_INT);
						$stmt->execute();
						if ($stmt->execute()){
            //echo "<script>alert('Password updated successfully.');</script>";
							$url = $_SERVER['REQUEST_URI'];
							$referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
							$action = 'update';
							$ip = $_SERVER['REMOTE_ADDR'];
							$user_id = $_SESSION['visaid'];
							$record_id = $user_id;
							logActivity66($dbh, $url, $referrer, $action, $ip, $user_id, $record_id);
							echo "<script>alert('Password reset successfully please login for your new password.');window.location.href = '../includes/logout.php';</script>";
						}else{
							echo '<script>alert("Update failed! Please try again later.")</script>';
						}
					}
				}
				?>

				<form method="POST">
					<div class="form-group">
						<label>Old password</label>
						<input type="password" name="old_password" class="form-control">
					</div>
					<div class="form-group">
						<label>New password</label>
						<input type="password" name="new_password" class="form-control">
					</div>
					<div class="form-group">
						<label>Confirm password</label>
						<input type="password" name="confirm_password" class="form-control">
					</div>
					<div class="submit-section">
						<button class="btn btn-primary submit-btn" name="update_password">Update Password</button>
					</div>
				</form>

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