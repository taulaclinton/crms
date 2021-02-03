<!-----------------------------------------------------------
@Developer Billy Taula
------------------------------------------------------------>
<?php

?>
	<div class="row breadcrumb-div">
        <ol class="breadcrumb">
  		    <li><a href="admin-dashboard.php?home">Dashboard</a></li>
            <li><a href="admin-dashboard.php?admins"class="active">Teachers</a></li>
        </ol>
    </div>


	<div class="row">
        <ul class="nav nav-tabs bordered">
			<li class="active"><a href="#admin_list" data-toggle="tab">Teachers</a></li>
			<li><a href="#admin_add" data-toggle="tab">Add teacher</a> </li>
		</ul>

		
		<div class="tab-content">
			
			<!---====LIST OF REGISTERED TEACHERS==-->
			<div class="tab-pane active" id="admin_list">
				<div class="table-responsive">
					<table id="myTable" class="table table-striped">
						<thead>
							<tr class="danger">
								<th style="text-align: center;">Name</th>
								<th style="text-align: center;">Username</th>
								<th style="text-align: center;">Email</th>
								<th style="text-align: center;">National ID No.</th>
								<th style="text-align: center;">Phone</th>
								<th style="text-align: center;">Title</th>
								<th style="text-align: center;">Department</th>
								<th style="text-align: center;">Account-Status</th>
								<th style="text-align: center;">Options</th>
							</tr>
						</thead>
						
						<tbody>
							<?php
								
								$sql_teacher =mysqli_query($db_con,"SELECT teachers.teacher_id, teachers.teacher_name, teachers.username, teachers.email, teachers.idno,
								teachers.phone, teachers.title, teachers.department, teachers.status, departments.name FROM teachers INNER JOIN departments ON teachers.department=departments.department_id");
								
								if(mysqli_num_rows($sql_teacher)> 0)
								{
									while($result=mysqli_fetch_array($sql_teacher))
									{
										$name=$result['teacher_name'];
										$username=$result['username'];
										$email=$result['email'];
										$idno=$result['idno'];
										$phone=$result['phone'];
										$title=$result['title'];
										$department=$result['name'];
										$status=$result['status'];
											
							?>
							<tr class="warning">
								<td style="text-align: center;"><?php echo $name;?></td>
								<td style="text-align: center;"><?php echo $username;?></td>
								<td style="text-align: center;"><?php echo $email;?></td>
								<td style="text-align: center;"><?php echo $idno?></td>
								<td style="text-align: center;"><?php echo $phone;?></td>
								<td style="text-align: center;"><?php echo $title;?></td>
								<td style="text-align: center;"><?php echo $department;?></td>
								<td style="text-align: center;">
									<?php 
										if($status==1){
											echo "<div class='badge badge-info'>Active</div>";
										}
										else{
											echo "<div class='badge badge-danger'>Inactive</div>";
										}
									 ?>
								</td>
								<td style="text-align: center;"><a style="color:red;" href="admin-dashboard.php?admin-edit">Edit</a></td>
							</tr>
						</tbody>
							<?php
									}
								}
								else
								{
									echo "<p style='color:red;text-align:center;text-shadow:0px 2px 3px yellow;'>No teachers found..</p>";
								}
							?>
					</table>
					<!---====END OF TEACHERS TABLE LIST==-->
				</div>
            </div>
			<!---====END OF TEACHERS LIST TAB PANE==-->

			<div  style="background-color:white;height:600px"class="tab-pane " id="admin_add" style="padding: 5px">
				<div class="row"><br><br>
				<form role="form" enctype="multipart/form-data"method="post" action="add-script.php">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<div class="form-group">
							<div class="input-group">
								<input type="text" class="form-control" required="" name="name" placeholder="Full Name">
								<div class="input-group-addon"><i class="fa fa-user"></i></div>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<input type="text" class="form-control" required="" name="username" placeholder="Username">	
								<div class="input-group-addon"><i class="fa fa-user"></i></div>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<input type="text" class="form-control" required="" name="idno" placeholder="National ID Number">	
								<div class="input-group-addon"><i class="fa fa-file-text"></i></div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="input-group">
								<input type="text" class="form-control" required="" name="email" placeholder="Email">
								<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="input-group">
								<input type="text" class="form-control" required="" name="phone" placeholder="eg.0712345678">
								<div class="input-group-addon"><i class="fa fa-phone"></i></div>
							</div>
						</div>
						<div class="form-group">
								<select name="title" class="form-control" required/>
									<option>...Select title...</option>
									<option value="teacher">Teacher</option>
									<option value="hod">Head of Department</option>
									<option value="hos">Head of Section</option>
								</select>
						</div>
						<div class="form-group">
								<select name="department" class="form-control" required/>
									<option>..Select department..</option>
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
						<div class="form-group">
							<div class="input-group">
								<input type="password" class="form-control" required="" name="password" placeholder="Password">
								<div class="input-group-addon"><i class="fa fa-key"></i></div>
							</div>
						</div>
						
						<div class="form-group">
							<button type="submit" name="add-teacher" class="btn btn-info pull-left">Add <span class="glyphicon glyphicon-plus"></span></button>
							<button type="reset" class="btn btn-danger pull-right">Clear</button>
							<span id="preloader-form"></span>
						</div>
					
					</div>
					<div class="col-md-4"></div>
                </form>  
				<!---===END OF NEW TEACHER FORM ===-->
				</div>
				<br><br>
			</div>
		</div>                
	</div>                

