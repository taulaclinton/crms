<?php
session_start();
if(!isset($_SESSION['admin'])){
	header("Location:../index.php");
}
else{
	include('../includes/config.php');
	/*---------------------------------------------------------------------------
		#ADMIN FREEZE ACCOUNT SCRIPT
	-----------------------------------------------------------------------------*/
	if(isset($_GET['admin-freeze']) ){
		$freeze_id=$_GET['admin-freeze'];
		$new_status="0";
		$status_update=mysqli_query($db_con,"UPDATE admin SET status='$new_status' WHERE admin_id='$freeze_id'");
		if($status_update){
			header('Location:admin-dashboard.php?admins');
		}
		else{
			echo "<script>alert('Failed to deactivate admin');</script>";
		}
	}
	/*---------------------------------------------------------------------------
		#DEPARTMENTS EDIT SCRIPT
	-----------------------------------------------------------------------------*/
	if(isset($_POST['update_departments']) &&isset($_GET['department-edit_id']) ){
		$edit_id=$_GET['department-edit_id'];
		$name_update= mysqli_real_escape_string($db_con,$_POST['name']);
		$des_update= mysqli_real_escape_string($db_con,$_POST['description']);
		
		$department_update=mysqli_query($db_con,"UPDATE departments SET name='$name_update',description='$des_update' WHERE department_id='$edit_id'");
		if($department_update){
			header("Location:admin-dashboard.php?manage-departments");
		}
	}
	/*---------------------------------------------------------------------------
		#COURSES EDIT SCRIPT
	-----------------------------------------------------------------------------*/
	if(isset($_POST['update_course']) &&isset($_GET['course-edit_id']) ){
		$edit_id1=$_GET['course-edit_id'];
		$cname_update= mysqli_real_escape_string($db_con,$_POST['course_name']);
		$course_dep= mysqli_real_escape_string($db_con,$_POST['department']);
		$course_update=mysqli_query($db_con,"UPDATE courses SET course_name='$cname_update',department_id='$course_dep' WHERE course_id='$edit_id1'");
		if($course_update){
			header("Location:admin-dashboard.php?manage-courses");
		}
		else{
			echo "<script>alert(Course edit failed..);</script>";
		}
	}
	/*---------------------------------------------------------------------------
		#CLASSES EDIT SCRIPT
	-----------------------------------------------------------------------------*/
	if(isset($_POST['update_class']) &&isset($_GET['class-edit_id']) ){
		$edit_id2=$_GET['class-edit_id'];
		$cname_update= mysqli_real_escape_string($db_con,$_POST['classname']);
		$period_update= mysqli_real_escape_string($db_con,$_POST['period']);
		$year_admitted_update= mysqli_real_escape_string($db_con,$_POST['year_admitted']);
		$status_update="In session";
		$yr_ofstudy_update="1";
		$class_update=mysqli_query($db_con,"UPDATE classes SET classname='$cname_update',year_admitted='$year_admitted_update',period='$period_update',year_of_study='$yr_ofstudy_update' WHERE class_id='$edit_id2'");
		if($class_update){
			header("Location:admin-dashboard.php?manage-classes");
		}
		else{
			echo "<script>alert(Class edit failed..);</script>";
		}
	}
	
	/*---------------------------------------------------------------------------
		#SUBJECTS EDIT SCRIPT
	-----------------------------------------------------------------------------*/
	if(isset($_POST['update-subject']) &&isset($_GET['subject-edit_id']) ){
		$edit_id10=$_GET['subject-edit_id'];
		$subject_name_update= mysqli_real_escape_string($db_con,$_POST['subject_name']);
		$department_update= mysqli_real_escape_string($db_con,$_POST['department']);
		$course_update= mysqli_real_escape_string($db_con,$_POST['course']);
		$year_update= mysqli_real_escape_string($db_con,$_POST['year']);
		$semester_update= mysqli_real_escape_string($db_con,$_POST['semester']);
		
		$subject_update=mysqli_query($db_con,"UPDATE subjects SET subject_name='$subject_name_update',year_of_study='$year_update',course_of_study='$course_update',course_of_study='$course_update',semester='$semester_update' WHERE subject_id='$edit_id10'");
		if($subject_update){
			header("Location:admin-dashboard.php?manage-subjects");
		}
		else{
			echo "<script>alert(Subject edit failed..);</script>";
		}
	}
/*-----------------------------------------------------------------------------------------------------------------------------
	EDITING STUDENT
------------------------------------------------------------------------------------------------------------------------------*/
	if(isset($_POST['update_student']) &&isset($_GET['student-edit_id'])){
		$edit_id19=$_GET['student-edit_id'];
		$name= mysqli_real_escape_string($db_con,$_POST['student_name']);
		$regno = mysqli_real_escape_string($db_con,$_POST['regno']);
		$email = mysqli_real_escape_string($db_con,$_POST['email']);
		$phone= mysqli_real_escape_string($db_con,$_POST['phone']);
		$dob= mysqli_real_escape_string($db_con,$_POST['dob']);
		$sex= mysqli_real_escape_string($db_con,$_POST['sex']);
		$form4grade= mysqli_real_escape_string($db_con,$_POST['form4grade']);
		$program= mysqli_real_escape_string($db_con,$_POST['program']);
		$class= mysqli_real_escape_string($db_con,$_POST['class']);
		$year= mysqli_real_escape_string($db_con,$_POST['year_of_study']);
		
		$student_update=mysqli_query($db_con,"UPDATE students SET student_name='$name',regno='$regno',email='$email',phone='$phone',
		dob='$dob',sex='$sex',form4grade='$form4grade',program='$program',class='$class',year_of_study='$year' WHERE student_id=$edit_id19");
		if($student_update){
				echo "<script>alert('Student updated successfully..'); window.location.assign('admin-dashboard.php?student-portal=$edit_id19');</script>";
			}
			else
				{
					?>
					<script>alert('Error while updating student...');</script>
					<?php
			}
	}
}
?>