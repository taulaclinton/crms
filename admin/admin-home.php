<!-----------------------------------------------------
 -> Developer @ Billy Taula 
 ->The homepage section of the admin

--------------------------------------------------------->

	<!--===HOMEPAGE TITLE  ==-->
<div class="page-title-div row">
	<h3 class="title">Admin Dashboard</h3>
</div>
	
<div class="row">	
<!--===REGISTERED USERS ==-->
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class=" dashboard-stat  bg-primary ">
			<a  href="admin-dashboard.php?teachers">
				<?php							
					$sql_teacher =mysqli_query($db_con,"SELECT teacher_id FROM teachers");
					$teachers=mysqli_num_rows($sql_teacher);
					
				?>
				<span class="name">Registered Teachers</span>			
				<span style="color:yellow" class="number counter"><?php echo htmlentities($teachers);?></span>
				<span class="bg-icon"><i class="fa fa-users"></i></span>
			</a>
		</div>
	</div>	

	<!--===SUBJECTS LISTED ==-->
	<div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat bg-danger">
			<a  href="manage-subjects.php">

									
				<span class="number counter"><?php echo htmlentities($totalsubjects);?></span>
				<span class="name">Subjects Listed</span>
				<span class="bg-icon"><i class="fa fa-ticket"></i></span>
			</a>
		</div>
	</div>		
	
	<!--=== TOTAL CLASSES LISTED ==-->
	<div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat bg-warning ">
			<a  href="manage-classes.php">
										   

				<span class="number counter"><?php echo htmlentities($totalclasses);?></span>
				<span class="name">Students registered</span>
				<span class="bg-icon"><i class="fa fa-bank"></i></span>
			</a>
		</div>
	</div>	
							
	<!--===RESULTS DECLARED ==-->
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class=" dashboard-stat bg-success">
			<a  href="manage-results.php">
											

				<span class="number counter"><?php echo htmlentities($totalresults);?></span>
				<span class="name">Results Declared</span>
				<span class="bg-icon"><i class="fa fa-file-text"></i></span>
			</a>
		</div>
	</div>		
</div>	