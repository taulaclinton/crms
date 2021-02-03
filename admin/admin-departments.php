<?php
	
?>
 
	<div style="box-shadow:0px 2px 5px gray;" class="row breadcrumb-div">
        <ol class="breadcrumb">
  		    <li><a  style="color:midnightblue" href="admin-dashboard.php?home">Dashboard</a></li>
            <li><a  style="color:midnightblue;"href="admin-dashboard.php?manage-departments"class="active">Manage Departments</a></li>
        </ol>
	</div>
	
	<br>
	<div  class="row">
			
		<ul class="nav nav-tabs bordered">
			<li class="active"><a  style="color:midnightblue" href="#department" data-toggle="tab"> Departments</a></li>
			<li ><a style="color:midnightblue" href="#add_department" data-toggle="tab">Add Department</a> </li>
		</ul>

		<div style="background-color:white;height:570px"class="tab-content">
			<!--===CREATE CLASS TAB-PANE===--->
			<div class="tab-pane active" id="department">
				<div class="table-responsive">
					<table id="myTable" class="table table-striped">
						<thead>
							<tr class="danger">
								<th style="text-align: left;">Department Name</th>
								<th style="text-align: left;">Description</th>
								<th style="text-align: left;">Options</th>
								<th style="text-align: left;">Remove</th>
							</tr>
						</thead>
						
						<tbody>
							<?php
								$sql_dep =mysqli_query($db_con,"SELECT * FROM departments WHERE department_id > 0");
								if(mysqli_num_rows($sql_dep)> 0)
								{
									while($result=mysqli_fetch_array($sql_dep))
									{
										
							?>
							<tr class="warning">
							
								<td style='text-align: left;'><?php echo $result['name'];?></td>
								<td style='text-align: left;'><?php echo $result['description'];?></td>                      
								<td style="text-align: left;">
									
									<!---===EDIT MODAL AND ITS PHP SCRIPT==-->
									<a class="badge badge-primary" data-toggle="modal" href="#<?php $modal_id=$result['department_id']; echo $modal_id;?>">Edit</a>
										<?php

											$update_query =mysqli_query($db_con,"SELECT * FROM departments WHERE department_id=".$modal_id);
											$res=mysqli_fetch_array($update_query);
										
										?>	
										
									<div  class="modal fade" id="<?php  echo $modal_id;?>" role="dialog">
										<div class="modal-dialog">
																					
											 <!-- edit Modal content-->
											<div class="modal-content panel panel-warning">
												<div class="modal-header panel-heading">
													<h4 align="center"class="modal-title">Edit department</h4>
												</div>
												<div class="modal-body panel-body">
													<form  enctype="multi-part/form-data" action="edit-script.php?department-edit_id=<?php  echo $modal_id;?>"method="post"role="form">
														<div class="form-group">
															<label class="col-md-3 control-label" for="dep">Department: </label>
															<div class="col-md-9">
																<input id="dep"type="text" class="form-control" name="name" required value="<?php echo $res['name'];?>">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-3 control-label" for="dep">Description: </label>
															<div class="col-md-9">
																<textarea id="des"class="form-control" name="description" rows="4" required > <?php echo $res['description'];?> </textarea>
															</div>
														</div>
														<div class="form-group">
															<center><button type="submit" name="update_departments" class="btn btn-info ">Update information</button></center>
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
								</td>
								
								<td style="text-align: center;">
									<a class="badge badge-danger" href="delete-script.php?delete-department=<?php  echo $result['department_id'];?>">Delete</a>
								</td>
							</tr>
						</tbody>
							<?php
									}
									
									
								}
								else
								{
									echo "<p style='color:red;text-align:center;text-shadow:0px 2px 3px yellow;'>No department found..</p>";
								}
							?>
					</table>
				</div>
			</div>
			
			<div style="height:530px"class="tab-pane " id="add_department">
				<div class="row">
					<div class="col-md-4"></div>
					<div  class="col-md-4"><br><br><br>
						<form  enctype="multi-part/form-data"action="add-script.php" method="post"role="form">
							<div class="form-group">
								<label class="col-md-3 control-label" for="dep">Department: </label>
								<div class="col-md-9">
									<input id="dep"type="text" class="form-control" name="name" required placeholder="Department Name">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="dep">Description: </label>
								<div class="col-md-9">
									<textarea id="des"class="form-control" name="description" rows="5" required placeholder="Description"></textarea>
								</div>
							</div>
							<div class="form-group">
								<center><button type="submit" name="add-department" class="btn btn-info ">Create department</button></center>
								<span id="preloader-form"></span>
							</div>
						</form>
					</div>
					<div class="col-md-4"></div>
				</div>	<br>
			</div>
			
			<div class="tab-pane" id="edit_class">
			
			</div>
		</div>
	</div>