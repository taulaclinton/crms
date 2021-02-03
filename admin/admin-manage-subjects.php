
	
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
            <li><a  style="color:	teal;"href="admin-dashboard.php?manage-subjects"class="active">View subjects</a></li>
        </ol>
	</div>

	<div  class="row">
		<ul class="nav nav-tabs bordered">
			<li class="active"><a  style="color:midnightblue" href="#view_sub" data-toggle="tab">View subjects </a></li>
			<li ><a style="color:midnightblue" href="#edit_sub" data-toggle="tab">Edit subject</a> </li>
		</ul>
		
		<div style="background-color:white;"class="tab-content">
		
	<!-------------------------------------------------------------------------------------------------------
			VIEW SUBJECTS TAB-PANE
	--------------------------------------------------------------------------------------------------------->
			<div style="height:600px;padding-left:25px;"class="tab-pane active  " id="view_sub"><br>
				<div class="row">
				<form class="form-horizontal" enctype="multipart/form-data" method="post" action="">
					<div class="col-md-3">
						<select onchange="showcourses(this.value);"class="form-control" name="department" id="dep" >
								<option >Select department</option>
								<?php
									/**select the departments that exist in the college database **/
									$sqldep =mysqli_query($db_con,"SELECT * FROM departments WHERE department_id > 0  ORDER BY name ASC");
									if (mysqli_num_rows($sqldep)>0){
										
										while($dep1=mysqli_fetch_array($sqldep)){
																					
								?>
								<option value="<?php echo $dep1['department_id'];?>"><?php echo $dep1['name'];?></option>
								<?php 
										}
									}
								?>
						</select><br>
					</div>
					<div class="col-md-3">
						<select class="form-control" name="course" id="koses" >
							<option>Course of study</option>
						</select><br>
					</div>
					<div class="col-md-2">
						<select class="form-control" name="year" id="yr" >
							<option>Year of study</option>
							<option value="1">First</option>
							<option value="2">Second</option>
							<option value="3">Third</option>
							<option value="4">Fourth</option>
						</select><br>
					</div>
					<div class="col-md-2">
						<select class="form-control" name="semester" id="sem" >
							<option>Semester</option>
							<option value="1">First</option>
							<option value="2">Second</option>
							<option value="3">Third</option>
							<option value="4">Fourth</option>
						</select><br>
					</div>
					<div class="col-md-2">
						<button class="btn btn-info" name="view-subjects"type="submit" >View</button>
					</div><br><br>
				</form>
				</div>
				<!--------------------------------------------------------------------
				PHP SCRIPT TO PICK SUBJECTS FROM TABLE ACCORDING TO COURSE OF STUDY
				---------------------------------------------------------------------->
				<div class="table-responsive row">
					<table id="myTable" class="table table-striped">
						<thead>
							<tr class="danger">
								<th style="text-align: left;">Subject Name</th>
								<th style="text-align: left;">Semester</th>
								<th style="text-align: left;">Year of Study</th>
								<th style="text-align: left;">Options</th>
							</tr>
						</thead>
						
						<tbody>
						<?php
						if(isset($_POST['view-subjects'])){
									
								//Receive details for the subjects to be displayed
								$department= mysqli_real_escape_string($db_con,$_POST['department']);
								$course= mysqli_real_escape_string($db_con,$_POST['course']);
								$year= mysqli_real_escape_string($db_con,$_POST['year']);
								$sem= mysqli_real_escape_string($db_con,$_POST['semester']);
									
								$sql_subject =mysqli_query($db_con,"SELECT * FROM subjects WHERE course_of_study='$course' AND year_of_study='$year' AND semester='$sem' ORDER BY subject_name ASC");
								if(mysqli_num_rows($sql_subject)> 0){
									while($results=mysqli_fetch_array($sql_subject)){
										$subject=$results['subject_name'];				
										$semester=$results['semester'];				
										$yearof=$results['year_of_study'];						
									?>
										<tr class="warning">
											<td style="text-align: left;"><?php echo $subject;?></td>
											<td style="text-align: left;">Semester <?php echo $semester;?></td>
											<td style="text-align: left;">Year <?php echo $yearof;?> </td>
											<td style="text-align: left;"> 
													<a class="badge badge-success"data-toggle="modal" href="#<?php $modal_id=$results['subject_id']; echo $modal_id;?>">Edit</a>
											
												<?php
													//select subjects
													$update_subject_query=mysqli_query($db_con,"SELECT * FROM subjects WHERE subject_id=".$modal_id);
													$subjectUp=mysqli_fetch_array($update_subject_query);
													
												?>	
													<div  class="modal fade" id="<?php  echo $modal_id;?>" role="dialog">
														<div class="modal-dialog">
																									
															 <!-- edit Modal content-->
															<div class="modal-content panel panel-warning">
																<div class="modal-header panel-heading">
																	<h4 align="center"class="modal-title">Edit subject</h4>
																</div>
																<div class="modal-body panel-body">
																	<form  enctype="multi-part/form-data" action="edit-script.php?subject-edit_id=<?php  echo $modal_id;?>"method="post"role="form">
																		<div class="row form-group">
																			<div class="col-md-4"><label class=" control-label text-danger" for="sn">Subject name: </label></div>
																			<div class="col-md-8">
																				<input  id="sn"type="text" class="form-control" name="subject_name" value="<?php echo $subjectUp['subject_name'];?>" required/>
																			</div>
																		</div>
																		<div class="row form-group">
																			<div class="col-md-4"><label class=" control-label text-danger" for="sn">Department name: </label></div>
																			<div class="col-md-8">
																				<select class="form-control" name="department">
																					<option>Select </option>
																					<?php
																						/**select the departments that exist in the college database **/
																						$sqldep =mysqli_query($db_con,"SELECT * FROM departments WHERE department_id > 0 ORDER BY name ASC");
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
																			<div class="col-md-4"><label class=" control-label text-danger" for="sn">Course of study: </label></div>
																			<div class="col-md-8">
																				<select class="form-control" name="course">
																					<option>Select..</option>
																				<?php
																						/**select the departments that exist in the college database **/
																						$sqlcos=mysqli_query($db_con,"SELECT * FROM courses WHERE course_id > 0 ORDER BY course_name ASC");
																						if (mysqli_num_rows($sqlcos)>0){
																							
																							while($cos=mysqli_fetch_array($sqlcos)){
																																		
																					?>
																					<option value="<?php echo $cos['course_id'];?>"><?php echo $cos['course_name'];?></option>
																					<?php 
																							}
																						}
																					?>
																				</select>
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
																			<button class="btn btn-info pull-right" type="submit" name="update-subject">Update subject</button>
																		</div>
																	</form>
																</div>
																<!--end of courses edit Modal content-->
																<div class="modal-footer">
																	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
																</div>
															</div>
														</div>
													</div>
											</td>
										</tr>
													
									<?php
									}
								}
								else{
									echo "<p style='color:red;text-align:center;text-shadow:0px 2px 3px yellow;'>No subjects found..</p>";
								}
								mysqli_close($db_con);
							}
					?>	
					</table>
				</div>
			</div>
			<div class="tab-pane " id="edit_sub"><br>
			
			</div>
	</div>
	