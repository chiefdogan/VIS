<?php

if ($row->designation_id == '3') {
    echo '<div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
    <ul>
    <li class="menu-title"> 
    <span>Main</span>
    </li>
    <li >
    <a href="users-dashboard.php" class="noti-dot"><i class="la la-dashboard"></i> <span> Dashboard</span> </span></a>
    </li>
    <li class="submenu">
    <a href="#" class="noti-dot"><i class="la la-users"></i> <span> Manage Visitor</span> <span class="menu-arrow"></span></a>
    <ul style="display: none;">
    <li><a href="Visitors.php">Register Visitor</a></li>
    <li><a href="visitors-list.php">Current Visitor</a></li>
    </ul>
    </li>

    <li class="menu-title"> 
    <span>Management</span>
    </li>

    <li class="submenu">
    <a href="#" class="noti-dot"><i class="la la-pie-chart"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
    <ul style="display: none;">
    <li><a href="visitors-reports.php"> By Dates Report </a></li>
    <li><a href="visitors-reports_by_office.php"> By Dates Office </a></li>
    <li><a href="visitors-reports_by_purpose.php"> By Dates purpose </a></li>
    </ul>
    </li>

    <li class="menu-title"> 
    <span>Extras</span>
    </li>
    
    
    <li class="submenu">
    <a href="#" class="noti-dot"><i class="la la-file-text"></i> <span>Documentation</span> <span class="menu-arrow"></span></a>
    <ul style="display: none;">
    <li><a href="terms.php"><span>Terms of Use</span></a></li>
    
    </ul>
    </li>
    <li class="submenu">
    <a href=""><i class="la la-info"></i> <span class="badge badge-primary ml-auto">v1.0</span></a>
    </li>';
} 


?>


<?php
$aid=$_SESSION['visaid'];
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
       if($row->designation_id=="2"  )

       { 



           ?>
           
           
           <?php

           if ($row->designation_id == '2') {
            echo '
            <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
            <ul>
            <li class="menu-title"> 
            <span>Main</span>
            </li>
            <li >
            <a href="users-dashboard.php" class="noti-dot"><i class="la la-dashboard"></i> <span> Dashboard</span> </span></a>
            </li>

            <li class="submenu">
                     <a href="#" class="noti-dot"><i class="la la-users"></i> 
                      <span> Manage Visitor</span> <span class="menu-arrow"></span></a>
                      <ul style="display: none;">
                        <li><a href="Visitors.php">Register Visitor</a></li>
                        <li><a href="visitors-list.php">Current Visitor</a></li>
                    </ul>
                </li>
            
            <li class="menu-title"> 
            <span>Management</span>
            </li>

            <li class="submenu">
                    <a href="#" class="noti-dot"><i class="la la-user-plus"></i></i> <span>  Management </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="purpose.php"> Manage purpose </a></li>
                        <li><a href="office.php"><span>Office</span></a></li>
                    </li>   
                </ul>
            </li>

            <li class="submenu">
            <a href="#" class="noti-dot"><i class="la la-pie-chart"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
            <ul style="display: none;">
            <li><a href="visitors-reports.php"> By Dates Report </a></li>
            <li><a href="visitors-reports_by_office.php"> By Dates Office </a></li>
              <li><a href="visitors-reports_by_purpose.php"> By Dates purpose </a></li>
            </ul>
            </li>
            <li class="menu-title"> 
            <span>Extras</span>
            </li>
            
            
            <li class="submenu">
            <a href="#" class="noti-dot"><i class="la la-file-text"></i> <span>Documentation</span> <span class="menu-arrow"></span></a>
            <ul style="display: none;">
            <li><a href="terms.php"><span>Terms of Use</span></a></li> 
            </ul>
            </li>
            <li class="submenu">
            <a href=""><i class="la la-info"></i> <span class="badge badge-primary ml-auto">v1.0</span></a>
            </li>';
        } 
        

        ?>

        <?php
    } 
    if($row->designation_id=="1"  )

    { 

        ?>

        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title"><span>Main</span></li>
                    <li>

                       <a href="index.php" class="noti-dot">
                        <i class="la la-dashboard"></i> <span> Dashboard</span></span></a>

                    </li>

                    <li class="submenu">
                     <a href="#" class="noti-dot"><i class="la la-users"></i> 
                      <span> Manage Visitor</span> <span class="menu-arrow"></span></a>
                      <ul style="display: none;">
                        <li><a href="Visitors.php">Register Visitor</a></li>
                        <li><a href="visitors-list.php">Current Visitor</a></li>
                    </ul>
                </li>
                

                <li class="menu-title"> 
                    <span>Management</span>
                </li>

                <li class="submenu">
                    <a href="#" class="noti-dot"><i class="la la-user-plus"></i></i> <span> User Management </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="users.php"> Register user </a></li>
                        <li><a href="roles-permissions.php">User Permision </a></li>
                        <li><a href="office.php"><span>Office</span></a></li>
                        <li><a href="idcategory.php"><span>IDS</span></a></li>
                        <li><a href="regions.php"><span>Regions</span></a></li>
                        <li><a href="districts.php"><span>Districts</span></a></li>
                        <li><a href="system-log.php"><span>System Log</span></a></li>
                    </li>   
                </ul>
            </li>

            <li class="submenu">
                <a href="#" class="noti-dot"><i class="la la-pie-chart"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
                <ul style="display: none;">
                    <li><a href="visitors-reports.php"> By Dates Report </a></li>
                    <li><a href="visitors-reports_by_office.php"> By Dates Office </a></li>
                      <li><a href="visitors-reports_by_purpose.php"> By Dates purpose </a></li>
                </ul>
            </li>

                        <!--
                        <li> 
                            <a href="settings.html"><i class="la la-cog"></i> <span>System Log</span></a>
                        </li> -->
                        
                        <li class="menu-title"> 
                            <span>Extras</span>
                        </li>
                        
                        
                        <li class="submenu">
                            <a href="#" class="noti-dot"><i class="la la-file-text"></i> <span>Documentation</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="terms.php"><span>Terms of Use</span></a></li>
                                <!-- <li><a href="#"><span>User Manual</span></a></li> -->
                                <li><a href="faq.php"> <span>Faq</span></a></li> 
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href=""><i class="la la-info"></i><!-- <span>Change Log</span>--> <span class="badge badge-primary ml-auto">v1.0</span></a> 
                        </li>
                        
                        
                        <?php 
                    } 
                }
            } 

            ?> 
            
        </div>
    </div>