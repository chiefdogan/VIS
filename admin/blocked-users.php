<?php
session_start();
error_reporting(0);
include("../includes/logger.php");
include("../includes/footer.php");
if(isset($_GET['restoreid']))
{
$url = $_SERVER['REQUEST_URI'];
$referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
$rid=intval($_GET['restoreid']);
$user_id = $_SESSION['visaid'];
$record_id = $rid; // replace with the ID of the affected record
$action = 'update'; // replace with the action performed (insert, update, or delete)
$sql="update staff_tb set status='1' where id='$rid'";
$query=$dbh->prepare($sql);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
$query->execute();
if ($query->execute()){
echo "<script>alert('User Restored');</script>"; 
echo "<script>window.location.href = 'users.php'</script>";
logActivity6($dbh,$url, $referrer, $action, $_SERVER['REMOTE_ADDR'], $user_id, $record_id);
}else{
echo '<script>alert("update failed! try again later")</script>';
}

}
?>
<div class="table-responsive">
<h4 class="card-title">Manage Users</h4>
<table class="table align-items-center table-flush table-hover datatable-blocked">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Email</th>
			<th>Mobile</th>
			<th class="text-center">Status</th>
			<th class="text-center">Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sql="SELECT * from staff_tb where Status='0'  ";
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
					<td>
						<strong>1</strong>
					</td>
					<td><?php  echo htmlentities($row->first_name);?>&nbsp;<?php  echo htmlentities($row->last_name);?></td>
					<td><?php  echo htmlentities($row->email);?></td>
					<td><?php  echo htmlentities($row->mobile);?></td>
					<td class="text-center">
						
						<span class="badge bg-inverse-danger">In-active</span>
						
					</td>
					<td class="text-center">
						<a href="blocked-users.php?restoreid=<?php echo ($row->id);?>" onclick="return confirm('Do you really want to Restore user ?');" title="Restore this User">restore</i></a>
					</td>
				</tr>

				<?php $cnt=$cnt+1;
			}
		} ?>
		
	</tbody>
</table>
</div>