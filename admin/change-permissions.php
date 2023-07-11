<?php
session_start();
include('../includes/dbconnection.php');

function sanitize_input($value) {
  return htmlspecialchars(trim($value));
}

if(isset($_POST['submit']))
{
  $eid=sanitize_input($_SESSION['edid']);
  $createuser=sanitize_input($_POST['createuser']);
  $deleteuser=sanitize_input($_POST['deleteuser']);
  $createbid=sanitize_input($_POST['createbid']);
  $updatebid=sanitize_input($_POST['updatebid']);

  $sql="UPDATE permissions SET createuser=:createuser, deleteuser=:deleteuser, createbid=:createbid, updatebid=:updatebid WHERE id=:eid";
  $query=$dbh->prepare($sql);
  $query-> bindParam(':eid', $eid, PDO::PARAM_STR);
  $query->bindParam(':createuser',$createuser,PDO::PARAM_STR);
  $query->bindParam(':deleteuser',$deleteuser,PDO::PARAM_STR);
  $query->bindParam(':createbid',$createbid,PDO::PARAM_STR);
  $query->bindParam(':updatebid',$updatebid,PDO::PARAM_STR);
  $query->execute();
  echo '<script>alert("Permission has been updated")</script>';
}
?>
<div class="card-body">
  <form class="needs-validation" novalidate method="post">
    <?php
    $eid=$_POST['edit_id'];
    $sql="SELECT * from  permissions where permissions.id=:eid";
    $query = $dbh -> prepare($sql);
    $query-> bindParam(':eid', $eid, PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
      foreach($results as $row)
      { 
        $_SESSION['edid']=$row->id;
        ?>        
        <div class="form-group">
          <label for="exampleInputName1" value=""><?php  echo $row->permission;?></label>
          <div class="row">
            <div class="col-sm-3">
              <?php if($row->createuser==1)
              {?>
                <div class="checkbox form-check">
                  <label class="">
                   <input type="checkbox" class="form-check-input" id="inlineCheckbox1" name="createuser" checked value="1"> Create user</label>
                 </div>
                 <?php
               } else { ?>
                <div class="checkbox  form-check">
                  <label class="">
                   <input type="checkbox" class="form-check-input" id="inlineCheckbox1" name="createuser"  value="1"> Create user</label>
                </div>
                <?php 
              } ?>
            </div>
            <div class="col-sm-3">
              <?php if($row->deleteuser==1)
              {?>
                <div class="checkbox form-check">
                  <label class="">
                   <input type="checkbox" class="form-check-input" id="inlineCheckbox1" name="deleteuser" checked value="1"> Delete user</label>
                </div>
                <?php 
              } else {?>
                <div class="checkbox form-check">
                  <label class="">
                   <input type="checkbox" class="form-check-input" id="inlineCheckbox1" name="deleteuser"  value="1"> Delete user</label>
                </div>
                <?php 
              }?>
            </div>
            <div class="col-sm-3">
              <?php if($row->createbid==1)
              {?>
                <div class="checkbox form-check">
                  <label class="">
                   <input type="checkbox" class="form-check-input" id="inlineCheckbox1" name="createbid" checked value="1"> Register Visitor</label>
                </div>
                <?php 
              } else {?>
                <div class="checkbox form-check">
                  <label class="">
                   <input type="checkbox" class="form-check-input" id="inlineCheckbox1" name="createbid"  value="1"> Register Visitor</label>
                </div>
                <?php 
              } ?>
            </div>
            <div class="col-sm-3">
              <?php if($row->updatebid==1)
              {?>
                <div class="checkbox form-check">
                   <label class="">
                   <input type="checkbox" class="form-check-input" id="inlineCheckbox1" name="updatebid" checked value="1"> Update Visitor's Info</label>
                </div>
                <?php 
              } else {?>
                <div class="checkbox form-check">
                  <label class="">
                   <input type="checkbox" class="form-check-input" id="inlineCheckbox1" name="updatebid"  value="1">  Update Visitor's Info</label>
                </div>
                <?php 
              } ?>
            </div>
          </div>
        </div>
        <?php $cnt=$cnt+1;}} ?>
        <button type="submit" name="submit" class="btn btn-primary btn-fw mr-2">Update</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </form>
    </div>