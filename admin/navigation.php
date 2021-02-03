<div  style="padding-left:0px;margin-top-xs:500px;"id="myNavbar" class="col-md-2 left-sidebar ">
	<ul class="side-nav " id="accordion">
		<li class="nav-header"><span class="">Quick Menu</span> </li>
        <li> <a href="admin-dashboard.php?home"><i class="fa fa-dashboard"></i> <span>Dashboard</span> </a> </li>
		
		<li class="has-children"><a data-toggle="collapse" data-parent="#accordion" href="#collapse_users"><i class="fa fa-user"></i> <span>Users</span> <i class="fa fa-angle-right arrow"></i></a>
			<ul id="collapse_users" class="side-nav-collapse collapse child-nav ">
                <li><a href="admin-dashboard.php?admins"><i class="fa fa-bars"></i> <span>Admins</span></a></li>
                <li><a href="admin-dashboard.php?teachers"><i class="fa fa fa-server"></i> <span>Teachers</span></a></li>
				<li><a href="admin-dashboard.php?students"><i class="fa fa fa-server"></i> <span>Students</span></a></li>
            </ul>
        </li>
		<li class="has-children">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapse_info"><i class="fa fa fa-info"></i> <span>Information</span><i class="fa fa-angle-right arrow"></i></a>
			<ul id="collapse_info" class="side-nav-collapse collapse child-nav">
			<!---Autofetch the years of study that are in the database as defined by the user---->
			<?php 
					$sql_year_of_study =mysqli_query($db_con,"SELECT year_of_study FROM classes WHERE class_status='In session' ORDER BY year_of_study ASC");
								
					if(mysqli_num_rows($sql_year_of_study)> 0)
					{
						while($result789=mysqli_fetch_array($sql_year_of_study))
						{
							$year=$result789['year_of_study'];
							$appearance=count($result789);
							
				?>
                <li><a href="admin-dashboard.php?<?php if($result789['year_of_study']==1){echo "first-year-students";};?>"><i class="fa fa-bars"></i> <span>First Year</span></a></li>
				<?php
						}
					}
					else{
						echo "No class in session found";
					}
				?>
		   </ul>
		</li>
		<li><a  href="admin-dashboard.php?student-promotion"><i class=" fa fa-truck"></i> <span>Student promotion</span></a></li>
		<li class="nav-header"><span class="">Main Category</span> </li>
		<li class="has-children">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapse_course"><i class=" fa fa-file-powerpoint-o"></i> <span>Courses of Study</span> <i class="fa fa-angle-right arrow"></i></a>
            <ul id="collapse_course" class="side-nav-collapse collapse child-nav">
                <li><a href="admin-dashboard.php?manage-courses"><i class="fa fa-bars"></i> <span>Manage Courses</span></a></li>
				<li><a href="admin-dashboard.php?manage-departments"><i class="fa fa fa-bars"></i> <span>Departments</span></a></li>
            </ul>
		</li>
		<li class="has-children">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapse_classes"><i class=" fa fa-file"></i> <span>Classes</span> <i class="fa fa-angle-right arrow"></i></a>
            <ul id="collapse_classes" class="side-nav-collapse collapse child-nav">
                <li><a href="admin-dashboard.php?manage-classes"><i class="fa fa-server"></i> <span>Manage Classes</span></a></li>
				<li><a href="admin-dashboard.php?manage-course-duration"><i class="fa fa fa-server"></i> <span>Define class duration</span></a></li>
            </ul>
		</li>
		<li class="has-children">
           <a data-toggle="collapse" data-parent="#accordion" href="#collapse_subjects"><i class="fa fa-file-text"></i> <span>Subjects</span> <i class="fa fa-angle-right arrow"></i></a>
            <ul id="collapse_subjects"class=" side-nav-collapse collapse child-nav">
                 <li><a href="admin-dashboard.php?add-subjects"><i class="fa fa-newspaper-o"></i> <span>Add Subjects</span></a></li>
                <li><a href="admin-dashboard.php?manage-subjects"><i class="fa fa-newspaper-o"></i> <span>Manage Subjects</span></a></li>
            </ul>
        </li>
		<li class="has-children">
            <a data-toggle="collapse" data-parent="#accordion" href="#exam_marks"><i class="  glyphicon glyphicon-book "></i><span> Exam Marks</span> <i class="fa fa-angle-right arrow"></i></a>
            <ul id="exam_marks" class=" side-nav-collapse collapse child-nav">
				<li><a href="add-students.php"><i class="fa fa-bars"></i> <span>Manage Semesters</span></a></li>
                <li><a href="manage-students.php"><i class="fa fa fa-server"></i> <span>Upload Marks</span></a></li>
                <li><a href="manage-students.php"><i class="fa fa fa-server"></i> <span>Tabulate Results</span></a></li>
            </ul>
        </li>
		<li class="has-children">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse_results"><i class=" fa fa-certificate"></i> <span>Results</span> <i class="fa fa-angle-right arrow"></i></a>
            <ul id="collapse_results"class="side-nav-collapse collapse child-nav">
				<li><a href="add-result.php"><i class="fa fa-bars"></i> <span>Add Result</span></a></li>
                <li><a href="add-result.php"><i class="fa fa-bars"></i> <span>View Results</span></a></li>
				<li><a href="manage-results.php"><i class="fa fa fa-server"></i> <span>Manage Results</span></a></li>
            </ul>
         </li>
		<li class="has-children">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapse_reports"><i class=" fa fa-eraser "></i> <span>Reports</span> <i class="fa fa-angle-right arrow"></i></a>
            <ul id="collapse_reports"class="side-nav-collapse collapse child-nav">
                <li><a href="manage-students.php"><i class="fa fa fa-server"></i> <span>Generate reports</span></a></li>
                <li><a href="manage-students.php"><i class="fa fa fa-server"></i> <span>Manage reports</span></a></li>
             </ul>
		</li>
		
		<li class="nav-header"><span class="">Admin Category</span> </li>
		<li><a href="change-password.php"><i class=" fa fa-paperclip"></i> <span>Change Password</span></a></li>
		<li><a href="change-password.php"><i class=" fa fa-paperclip"></i> <span>System settings</span></a></li>
		<li class="has-children">
			<a data-toggle="collapse" data-parent="#accordion" href="#developer"><i class=" fa fa-user"></i> Developer</a>
            <center>
				<div style="color:white;"id="developer"class="side-nav-collapse collapse child-nav">
					<img src="../images/admin/developer.jpg" style="width:50px;height:50px"alt="Billy Taula" class="img-circle profile-img"><br>
					<small class="info">Billy Taula</small></br>
					<small class="info">Web Developer</small>
				</div>
			</center>
		</li>
	</ul>
	
</div>