<!-----------------------------------------------------------
@Developer Billy Taula
------------------------------------------------------------>

	<div class="row breadcrumb-div">
        <ol class="breadcrumb">
  		    <li><a href="admin-dashboard.php?home">Dashboard</a></li>
            <li><a href="admin-dashboard.php?students"class="active">Students</a></li>
        </ol>
    </div>

<div class="row">
    <ul class="nav nav-tabs bordered">
		<li class="active"><a href="#add_student" data-toggle="tab">Add Student</a></li>
		<li><a href="#many_students" data-toggle="tab">Massive students</a> </li>
	</ul>

	<div style="background-color:white;"class="tab-content">	
			<!---====ADD A SINGLE STUDENT==-->
		<div style="height:570px;padding:5px" class="tab-pane active" id="add_student">
			<div class="row"><br>
				<form role="form" method="post" enctype="multipart/form-data"action="add-script.php">
					<div class="col-md-4">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-user"></i></div>
								<input type="text" class="form-control" required="" name="student_name" placeholder="Full Name">
							</div>
						</div>
						
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-file-text"></i></div>
								<input type="text" class="form-control" required="" name="regno" placeholder="Registration Number">	
							</div>
						</div>
						
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
								<input type="text" class="form-control" required="" name="email" placeholder="Email">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-phone"></i></div>
								<input type="text" class="form-control" required="" name="phone" placeholder="e.g 0712345678">
							</div>
						</div>
					</div>
					
					<div class="col-md-4">
						
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i>DOB</i></div>
								<input type="date" class="form-control" required="" placeholder="MM/DD/YYYY"name="dob">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i>Sex</i></div> 
								<select name="sex" class="form-control" required/>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">KCSE grade</div>
								<select class="form-control" name="form4grade" required >
									<option >Select...</option>
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
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i>Program</i></div>
								<select name="program" class="form-control" required/>
									<option>..Select..</option>
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
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i>Year</i></div> 
									<select name="year_of_study" class="form-control" required/>
										<option value="1">1st year</option>
										<option value="2">2nd year</option>
										<option value="3">3rd Year</option>
										<option value="4">4rd Year</option>
									</select>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
							<!--===FETCH CLASSES FROM CLASS TABLE====-->
								<div class="input-group-addon"><i>Class</i></div>
									<select name="class" class="form-control" required/>
									<?php
										$sql_class=mysqli_query($db_con,"SELECT * FROM classes WHERE class_id>0 AND class_status='In session'");
										if($sql_class){
											while($result=mysqli_fetch_array($sql_class)){
												$cname=$result['classname'];
												$class_id=$result['class_id'];
												$class_admission=$result['doa'];
									?>
										<option value="<?php echo $cname; ?>"><?php echo $cname; ?></option>
									
										<?php
											}
										}
										else{
											echo "No class found";
										}
									?>
									</select>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" name="add_student" class="btn btn-info pull-right">Add student <span class="glyphicon glyphicon-plus"></span></button>
							<span id="preloader-form"></span>
						</div>
					</div>
                </form>				
			</div>
				<br><br>
        </div>
			<!---====END OF STUDENT ADD TAB PANE==-->

		<div  class="tab-pane " id="many_students" style="padding: 5px">
			<div style="height:580px;margin-left:10px"class="row">
				
				<div class="col-md-6">
					<h3 class="text-danger">Things to note when uploading massive students:</h3>
					<ol class="text-warning">
						<li>You need to save your excel file as .csv file</li>
						<li>Students in the csv file should belong to the same class and course</li>
						<li>The excel file should be in the pattern: <br> &nbsp &nbsp Student Name | RegNo | Email | PhoneNo | D.O.B | Sex| KCSEgrade</li>
						<li>D.O.B should be in the format YYYY-MM-DD e.g 1997-03-26</li>
					</ol>
				</div>
				<div class="col-md-4"><br>
					<form role="form" enctype="multipart/form-data" action="add-script.php"method="post">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i>Course</i></div>
								<select name="program" class="form-control" required/>
									<option>..Select..</option>
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
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i>Year</i></div> 
									<select name="year_of_study" class="form-control" required/>
										<option value="1">1st year</option>
										<option value="2">2nd year</option>
										<option value="3">3rd Year</option>
										<option value="4">4rd Year</option>
									</select>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
							<!--===FETCH CLASSES FROM CLASS TABLE====-->
								<div class="input-group-addon"><i>Class</i></div>
									<select name="class" class="form-control" required/>
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
						</div>
						<div class="form-group">
							<label for="exl">Upload a class excel file</label>
							<input type="file" id="exl"class="form-control" name="mass_students">
						</div>
						<input type="submit"  name="add_many_students" class="btn btn-info pull-right" value="Upload"  />
					</form>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</div>                
</div>                

