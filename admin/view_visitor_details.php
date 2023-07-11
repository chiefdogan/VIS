<?php
session_start();
//error_reporting(0);
include('../includes/dbconnection.php');

 // if(isset($_POST['edit_id6'])) {
        $eid=1;
                   $sql = "SELECT *
                   FROM visit_tb
                   LEFT JOIN visitor_tb ON visit_tb.visitor_id = visitor_tb.id
                   LEFT JOIN office_tb ON visit_tb.office_id = office_tb.id
                   LEFT JOIN idcategory_tb ON visit_tb.idcategory = idcategory_tb.id
                   LEFT JOIN staff_tb ON visit_tb.staff_id = staff_tb.id
                   LEFT JOIN districts_tb ON visit_tb.districts_id = districts_tb.id 
                   WHERE id=:eid
                  ";

  $query = $dbh -> prepare($sql);
  $query-> bindParam(':eid', $eid, PDO::PARAM_STR);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  echo '<div class="card-body">';
  if($query->rowCount() > 0)
  {
    foreach($results as $row)
    {
     $_SESSION['editid']=$row->id;?>

     <h4 style="color: blue">Visitor Information</h4>
     <table border="1" class="table table-bordered">
      <tr>
        <th>Full Names</th>
        <td><?php  echo htmlentities($row->first_name);?>&nbsp;<?php  echo htmlentities($row->middle_name);?>&nbsp;<?php  echo htmlentities($row->last_name);?></td>
      </tr>
      <tr>
        <th>Card Type</th>
        <td><?php  echo $row->idcategory;?></td>
      </tr>
      <tr>
        <th>Mobile Number</th>
        <td><?php  echo $row->mobile;?></td>
      </tr>
      <tr>
        <th>Address</th>
        <td><?php  echo $row->address;?></td>
      </tr>
      <tr>
        <th>  <wbr> Whom To Meet</th>
          <td><?php  echo $row->to_whom;?></td>
        </tr>
        <tr>
          <th>Office</th>
          <td><?php  echo $row->office_id;?></td>
        </tr>
        <tr>
          <th>  <wbr> Visit Purpose</th>
            <td><?php  echo $row->visit_purpose;?></td>
          </tr>
          <tr>
            <th>Visitor Time in</th>
            <td><?php  echo $row->time_in;?></td>
          </tr>
          <?php if($row->remark !=""){ ?>
           <tr>
            <th>Outing Remark </th>
            <td><?php echo $row->remark; ?></td>
          </tr>
          <tr>
            <th>Out Time</th>
            <td><?php echo $row->time_out; ?>  </td> 
          </tr>
          <?php 
       } ?> 
      </table> 
      <?php if($row->remark==""){ ?>
        <div class="card pt-4">
          <form  method="post" class="needs-validation" novalidate>
           <div class="row col-md-6 form-group">
             <label for="exampleInputPassword1">Enter Outing Remarks</label>
              <textarea name="remark" placeholder="Enter Outing Remarks" rows="6" cols="8" class="form-control wd-450" required="true"></textarea>
              <button type="submit" name="update" class="btn btn-primary btn-sm mt-4">Update</button>
            </div>
              
            </div>
            
            
          </form>
        </div>
        <?php
      }
    }
  }
// }
 ?> 
</div>