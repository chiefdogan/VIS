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
			<div class="row">
				<div class="col-md-12">
					<div class="welcome-box">
<!-- <div class="welcome-img">
<img alt="" src="../assets/img/logoo.png">
</div> -->

<?php
$aid=$_SESSION['visaid'];
$sql = "SELECT *
FROM staff_tb
JOIN designation_tb ON staff_tb.designation_id = designation_tb.id
JOIN office_branch_tb ON staff_tb.office_branch_id = office_branch_tb.id 
WHERE staff_tb.id=:aid";
                    //$sql="SELECT * from  staff_tb where id=:aid";
$query = $dbh -> prepare($sql);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0){
	foreach($results as $row) { 


		?>
		<div class="welcome-det">
			<h3 class="font-20 weight-500 mb-10 text-capitalize">Welcome Back, <div class="weight-600 font-30 text-blue"> <?php  echo $row->first_name;?> <?php  echo $row->last_name;?></div></h3>
			<p class="font-18 max-width-600">you are in an institution established to serve the wider Tanzania community and Africa.</p>
		</div>
	</div>
</div>
</div>
<?php
}
}
?>

<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-6 ">
				<div class="card dash-widget">
					<div class="card-body">
						<span class="dash-widget-icon"><i class="fa fa-user"></i></span>
						<div class="dash-widget-info">
							<?php
//todays visitors
							$query=mysqli_query($conn,"select id from staff_tb ");
							$count_today_visitors=mysqli_num_rows($query);
							?> 
							<h3><?php echo $count_today_visitors;?></h3>
							<span>Staff</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 ">
				<div class="card dash-widget">
					<div class="card-body">
						<span class="dash-widget-icon"><i class="fa fa-group"></i></span>
						<div class="dash-widget-info">
							<?php
//todays visitors
							$query=mysqli_query($conn,"SELECT id FROM visit_tb WHERE time_out IS NULL;");
							$count_today_visitors=mysqli_num_rows($query);
							?> 
							<h3><?php echo $count_today_visitors;?></h3>
							<span>Active Visitors</span>
						</div>
					</div>
				</div>
			</div>

			<?php
     		// get the recent activity for the current user
			$staff_tb_id = $_SESSION['visaid'];
			$recentActivity = getRecentActivity($staff_tb_id);
			?>

			<div class="col-md-12">
				<div class="card recent-activity">
					<div class="card-body">
						<h5 class="card-title">Today Activity</h5>
						<ul class="res-activity-list">
							<?php foreach ($recentActivity as $log): ?>
								<li>
									<p class="mb-0"><?= ucfirst($log['ip']) ?>: <?= $log['description'] ?></p>
									<p class="res-activity-time">
										<i class="fa fa-clock-o"></i>
										<?= date('Y-m-d H:i:s', strtotime($log['date'])) ?>
									</p>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>

		</div>
	</div>

</div>

<?php
//include '../include/dbconnection.php'; // Include the database connection code



$sql = "SELECT v.id as visit_id,v.card_no,v.time_in as time_in,v.time_out as time_out,v.to_whom as to_whom,v.address as address,v.id_number as idsNumber,v.visit_purpose as visit_purpose,v.idcategory as category, v.staff_id  , v.visitor_id as visitorID, v.districts_id as districtsID, v.logs_id as logs, v.office_id as officeID, s.first_name, s.middle_name,s.last_name, s.mobile , i.name as cardName, d.name as districtName,b.email as email
FROM visit_tb v
LEFT JOIN visitor_tb s ON v.visitor_id = s.id
LEFT JOIN office_tb o ON v.office_id = o.id
LEFT JOIN idcategory_tb i ON v.idcategory = i.id
LEFT JOIN staff_tb b ON v.staff_id = b.id
LEFT JOIN districts_tb d ON v.districts_id = d.id
WHERE time_out IS NULL"; // Modify the SQL query to suit your database structure and query requirements

$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;

?>

<!-- HTML code for the table -->
<div class="row">
	<div class="col-lg-12">
		<div class="card-header">
			<h4 class="card-title mb-0">Recent  Active Visitors</h4>    
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover mb-0 datatable">
					<thead>
						<tr>
							<th>#</th>
							<th>Fullname </th>
							<th>Time In</th>
							<th>Purpose</th>
							<th>Tbs Card</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if($query->rowCount() > 0){
							foreach($results as $row) { 
								?>
								<tr>
									<td><?php echo htmlentities($cnt);?></td>
									<td><?php echo htmlentities($row->first_name);?>&nbsp;<?php echo htmlentities($row->middle_name);?>&nbsp;<?php
									echo htmlentities($row->last_name);?></td>
									<td><?php echo htmlentities($row->time_in);?></td>
									<td><?php echo htmlentities($row->visit_purpose);?></td>
									<td><?php echo htmlentities($row->cardName);?> (<?php echo htmlentities($row->card_no);?>)</td>
									<td><?php if(empty($row->time_out)){
										echo '<span class="badge badge-warning">Active</span>';
									} else {
										echo '<span class="badge badge-success">Completed</span>';
									}?></td>
								</tr>
								<?php 
								$cnt++;
							} 
						} else {?>
							<tr>
								<td colspan="7">No Visitor Record Found</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- End of HTML code for the table --> 
<?php
// Close the database connection
$dbh = null;
?> 
<!-- End of PHP code -->


</div>
<!-- /Page Content -->

</div>
<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->

<?php @include("../includes/foot.php");?>

</body>
</html>