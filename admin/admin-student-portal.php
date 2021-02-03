

	<div style="box-shadow:0px 2px 5px gray" class="row breadcrumb-div">
        <ol class="breadcrumb">
  		    <li><a  href="admin-dashboard.php?home">Dashboard</a></li>
            <li><a  href="admin-dashboard.php?first-year-students"class="active">First Year Student</a></li>
            <li><?php
					if(isset($_GET['student-portal'])){
						$id=$_GET['student-portal'];
						$result45=mysqli_fetch_array(mysqli_query($db_con,"SELECT students.student_id,students.student_name,courses.course_name, departments.name
						FROM  (courses INNER JOIN departments ON courses.department_id = departments.department_id)INNER JOIN students ON students.program = courses.course_id
						WHERE (((students.student_id)='$id'))"));	 
						echo $result45['course_name'];
					}
				?>
			</li>
        </ol>
	</div>
<br>
	<div  style="background-color:white;padding-left:10px;"class="row"><br>
			<?php
				$sql_student =mysqli_query($db_con,"SELECT students.student_id,students.student_name, students.regno, students.email, students.phone, students.dob,
				students.sex, students.form4grade,classes.classname,classes.class_status, classes.year_of_study, courses.course_name, departments.name
				FROM (classes INNER JOIN students ON classes.class_id = students.class)
				INNER JOIN (courses INNER JOIN departments ON courses.department_id = departments.department_id) ON students.program = courses.course_id
				WHERE (((students.year_of_study)='1') AND ((students.student_id)='$id'))");
									
				if(mysqli_num_rows($sql_student)> 0){
					$result906=mysqli_fetch_array($sql_student);
				}
			?>
		<div class="col-md-1"></div>
		<div  style="box-shadow:2px 3px 5px gray;"class="col-md-4">
			<div class="row">
				<center style="color:teal;">
					<span ><img style="height:20%;width:20%;"class="img-circle img-responsive"src="../uploads/student/<?php echo $result906['student_id'].".png";?>" alt="../uploads/student/no-image.png"></span>
					<span ><a data-toggle="modal" href="#<?php $modal_id=$result906['student_id']; echo $modal_id;?>">Edit profile</a> |
						<a  data-toggle="modal" data-target="#bill" href="">Change password</a> |
						<a  data-toggle="modal" href="#photo">Change photo</a>
					</span>
				</center>
			</div>
			<div style="background-color:teal;padding:10px;color:white;"class="row">
				 <p><span> Student Name:</span>    <span class="pull-right label label-warning label-rounded"><?php echo $result906['student_name']; ?></span></p>
				 <p><span> Registration Number:</span>    <span class="pull-right label label-warning label-rounded"><?php echo $result906['regno']; ?></span></p>
				 <p><span> Email address:</span>    <span class="pull-right label label-warning label-rounded"><?php echo $result906['email']; ?></span></p>
				 <p><span>Phone Number:</span>    <span class="pull-right label label-warning label-rounded"><?php echo $result906['phone']; ?></span></p>
				 <p><span> Date of Birth:</span>    <span class="pull-right label label-warning label-rounded"><?php echo $result906['dob']; ?></span></p>
				 <p><span> Student sex:</span>    <span class="pull-right label label-warning label-rounded"><?php echo $result906['sex']; ?></span></p>
				 <p><span> KCSE grade:</span>    <span class="pull-right label label-warning label-rounded"><?php echo $result906['form4grade']; ?></span></p>
				 <p><span> Student's class :</span>    <span class="pull-right label label-warning label-rounded"><?php echo $result906['classname']; ?></span></p>
				
				 <p><span> Year of study:</span>    <span class="pull-right label label-warning label-rounded"><?php echo $result906['year_of_study']; ?></span></p>
				 <p><span> Course of Study:</span>    <span class="pull-right label label-warning label-rounded"><?php echo $result906['course_name']; ?></span></p>
				 <p><span> Department:</span>    <span class="pull-right label label-warning label-rounded"><?php echo $result906['name']; ?></span></p>
			</div>
		</div>
		<div class="col-md-1"></div>
		<div style="padding:20px;color:white;"class="col-md-6">
			<div class="row">
				<h3>Latest results submitted</h3>
			</div>
			<div class="row">
				<h3>View previous year's results</h3>
			</div>
		</div>
	</div>	
			
<!-------------------------------------------------------------------------------------------------------------------
		EDIT STUDENT'S PROFILE MODAL
-------------------------------------------------------------------------------------------------------------------->
	<div  class="modal fade" id="<?php  echo $modal_id;?>" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content panel panel-success">
				<div style="background-color:teal;" class="modal-header panel-heading"><br>
					<h4 style="color:white;"align="center"class="modal-title">Edit <?php echo $result906['student_name']?>'s profile</h4>
				</div>
				<div class="modal-body panel-body">
					<form  enctype="multi-part/form-data" action="edit-script.php?student-edit_id=<?php echo $result906['student_id']; ?>" method="post"role="form">
						<div class="row form-group">
							<div class="col-md-7">
								<input type="text" class="form-control" required="" name="student_name" value="<?php echo $result906['student_name']?>"/>
							</div>
							<div class="col-md-5">
								<label class="control-label text-danger">Full Name </label>
							</div>
						</div>		
						<div class="row form-group">
							<div class="col-md-7">
								<input type="text" class="form-control" required="" name="regno" value="<?php echo $result906['regno']?>"/>	
							</div>
							<div class="col-md-5">
								<label class="control-label text-danger">Registration No </label>
							</div>
						</div>
								
						<div class="row form-group">
							<div class="col-md-7">
								<input type="text" class="form-control" required="" name="email" value="<?php echo $result906['email']?>"/>
							</div>
							<div class="col-md-5">
								<label class="control-label text-danger">Email </label>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-7">
								<input type="text" class="form-control" required="" name="phone" value="<?php echo $result906['phone']?>"/>
							</div>
							<div class="col-md-5">
								<label class="control-label text-danger">Phone Number  </label>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-7">
								<input type="date" class="form-control" required="" name="dob" value="<?php echo $result906['dob']?>"/>
							</div>
							<div class="col-md-5">
								<label class="control-label text-danger">Date of Birth </label>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-7">
								<select name="sex" id="sx"class="form-control" required >
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
							<label class="col-md-5 control-label text-danger" for="sx">Sex </label>
						</div>
						
						<div class="row form-group">
							
							<div class="col-md-7">
								<select class="form-control" name="form4grade" required >
									<option value="A">A</option>
									<option value="A-">A-</option>
									<option value="B+">B+</option>
									<option value="B">B</option>
									<option value="B-">B-</option>
									<option value="C+">C+</option>
									<option value="C">C</option>
									<option value="C-">C-</option>
									<option value="D+">D+</option>
									<option value="D">D</option>
									<option value="D-">D-</option>
									<option value="E">E</option>
								</select>
							</div>
							<label class="col-md-5 control-label text-danger">KCSES grade </label>
						</div>
						
						<div class="row form-group">
							<div class="col-md-7">
								<select name="program" class="form-control" required >
								<?php
									/**select the courses that exist in the college database **/
									$sqlcourse =mysqli_query($db_con,"SELECT * FROM courses WHERE course_id > 0 ORDER BY course_name ASC");
									if (mysqli_num_rows($sqlcourse)>0){
											while($course_student=mysqli_fetch_array($sqlcourse)){
																				
								?>
									<option value="<?php echo $course_student['course_id'];?>"><?php echo $course_student['course_name'];?></option>
								<?php 
										}
									}
									else{
											echo "<option>..No course found..</option>";
									}
								?>
								</select>
							</div>
							<label class="col-md-5 control-label text-danger">Course of Study</label>
						</div>
						
						<div class="row form-group">
							<div class="col-md-7">
								<select name="year_of_study" class="form-control" required>
									<option value="1">1st year</option>
									<option value="2">2nd year</option>
									<option value="3">3rd Year</option>
									<option value="4">4rd Year</option>
								</select>
							</div>
							<div class="col-md-5">
								<label class="control-label text-danger">Year of Study</label>
							</div>
						</div>
						
						<div class="row form-group">
							<div class="col-md-7">
								<select name="class" class="form-control" required >
								<?php
									$sql_class=mysqli_query($db_con,"SELECT * FROM classes WHERE class_id>0 AND class_status='In session'");
									if($sql_class){
										while($result=mysqli_fetch_array($sql_class)){
											$cname=$result['classname'];
											$class_id=$result['class_id'];
											$class_admission=$result['doa'];
								?>
									<option value="<?php echo $class_id; ?>"><?php echo $cname; ?></option>
											
								<?php
										}
									}
									else{
											echo "No class found";
									}
								?>
								</select>
							</div>
							<div class="col-md-5">
								<label class="control-label text-danger">Class </label>
							</div>
						</div>
						<div style="padding-left:10px;"class="row form-group">
							<button type="submit" name="update_student" class="btn btn-info pull-left">Update student information </button>
							<span id="preloader-form"></span>
						</div>
					</form>
				</div>
				<!--end of edit Modal content-->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

<!-------------------------------------------------------------------------------------------------------------------
		EDIT STUDENT'S PASSWORD MODAL
-------------------------------------------------------------------------------------------------------------------->
	<div  class="modal fade" id="bill" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content panel panel-default">
				<div style="background-color:teal;" class="modal-header panel-heading"><br>
					<h4 style="color:white;"align="center"class="modal-title">Edit <?php echo $result906['student_name']?>'s password</h4>
				</div>
				<div style="padding:20px;"class="modal-body panel-body">
					<form onsubmit="return checkpwd();" role="form" method="post" enctype="multipart/form-data"action="../includes/forgot-password.php?change_student_password=<?php echo $result906['student_id'];?>">
						<div class="row form-group">
							<label class="control-label text-danger">Enter new password:</label>
							<p style="color:red;" id="inputerror"></p>
							<input id="pass" type="password" class="form-control"  value=""name="password" title="Should be more than 3 characters"  />
						</div>	
						<div class="row form-group">
							<label class="control-label text-danger">Re-enter password:</label>
							<input id="cpass" type="password" class="form-control"  name="cpassword" />
							<button type="submit" name="update_student_password" class="btn btn-info pull-left">Submit  changes </button>
							<span id="preloader-form"></span>
						</div>	
					</form>
				</div>
				<!--end of edit Modal content-->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-------------------------------------------------------------------------------------------------------------------
		UPLOAD PHOTO MODAL
-------------------------------------------------------------------------------------------------------------------->
	<div  class="modal fade" id="photo" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content panel panel-default">
				<div style="background-color:teal;" class="modal-header panel-heading"><br>
					<h4 style="color:white;"align="center"class="modal-title">Add <?php echo $result906['student_name']?>'s photo</h4>
				</div>
				<div style="padding:20px;"class="modal-body panel-body">
					<form  role="form" method="post" enctype="multipart/form-data"action="../includes/upload-script.php?upload_id=<?php echo $result906['student_id'];?>">
						<div class="row form-group">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
										<img src="../uploads/student/<?php echo $result906['student_id'].".png";?>" alt="../uploads/student/no-image.png">
								</div>
									<span class="btn btn-info btn-file">
										<input type="file" class="form-control"name="student_photo" accept="image/*">
									</span>
									<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Delete</a>
								
							</div>
						</div>	
						<div class="row form-group">
							<button type="submit" name="upload_student_photo" class="btn btn-info pull-left">Upload</button>
							<span id="preloader-form"></span>
						</div>	
					</form>
				</div>
				<!--end of edit Modal content-->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!----------------------------------------------------
		script for password validation
	------------------------------------------------------>	
	<script type="text/javascript">
		function checkpwd(){
			var pss=document.getElementById("pass").value.length;
			if(pss<3){
				document.getElementById("inputerror").innerHTML="Cannot be less than 3 characters*";
				document.getElementById("pass").style.border="solid red";
				return false;
			}
			else{
				var pwd=document.getElementById("pass").value;
				var cpwd=document.getElementById("cpass").value;
				if(pwd!=cpwd){
					document.getElementById("pass").style.border="solid red";
					document.getElementById("inputerror").innerHTML="Passwords do not match*";
					return false;
				}
			}
		}
	</script>