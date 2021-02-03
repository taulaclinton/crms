 
	<div style="box-shadow:0px 2px 5px gray" class="row breadcrumb-div">
        <ol class="breadcrumb">
  		    <li><a  style="color:midnightblue" href="admin-dashboard.php?home">Dashboard</a></li>
            <li><a  style="color:midnightblue;"href="admin-dashboard.php?create-class"class="active">Manage Classes</a></li>
        </ol>
	</div>
	
	<br>
	<div  class="row">
		<ul class="nav nav-tabs bordered">
			<li class="active"><a  style="color:midnightblue" href="#edit_class" data-toggle="tab"> Classes</a></li>
			<li ><a style="color:midnightblue" href="#create_class" data-toggle="tab">Add Class</a> </li>
		</ul>

		<div style="background-color:white;"class="tab-content">
			<!--===CREATE CLASS TAB-PANE===--->
			<div class="tab-pane active" id="edit_class">
				<div class="table-responsive">
					<table id="myTable" class="table table-striped">
						<thead>
							<tr class="danger">
								<th style="text-align: center;">Class Name</th>
								<th style="text-align: center;">Year Admitted</th>
								<th style="text-align: center;">Time admitted</th>
								<th style="text-align: center;">Year of study now</th>
								<th style="text-align: center;">Class status</th>
								<th style="text-align: center;">Options</th>
								<th style="text-align: center;">Remove</th>
							</tr>
						</thead>
						
						<tbody>
							<?php
								
								$sql_class =mysqli_query($db_con,"SELECT * FROM classes WHERE class_id > 0 ORDER BY year_admitted ASC");
								
								if(mysqli_num_rows($sql_class)> 0)
								{
									while($result=mysqli_fetch_array($sql_class))
									{
										$cname=$result['classname'];
										$year_a=$result['year_admitted'];		
										$year_s=$result['year_of_study'];		
										$period=$result['period'];		
										$cstatus=$result['class_status'];		
							?>
							<tr class="warning">
								<td style="text-align: center;"><?php echo $cname;?></td>
								<td style="text-align: center;"><?php echo $year_a;?></td>
								<td style="text-align: center;"><?php echo $period;?></td>
								<td style="text-align: center;"><?php echo $year_s;?></td>
								<td style="text-align: center;">
									<?php 
										if($cstatus=='In session'){
											echo "<div class='badge badge-info'>In session</div>";
										}
										else{
											echo "<div class='badge badge-danger'>Completed</div>";
										}
									 ?>
								</td>
								<td style="text-align: center;">
									<a  class="badge badge-success"data-toggle="modal" href="#<?php $modal_id=$result['class_id']; echo $modal_id;?>">Edit</a>
									<?php

											$update_class_query=mysqli_query($db_con,"SELECT * FROM classes WHERE class_id=".$modal_id);
											$class_res=mysqli_fetch_array($update_class_query);
										
										?>	
										
									<div  class="modal fade" id="<?php  echo $modal_id;?>" role="dialog">
										<div class="modal-dialog">
																					
											 <!-- edit Modal content-->
											<div class="modal-content panel panel-warning">
												<div class="modal-header panel-heading">
													<h4 align="center"class="modal-title">Edit class</h4>
												</div>
												<div class="modal-body panel-body">
													<form  enctype="multi-part/form-data" action="edit-script.php?class-edit_id=<?php  echo $modal_id;?>"method="post"role="form">
														<div class="form-group">
															<div style="padding-right:0px;padding-left:0px"class="col-md-5">
																<label class="text text-danger" for="cl">Class Name:</label>
															</div>
															<div style="padding-right:0px;padding-left:0px"class="col-md-7">
																<input type="text" class="form-control" id="cl"name="classname" required value="<?php  echo $class_res['classname'];?>">
															</div>
														</div>
														<div class="form-group">
															<div style="padding-right:0px;padding-left:0px"class="col-md-5">
																<label class="text text-danger" for="yr">Year of admission:</label>
															</div>
															<div style="padding-right:0px;padding-left:0px"class="col-md-7">
																<input type="text" class="form-control" id="yr"name="year_admitted" required value="<?php  echo $class_res['year_admitted'];?>">
															</div>
														</div>
														<div class="form-group">
															<div style="padding-right:0px;padding-left:0px;"class="col-md-5">
																<label class="text text-danger" for="det">Period admitted:</label>
															</div>
															<div style="padding-right:0px;padding-left:0px;"class="col-md-7">
																<select class="form-control" name="period"required>
																	<option value="January intake">January intake</option>
																	<option value="May intake">May intake</option>
																	<option value="September intake">September intake</option>
																</select>
																<br><center><button type="submit" name="update_class" class="btn btn-info pull-right">Update class</button></center>
															</div>
															
														</div>
													</form>
												</div>
												<!--end of classes edit Modal content-->
												<div class="modal-footer">
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
								
								</td>
								<td style="text-align: center;"><a style="color:red;" href="delete-script.php?delete-class=<?php  echo $class_res['class_id'];?>">Delete</a></td>
							</tr>
						</tbody>
							<?php
									}
								}
								else
								{
									echo "<p style='color:red;text-align:center;text-shadow:0px 2px 3px yellow;'>No class found..</p>";
								}
							?>
					</table>
				</div>
			</div>
			
			<div style="height:570px"class="tab-pane " id="create_class">
				<div class="row">
					<div class="col-md-3"></div>
					<div  class="col-md-6"><br><br><br>
						<form  enctype="multi-part/form-data" action="add-script.php"method="post"role="form">
							<div class="form-group">
								<div style="padding-right:0px;padding-left:0px"class="col-md-5">
									<label class="text text-danger" for="cl">Class Name:</label>
								</div>
								<div style="padding-right:0px;padding-left:0px"class="col-md-7">
									<input type="text" class="form-control" id="cl"name="classname" required placeholder="e.g. 2017 summer class">
								</div>
							</div>
							<div class="form-group">
								<div style="padding-right:0px;padding-left:0px"class="col-md-5">
									<label class="text text-danger" for="yr">Year of admission:</label>
								</div>
								<div style="padding-right:0px;padding-left:0px"class="col-md-7">
									<input type="text" class="form-control" id="yr"name="year_admitted" required placeholder="e.g 2017">
								</div>
							</div>
							<div class="form-group">
								<div style="padding-right:0px;padding-left:0px;"class="col-md-5">
									<label class="text text-danger" for="det">Period admitted:</label>
								</div>
								<div style="padding-right:0px;padding-left:0px;"class="col-md-7">
									<select class="form-control" name="period"required>
										<option value="January intake">January intake</option>
										<option value="May intake">May intake</option>
										<option value="September intake">September intake</option>
									</select>
									<br><center><button type="submit" name="create_class" class="btn btn-info pull-right">Add class</button></center>
								</div>
								
							</div>
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
	