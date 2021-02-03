<?php
session_start();
include_once('../includes/config.php');

	$admin_query=mysqli_query($db_con,"SELECT * FROM admin WHERE admin_id=".$_SESSION['admin']);
	$admin_fetch=mysqli_fetch_array($admin_query);
	
	if(!isset($_SESSION['admin'])){
		header("Location:../index.php");
	}
	else{
?>
	
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $college;?> <?php echo $system;?> | Admin Dashboard</title>
		<link rel="icon" href="../images/system/header.png">
        <link rel="stylesheet" href="../style/css/bootstrap.min.css" media="screen" >
		<link rel="stylesheet" href="../style/css/bootstrap.css" media="screen" >
        <link rel="stylesheet" href="../style/css/font-awesome.min.css" media="screen" >
		<link rel="stylesheet" href="../style/css/main.css" media="screen" >
		<script src="../style/js/jquery/jquery-2.2.4.js"></script>
		
    </head>
	
    <body >
		
		
		<div  class="container-fluid">
			<div  class="row">
				<?php include('topbar.php');?>
			</div>
			<div style="margin-top:60px;"class="row">
				<?php include('navigation.php');?>  
				
				<!--===HOMEPAGE SECTION ==-->
				<div class="main-page col-md-10">
					<!--===HOMEPAGE DETAILS ==-->
							<?php
								if(isset($_GET["home"])){include "admin-home.php";}
								elseif(isset($_GET["admins"])){include "admins.php";}
								elseif(isset($_GET["teachers"])){include "admin-teachers.php";}
								elseif(isset($_GET["students"])){include "admin-students.php";}
								elseif(isset($_GET["first-year-students"])){include "admin-first-year-students.php";}
								elseif(isset($_GET["second-year-students"])){include "admin-second-year-students.php";}
								elseif(isset($_GET["third-year-students"])){include "admin-third-year-students.php";}
								elseif(isset($_GET["fourth-year-students"])){include "admin-fourth-year-students.php";}
								elseif(isset($_GET["student-portal"])){include "admin-student-portal.php";}
								elseif(isset($_GET["manage-departments"])){include "admin-departments.php";}
								elseif(isset($_GET['manage-courses'])){include ('admin-courses.php');}
								elseif(isset($_GET["manage-classes"])){include "admin-classes.php";}	
								elseif(isset($_GET["manage-course-duraton"])){include "admin-course-duration.php";}	
								elseif(isset($_GET["add-subjects"])){include "admin-subjects.php";}
								elseif(isset($_GET["manage-subjects"])){include "admin-manage-subjects.php";}								
							
							?>
								
				</div>
				<!-- === END OF HOMEPAGE SECTION === -->
            </div>         
        </div>
           <br>
		<?php include('../includes/footer.php');?>	
        <!-- ========== COMMON JS FILES ========== -->
      
        <script src="../style/js/jquery-ui.js"></script>
        <script src="../style/js/bootstrap/bootstrap.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="../style/js/waypoint/waypoints.min.js"></script>
        <script src="../style/js/counterUp/jquery.counteru