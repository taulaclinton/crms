<?php
session_start();
include('includes/config.php');

//Check if there is an active session

	if(isset($_SESSION['admin'])){
		header("Location:../index.php");
	}
	
if(isset($_POST['login']))
{
	$uname=$_POST['username'];
	$password=md5($_POST['password']);

	$sql_admin =mysqli_query($db_con,"SELECT * FROM admin WHERE username='$uname' and password='$password'");
	$sql_teacher =mysqli_query($db_con,"SELECT * FROM teachers WHERE username='$uname' and password='$password'");
	$sql_student=mysqli_query($db_con,"SELECT * FROM students WHERE username='$uname' and password='$password'");
	
	//CHECK IF USER IS ADMIN
	if($sql_admin ){
		//Check if user exists
		if(mysqli_num_rows($sql_admin) > 0)
		{
			$row_admin=mysqli_fetch_array($sql_admin);
			$_SESSION['admin'] = $row_admin['admin_id'];
			header("Location:admin/admin-dashboard.php?home");
		}
		else{
				echo "<script>alert('Invalid login details');</script>";
		}
	}
	elseif($sql_teacher){
		$row_teacher=mysqli_fetch_array($sql_teacher);
		if(mysqli_num_rows($row_teacher) > 0)
		{
			$_SESSION['teacher'] = $row_teacher['teacher_id'];
			header("Location: teacher-dashboard.php");
		}
		else{
				echo "<script>alert('Invalid login details');</script>";
		}
	}
	elseif($sql_student){
		$row_student=mysqli_fetch_array($sql_student);
		if(mysqli_num_rows($row_student) > 0)
		{
			$_SESSION['student'] = $row_student['student_id'];
			header("Location: student-dashboard.php");
		}
		else{
				echo "<script>alert('Invalid login details');</script>";
		}
	}
	
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title> <?php echo $college;?> <?php echo $system;?> | Login </title>
		<link rel="icon" href="images/system/header.png">
        <link rel="stylesheet" href="style/css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="style/css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="style/css/main.css" media="screen" >
		<style>
			body{
				background-image:url("images/system/login-register.jpg");
				background-repeat: no-repeat;
			}
			
		</style>
    </head>
	
    <body>
        <div class="preloader">
		  <div class="cssload-speeding-wheel"></div>
		</div>
        
		<div class="row">
			<div  class="col-md-4"></div>
			<div  class="col-md-4 ">
				<div class="login-box">	
					<form class="form-horizontal form-material" method="post">
						<center><span ><img style="height:20%;width:20%;"class="img-circle img-responsive"src="images/system/larger-logo.png"></span></center>
						<h2 class="box-title m-b-20"> <?php echo $college;?> <?php echo $system_name;?></h2>
                         <div class="form-group">
							<input style="color:orange;"type="text" name="username" class="form-control" id="inputEmail3" placeholder="Username">
                        </div>
                       
						<div class="form-group">
                           	<input  style="color:orange;"type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                        <div class="form-group mt-20">
                            <button type="submit" name="login" class="btn btn-default btn-block btn-lg">LOGIN </button>
						</div>
                    </form>
					<a class="pull-left" href="password-recovery.php">Forgot password? </a> <a class="pull-right"href="password-recovery.php">General Feedback </a> 
					<br><br><p style="text-align:center;">  Developed by <a style="color:yellow;"href="http://www.infonetwork.com"> Infonetwork &copy 2018</a></p>
				</div>
				
			</div>
			<div  class="col-md-4"></div>
			
		</div>

        <!-- ========== COMMON JS FILES ========== -->
        <script src="style/js/jquery/jquery-2.2.4.min.js"></script>
        <script src="style/js/jquery-ui/jquery-ui.min.js"></script>
        <script src="style/js/bootstrap/bootstrap.min.js"></script>
 


    </body>
</html>
