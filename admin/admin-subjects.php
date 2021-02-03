
<!------------------------------------------------------------------------------------------------------------------
	AJAX TO WORK ON LOADING SPECIFIC COURSES,SEMESTER ETC 
--------------------------------------------------------------------------------------------------------------------->
			<script type="text/javascript">
				function showcourses(departmentId)
				{
					var get_cos;
					/**----------------------------------------------------------------
						@check if department  is selected, 
						@if not echo "no course found" and exit the function.
					---------------------------------------------------------------------**/
					if (departmentId == "") {
						document.getElementById("koses").innerHTML = "<option>No course found.</option>";
						return;
					} 
					/**-----------------------------------------------------------------------
						If department is selected :
							#Create an XMLHttpRequest object
							#Create the function to be executed when the server response is ready
							#Send the request off to a file on the server
					----------------------------------------------------------------------------***/
					else {
						if (window.XMLHttpRequest) {
							// code for IE7+, Firefox, Chrome, Opera, Safari
							 get_cos = new XMLHttpRequest();
						} else {
							// code for IE6, IE5
							get_cos = new ActiveXObject("Microsoft.XMLHTTP");
						}
						get_cos.onreadystatechange = function() {
							if (get_cos.readyState == 4 && get_cos.status == 200) {
								document.getElementById("koses").innerHTML = get_cos.responseText;
							}
						}
						//Send the request to the server and set it to true to be handled asynchronously
						get_cos.open("GET","admin-ajax.php?dep_id="+departmentId,true);
						get_cos.send();
					}

				}
			</script>
			
	<div style="box-shadow:0px 2px 5px gray" class="row breadcrumb-div">
        <ol class="breadcrumb">
  		    <li><a  style="color:	teal" href="admin-dashboard.php?home">Dashboard</a></li>
            <li><a  style="color:	teal;"href="admin-dashboard.php?add-subjectd"class="active">Add subjects</a></li>
        </ol>
	</div>

	<div  class="row">
		<ul class="nav nav-tabs bordered">
			<li class="active"><a  style="color:midnightblue" href="#add_sub" data-toggle="tab">Add Subjects </a></li>
			<li ><a style="color:midnightblue" href="#add_mass_sub" data-toggle="tab">Add a list of subjects</a> </li>
		</ul>
		
		<div style="background-color:white;"class="tab-content">
		
			<!--===ADD SUBJECT TAB-PANE===--->
			<div style="height:600px"class="tab-pane active " id="add_sub"><br>
				<div class="col-md-3"></div>
				<div class="col-md-6">
				<form enctype="multipart/form-data" action="add-script.php"method="post">
					<div class="row form-group">
						<div class="col-md-4"><label class=" control-label text-danger" for="sn">Subject name: </label></div>
						<div class="col-md-8">
							<input  id="sn"type="text" class="form-control" name="subject_name" placeholder="e.g IT 101 Introduction to Information Technology"required/>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-4"><label class=" control-label text-danger" for="dp">Department: </label></div>
						<div class="col-md-8">
							<select onchange="showcourses(this.value);"class="form-control" name="department" id="dep" >
								<option >Select department</option>
								<?php
									/**select the departments that exist in the college database **/
									$sqldep =mysqli_query($db_con,"SELECT * FROM departments WHERE department_id > 0");
									if (mysqli_num_rows($sqldep)>0){
										
										while($dep1=mysqli_fetch_array($sqldep)){
																					
								?>
								<option value="<?php echo $dep1['department_id'];?>"><?php echo $dep1['name'];?></option>
								<?php 
										}
									}
								?>
							</select>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-4"><label class="control-label text-danger" for="sn">Course of Study: </label></div>
						<div class="col-md-8">
							<select class="form-control" name="course" id="koses" ></select>
						</div>
					</div>
					<div class="row form-group">	
						<div class="col-md-4"><label class="control-label text-danger" for="yr">Year of Study: </label></div>
						<div class="col-md-8">
							<select class="form-control" name="year" id="yr" >
								<option>Select..</option>
								<option value="1">First</option>
								<option value="2">Second</option>
								<option value="3">Third</option>
								<option value="4">Fourth</option>
								
							</select>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-4"><label class="control-label text-danger" for="sn">Semester: </label></div>
						<div class="col-md-8">
							<select class="form-control" name="semester" id="sem" >
								<option>Select..</option>
								<option value="1">First</option>
								<option value="2">Second</option>
								<option value="3">Third</option>
								<option value="4">Fourth</option>
							</select>
						</div>
						<br><br>
						<button class="btn btn-info pull-right" type="submit" name="add-subject">Add subject</button>
					</div>
				</form>
				</div>
				<div class="col-md-3"></div>
			</div>
			<!--=== MASSIVE SUBJECTS TAB-PANE===--->
			<div style="height:600px;"class="tab-pane" id="add_mass_sub">
				
				<div class="col-md-3"></div>
				
				<div class="col-md-6"><br>
					<h3 class="text-primary">Before you upload an excel list of courses :</h3>
					<ol style="font-weight:bold;">
						<li>Fill ONLY one column in the excel file</li>
						<li>The first row of the worksheet should contain the title of the course of study.</li>
						<li>The code and name of the course be in the same column</li>
						<li>Ensure the courses are of the same semester and year</li>
					</ol>
				
				<form enctype="multipart/form-data" action="add-script.php"method="post">
					<div class="row form-group">
						<div class="col-md-4"><label class=" control-label text-danger" for="dp">Department: </label></div>
						<div class="col-md-8">
							<select onchange="showmass(this.value);"class="form-control" name="department" id="dep" >
								<option >Select department</option>
								<?php
									/**select the departments that exist in the college database **/
									
									$sqldep =mysqli_query($db_con,"SELECT * FROM departments WHERE department_id > 0");
									if (mysqli_num_rows($sqldep)>0){
										
										while($dep1=mysqli_fetch_array($sqldep)){
																					
								?>
								<option value="<?php echo $dep1['department_id'];?>"><?php echo $dep1['name'];?></option>
								<?php 
										}
									}
									mysqli_close($db_con);
								?>
							</select>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-4"><label class="control-label text-danger" for="sn">Course of Study: </label></div>
						<div class="col-md-8">
							<select class="form-control" name="course" id="coses" ></select>
						</div>
					</div>
					<div class="row form-group">	
						<div class="col-md-4"><label class="control-label text-danger" for="yr">Year of Study: </label></div>
						<div class="col-md-8">
							<select class="form-control" name="year" id="yr" >
								<option>Select..</option>
								<option value="1">First</option>
								<option value="2">Second</option>
								<option value="3">Third</option>
								<option value="4">Fourth</option>
								
							</select>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-4"><label class="control-label text-danger" for="sn">Semester: </label></div>
						<div class="col-md-8">
							<select class="form-control" name="semester" id="sem" >
								<option>Select..</option>
								<option value="1">First</option>
								<option value="2">Second</option>
								<option value="3">Third</option>
								<option value="4">Fourth</option>
							</select>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-4"><label class="control-label text-danger" >List of subjects: </label></div>
						<div class="col-md-8">
							<input type="file" class="form-control" name="list_subjects"required/>
						</div>
						<br><br>
						<button class="btn btn-info pull-right" type="submit" name="add_many_subjects">Add subjects</button>
					</div>
				</form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>
	