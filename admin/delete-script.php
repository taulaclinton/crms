<?php
/**------------------------------------------------
	THE DELETE SCRIPT
	
	1. DELETE DEPARTMENT
	2. DELETE COURSE
	3. DELETE CLASS
--------------------------------------------------*/
session_start();
if(!isset($_SESSION['admin'])){
	header("Location:../index.php");
}
else{
	include('../includes/config.php');
	/**------------------------------------------
		DELETE DEPARTMENT
	-------------------------------------------**/
	if(isset($_GET['delete-department']))
	{
		$delete_id=$_GET['delete-department'];
		$delete="DELETE FROM departments WHERE department_id='$delete_id'";
		if(mysqli_query($db_con,$delete))
		{
			echo "<script>alert('Department deleted successfully'); window.location.assign('admin-dashboard.php?manage-departments');</script>";
		}
		else
		{
			echo "<script>alert('Failed to delete department.');window.location.assign('admin-dashboard.php?manage-departments');</script>";
		}
	}
	/**------------------------------------------
		DELETE COURSE
	-------------------------------------------**/
	if(isset($_GET['delete-course']))
	{
		$delete_id=$_GET['delete-course'];
		$delete="DELETE FROM courses WHERE course_id='$delete_id'";
		if(mysqli_query($db_con,$delete))
		{
			echo "<script>alert('Course deleted successfully'); window.location.assign('admin-dashboard.php?manage-courses');</script>";
		}
		else
		{
			echo "<script>alert('Failed to delete course'); window.location.assign('admin-dashboard.php?manage-courses');</script>";
		}
	}
/**-----------------------------------------------------------------------------------------------------------------
		DELETE CLASS
-------------------------------------------------------------------------------------------------------------------**/
	if(isset($_GET['delete-class']))
	{
		$delete_id=$_GET['delete-class'];
		$delete="DELETE FROM classes WHERE class_id='$delete_id'";
		if(mysqli_query($db_con,$delete))
		{
			echo "<script>alert('Class deleted successfully'); window.location.assign('admin-dashboard.php?manage-classes');</script>";
		}
		else
		{
			echo "<script>alert('Failed to delete class'); window.location.assign('admin-dashboard.php?manage-courses');</script>";
		}
	}

}
mysqli_close($db_con);
?>