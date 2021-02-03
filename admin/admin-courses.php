
	<div style="box-shadow:0px 2px 5px gray" class="row breadcrumb-div">
        <ol class="breadcrumb">
  		    <li><a  style="color:midnightblue" href="admin-dashboard.php?home">Dashboard</a></li>
            <li><a  style="color:midnightblue;"href="admin-dashboard.php?manage-courses"class="active">Manage Courses</a></li>
        </ol>
	</div>
	
	<br>
	<div  class="row">
		<ul class="nav nav-tabs bordered">
			<li class="active"><a  style="color:midnightblue" href="#courses" data-toggle="tab">Courses of Study</a></li>
			<li ><a style="color:midnightblue" href="#add_course" data-toggle="tab">Add course of study</a> </li>
		</ul>

		<div style="background-color:white;"class="tab-content">
			<!--===CREATE CLASS TAB-PANE===--->
			<div class="tab-pane active" id="courses">
				<div class="table-responsive">
					<table id="myTable" class="table table-striped">
						<thead>
							<tr class="danger">
								<th style="text-align: left;">Course Name</th>
								<th style="text-align: left;">Department</th>
								<th style="text-align: left;">Options</th>
								<th style="text-align: left;">Remove</th>
							</tr>
						</thead>
						
						<tbody>
							<?php
								
								$sql_course =mysqli_query($db_con,"SELECT courses.course_id,courses.course_name,courses.department_id, departments.name FROM courses INNER JOIN departments ON departments.department_id=courses.department_id");
								
								if(mysqli_num_rows($sql_course)> 0)
								{
									while($resultc=mysqli_fetch_array($sql_course))
									{
										$cname=$resultc['course_name'];
										$dep=$resultc['name'];				
							?>
							<tr class="warning">
								<td style="text-align: left;"><?php echo $cname;?></td>
								<td style="text-align: left;"><?php echo $dep;?></td>
								
								<td style="text-align: left;">
									<a  class="badge badge-success"data-toggle="modal" href="#<?php $modal_id=$resultc['course_id']; echo $modal_id;?>">Edit</a>
									<?php

											$update_dep_query=mysqli_query($db_con,"SELECT * FROM courses WHERE course_id=".$modal_id);
											$course_res=mysqli_fetch_array($update_dep_query);
										
										?>	
										
									<div  class="modal fade" id="<?php  echo $modal_id;?>" role="dialog">
										<div class="modal-dialog">
																					
											 <!-- edit Modal content-->
											<div class="modal-content panel panel-warning">
												<div class="modal-header panel-heading">
													<h4 align="center"class="modal-title">Edit course</h4>
												</div>
												<div class="modal-body panel-body">
													<form  enctype="multi-part/form-data" action="edit-script.php?course-edit_id=<?php  echo $modal_id;?>"method="post"role="form">
														<div class="form-group">
															<label class="col-md-4 control-label" for="dep">Course of Study: </label>
															<div class="col-md-8">
																<input id="dep"type="text" class="form-control" name="course_name" required value="<?php echo $course_res['course_name'];?>">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label" for="dep">Department: </label>
															<div class="col-md-8">
																<select class="form-control" name="department"id="dep" required >
																		<option>..Select..</option>
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
																			else{
																				echo "<option>..No department found..</option>";
																			}
																		?>
																</select>
															</div>
														</div>
														<div class="form-group">
															
															<center><button type="submit" name="update_course" class="btn btn-info pull-right">Update course details</button></center>
															<span id="preloader-form"></span>
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
								<td style="text-align: left;"><a class="badge badge-danger"  href="delete-script.php?delete-course=<?php  echo $course_res['course_id'];?>">Delete</a></td>
							</tr>
						</tbody>
							<?php
									}
								}
								else
								{
									echo "<p style='color:red;text-align:center;text-shadow:0px 2px 3px yellow;'>No courses added yet..</p>";
								}
							?>
					</table>
				</div>
			</div>
			
			<div style="height:530px"class="tab-pane " id="add_course">
				<div class="row"><br><br><br>
					<div class="col-md-3"></div>
					<div  style="box-shadow:0px 2px 5px gray;padding:20px"class="col-md-6">
						<form  enctype="multi-part/form-data" action="add-script.php"method="post"role="form">
							<div class="form-group">
								<div class="col-md-4">
									<label class="text-info" for="course">Course of Study:</label>
								</div>
								<div class="col-md-8">
									<input type="text" id="course"class="form-control" name="course_name" required placeholder="Course Name">
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-md-4">
									<label class="text-info"for="dep">Department:</label>
								</div>
								<div class="col-md-8">
									<select class="form-control" id="dep"name="department" required/>
										<option>..Select..</option>
									<?php
										/**select the departments that exist in the college database **/
										$sql_dep =mysqli_query($db_con,"SELECT * FROM departments WHERE department_id > 0");
										if (mysqli_num_rows($sql_dep)>0){
											
											while($deps=mysqli_fetch_array($sql_dep)){
											
										?>
											<option value="<?php echo $deps['department_id'];?>"><?php echo $deps['name'];?></option>
									<?php 
											}
										}
										else{
											echo "<option>..No department found..</option>";
										}
									?>
										
									</select>
								</div>
							</div>
							<br><br><br><br>
								<center><button type="submit" name="add_course"  class="btn btn-info pull-right">Add course</button></center>
								<span id="preloader-form"></span>
						</form>
					</div>
					<div class="col-md-3"></div>
				</div>	<br>
			</div>
			
			<div class="tab-pane" id="edit_class">
			
			</div>
		</div>
	</div>
	