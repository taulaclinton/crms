<?php
include_once("config.php");
/**--------------------------------------------------------------------------------
	CHANGE STUDENT PASSWORD
----------------------------------------------------------------------------------**/
	if(isset($_POST['update_student_password']) && isset($_GET['change_student_password'])){
		$pwd_id=$_GET['change_student_password'];
		$pwd=mysqli_real_escape_string($db_con,$_POST['password']);
		$pwd=md5($pwd);
		$pass_update=mysqli_query($db_con,"UPDATE students SET password='$pwd' WHERE student_id='$pwd_id'");
		if($pass_update){
			echo "<script>alert('Password changed successfully');window.location.assign('../admin/admin-dashboard.php?student-portal=$pwd_id');</script>";
		}
		else{
			echo "<script>alert('Failed to update password');</script>";
		}
	}
?>