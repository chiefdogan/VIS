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

							<!-- Alerts -->
							<div class="row">
								<div class="col-md-12">

								</div>
							</div>
							<!-- /Alerts -->

							<!-- Page Header -->
							<div class="page-header">
								<div class="row">
									<div class="col-sm-12">
										<h3 class="page-title">
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

													Welcome, <?php  echo $row->first_name;?> <?php  echo $row->last_name;?></h3>
													<ul class="breadcrumb">
														<li class="breadcrumb-item active">Dashboard</li>
													</ul>

												</div>
											</div>
										</div>
										<!-- /Page Header -->
										<?php
									}
								}
								?>

								<div class="row">
									<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
										<div class="card dash-widget">
											<div class="card-body">
												<span class="dash-widget-icon"><i class="fa fa-group"></i></span>
												<div class="dash-widget-info">
													<?php
				          //todays visitors
													$query=mysqli_query($conn,"select id from visit_tb where date(time_in)=CURDATE();");
													$count_today_visitors=mysqli_num_rows($query);
													?> 
													<h3><?php echo $count_today_visitors;?></h3>
													<span>Today</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
										<div class="card dash-widget">
											<div class="card-body">
												<span class="dash-widget-icon"><i class="fa fa-rotate-left"></i></span>
												<div class="dash-widget-info">
													<?php

													$query2=mysqli_query($conn,"select id from visit_tb where date(time_in)>=(DATE(NOW()) - INTERVAL 31 DAY);");
													$count_permonth_visitors=mysqli_num_rows($query2);
													?>              
													<h3><?php echo $count_permonth_visitors?></h3>
													<span>Monthly</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
										<div class="card dash-widget">
											<div class="card-body">
												<span class="dash-widget-icon"><i class="fa fa-outdent"></i></span>
												<div class="dash-widget-info">
													<?php
													$query3=mysqli_query($conn,"select id from visit_tb where date(time_in)>=(DATE(NOW()) - INTERVAL 365 DAY);");
													$count_peryear_visitors=mysqli_num_rows($query3);
													?>   
													<h3><?php echo $count_peryear_visitors?></h3>
													<span>Year</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
										<div class="card dash-widget">
											<div class="card-body">
												<span class="dash-widget-icon"><i class="fa fa-th-large"></i></span>
												<div class="dash-widget-info">
													<?php

													$query4=mysqli_query($conn,"select id from visit_tb");
													$count_total_visitors=mysqli_num_rows($query4);
													?>     
													<h3><?php echo $count_total_visitors?></h3>
													<span>Total </span>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- Statistics Widget -->	
								<?php
				                  /*$aid=$_SESSION['visaid'];
				                          $sql="SELECT * from  staff_tb where id=:aid";
				                               $query = $dbh -> prepare($sql);
				                                   $query->bindParam(':aid',$aid,PDO::PARAM_STR);
				                                        $query->execute();
				                                            $results=$query->fetchAll(PDO::FETCH_OBJ);
				                                                $cnt=1;
				                                                      if($query->rowCount() > 0)
				                                                            {  
				                                                               foreach($results as $row)
				                                                                 { 
				                                                                   if($row->designation_id=="1"  )
				                                                                                   { 
				        */

				// <?php


				// // Retrieve data from database
				// $year_data = array();
				// $month_data = array();
				// $week_data = array();

				// // Retrieve data by year
				// $sql = "SELECT YEAR(date) AS year, COUNT(*) AS count FROM visit_tb GROUP BY YEAR(date) ORDER BY YEAR(date) ASC";
				// $result = $conn->query($sql);
				// while ($row = $result->fetch_assoc()) {
				//     $year_data[] = array('y' => $row['year'], 'a' => $row['count']);
				// }

				// // Retrieve data by month
				// $sql = "SELECT CONCAT(YEAR(date), '-', MONTH(date)) AS month, COUNT(*) AS count FROM visit_tb GROUP BY YEAR(date), MONTH(date) ORDER BY YEAR(date) ASC, MONTH(date) ASC";
				// $result = $conn->query($sql);
				// while ($row = $result->fetch_assoc()) {
				//     $month_data[] = array('y' => $row['month'], 'a' => $row['count']);
				// }

				// // Retrieve data by week
				// $sql = "select id from visit_tb where date(time_in)>=(DATE(NOW()) - INTERVAL 31 DAY";
				// $result = $conn->query($sql);
				// while ($row = $result->fetch_assoc()) {
				//     $week_data[] = array('y' => $row['week'], 'a' => $row['count']);
				// }

				// // Close database connection
				// $conn->close();
				// ?>









				<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-6 text-center">
				<div class="card">
					<div class="card-body">
						<?php
							$query2=mysqli_query($conn,"select id from staff_tb;");
							$count_total_staff=mysqli_num_rows($query2);
						?>             
						<h3 class="card-title"><span class="dash-widget-icon"><i class="fas fa-users"></i></span> Total Staff</h3>
						<div id="bar-chartds">
							<h3><?php echo $count_total_staff?></h3>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 text-center">
				<div class="card">
					<div class="card-body">
						<?php
							$query2=mysqli_query($conn,"select id from office_tb");
							$count_total_office=mysqli_num_rows($query2);
						?>             
						<h3 class="card-title"><span class="dash-widget-icon"><i class="far fa-envelope"></i></span> Total Office</h3>
						<div id="line-chartsd">
							<h3><?php echo $count_total_office;?></h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Recent Visitors</h3>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Fullname</th>
                                            <th>Time In</th>
                                            <th>Time Out</th>
                                            <th>Purpose</th>
                                            <th>Card No</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        error_reporting(E_ALL);
                                        ini_set('display_errors', 1);

                                        $aid = $_SESSION['visaid'];
                                        $sql = "SELECT v.id as visit_id, v.card_no, v.time_in as time_in, v.time_out as time_out, v.to_whom as to_whom, v.address as address, v.id_number as idsNumber, p.name as visit_purpose, v.idcategory as category, v.staff_id, v.visitor_id as visitorID, v.districts_id as districtsID, v.logs_id as logs, v.office_id as officeID, s.first_name, s.middle_name, s.last_name, s.mobile, i.name as cardName, d.name as districtName, b.email as email
                                                FROM visit_tb v
                                                LEFT JOIN visitor_tb s ON v.visitor_id = s.id
                                                LEFT JOIN office_tb o ON v.office_id = o.id
                                                LEFT JOIN idcategory_tb i ON v.idcategory = i.id
                                                LEFT JOIN staff_tb b ON v.staff_id = b.id
                                                LEFT JOIN visit_purpose_tb p ON v.visit_purpose = p.id
                                                LEFT JOIN districts_tb d ON v.districts_id = d.id
                                                WHERE v.staff_id = :aid
                                                AND DATE(v.time_in) = CURDATE()";

                                        $query = $dbh->prepare($sql);
                                        $query->bindParam(':aid', $aid, PDO::PARAM_STR);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $row) {
                                                ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($row->first_name); ?>&nbsp;<?php echo htmlentities($row->middle_name); ?>&nbsp;<?php echo htmlentities($row->last_name); ?></td>
                                                    <td><?php echo htmlentities($row->time_in); ?></td>
                                                    <td><?php echo htmlentities($row->time_out); ?></td>
                                                    <td><?php echo htmlentities($row->visit_purpose); ?></td>
                                                    <td><?php echo htmlentities($row->card_no); ?></td>
                                                    <td>
                                                        <?php
                                                        if ($row->time_out == NULL) {
                                                            echo '<span class="badge bg-inverse-success">Active</span>';
                                                        } else {
                                                            echo '<span class="badge bg-inverse-danger">In-active</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php $cnt = $cnt + 1;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            // Get the recent activity for the current user
            $staff_tb_id = $_SESSION['visaid'];
            $recentActivity = getRecentActivity($staff_tb_id);
            ?>

            <div class="col-md-4">
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


	</div>

							 <?php /*
				        } 
				    }
				} */?> 
				<!-- /Statistics Widget -->			

			</div>
			<!-- /Page Content -->

		</div>
		<!-- /Page Wrapper -->

	</div>
	<!-- /Main Wrapper -->




	<?php @include("../includes/foot.php");?>

</body>
</html>