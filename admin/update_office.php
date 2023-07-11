<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['editoffice']))
{
  $adminid=$_SESSION['editid2'];
  $BranchEditID=$_POST['branchEdit'];;
  $OfficeEditName=$_POST['officenameEdit'];
  $sql4="update office_tb set name=:officenameEdit,office_branch_id=:branchEdit where id=:aid";
  $query4 = $dbh->prepare($sql4);
  $query4->bindParam(':branchEdit',$BranchEditID,PDO::PARAM_STR);
  $query4->bindParam(':officenameEdit',$OfficeEditName,PDO::PARAM_STR);
  $query4->bindParam(':aid',$adminid,PDO::PARAM_STR);
  $query4->execute();
  if ($query4->execute()){
    echo '<script>alert("Profile has been updated")</script>';
  }else{
    echo '<script>alert("update failed! try again later")</script>';
  }
}
?>
<div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit office</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">
                <form action="update-Office.php" method="post" enctype="multipart/form-data">
    <?php
    $eid=$_POST['edit_office'];
    $sql="SELECT * from  office_tb where office_tb.id=:eid";
    $query = $dbh -> prepare($sql);
    $query-> bindParam(':eid', $eid, PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
      foreach($results as $row)
      { 
        $_SESSION['editid2']=$row->id;
        ?>
          <div class="form-group">
            <label>Office Name <span class="text-danger">*</span></label>
                    
                    <input class="form-control" value="<?php  echo $row->name;?>" type="text" name="officenameEdit">
                  </div>
                  <div class="form-group">
                    <label>Branch <span class="text-danger">*</span></label>
                    <select class="select" name="branchEdit">
                    <?php  echo "<option value='".$row["id"]."'>".$row["name"]."</option>";?>
                    </select>
                  </div>
                   <?php $cnt=$cnt+1;
      }

  } 

?>
                  <div class="submit-section">
                    <button class="btn btn-primary submit-btn" name="editoffice">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>