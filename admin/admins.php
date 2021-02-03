<!-----------------------------------------------------------
	@Developer Billy Taula
	@Admins page
------------------------------------------------------------>
	<div class="row breadcrumb-div">
        <ol class="breadcrumb">
  		    <li><a href="admin-dashboard.php?home">Dashboard</a></li>
            <li><a href="admin-dashboard.php?admins"class="active">Admins</a></li>
        </ol>
    </div>
	
	<div class="row">
        <ul class="nav nav-tabs bordered">
			<li class="active"><a href="#admin_list" data-toggle="tab">Admins</a></li>
			<li><a href="#admin_add" data-toggle="tab">New</a> </li>
		</ul>

		
		<div style="background-color:white;"class="tab-content">
			
			<!---====LIST OF REGISTERED ADMINS==-->
			<div  style="height:580px"class="tab-pane active" id="admin_list">
				<div class="table-responsive">
					<table id="myTable" class="table table-striped">
						<thead>
							<tr class="danger">
								<th style="text-align: center;">Name</th>
								<th style="text-align: center;">Username</th>
								<th style="text-align: center;">Phone</th>
								<th style="text-align: center;">Email</th>
								<th style="text-align: center;">Account-Status</th>
								<th style="text-align: center;">Options</th>
							</tr>
						</thead>
						
						<tbody>
							<?php
								
								$sql_admin =mysqli_query($db_con,"SELECT * FROM admin WHERE admin_id > 0 AND level='1'");
								
								if(mysqli_num_rows($sql_admin)> 0)
								{
									while($result=mysqli_fetch_array($sql_admin))
									{
										$id=$result['admin_id'];
										$name=$result['name'];
										$username=$result['username'];
										$email=$result['email'];
										$phone=$result['phone'];
										$idno=$result['idno'];
										$status=$result['status'];
											
							?>
							<tr class="warning">
								<td style="text-align: center;"><?php echo $name;?></td>
								<td style="text-align: center;"><?php echo $username;?></td>
								<td style="text-align: center;"><?php echo $phone;?></td>
								<td style="text-align: center;"><?php echo $email;?></td>
								<td style="text-align: center;">
									<?php 
										if($status==1){
											echo "<div class='badge badge-info'>Active</div>";
										}
										elseif($status==0){
											echo "<div class='badge badge-danger'>Inactive</div>";
										}
									 ?>
								</td>
								<td style="text-align: center;">
									<a class='badge badge-danger' href="edit-script.php?admin-freeze=<?php echo $id;?>">Freeze</a>
								</td>
							</tr>
						</tbody>
							<?php
									}
								}
								else
								{
									echo "<p style='color:red;text-align:center;text-shadow:0px 2px 3px yellow;'>No Admin users found..</p>";
								}
							?>
					</table>
					<!---====END OF ADMINS TABLE LIST==-->
				</div>
            </div>
			<!---====END OF ADMINS LIST TAB PANE==-->

			<div  style="height:580px"class="tab-pane " id="admin_add" style="padding: 5px">
				<div class="row"><br><br>
				<form role="form" method="post" enctype="multipart/form-data" action="add-script.php">
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
								<input type="text" class="form-control" required="" name="phone" placeholder="Phone Number">
								<div class="input-group-addon"><i class="fa fa-phone"></i></div>
							</div>
						</div>
						<div class="form-group">
								<select name="status" class="form-control" required/>
									<option value="1">...Select...</option>
									<option value="1">Active</option>
									<option value="2">Deadictivated</option>
								</select>
						</div>
						
						<div class="form-group">
							<div class="input-group">
								<input type="password" class="form-control" required="" name="password" placeholder="Password">
								<div class="input-group-addon"><i class="fa fa-key"></i></div>
							</div>
						</div>
						
						<div class="form-group">
							<button type="submit" name="add-admin" class="btn btn-info pull-left">Add <span class="glyphicon glyphicon-plus"></span></button>
							<button type="reset" class="btn btn-danger pull-right">Clear</button>
							<span id="preloader-form"></span>
						</div>
					
					</div>
					<div class="col-md-4"></div>
                </form>  
				<!---===END OF NEW ADMIN FORM ===-->
				</div>
				<br><br>
			</div>
		</div>                
	</div>                

