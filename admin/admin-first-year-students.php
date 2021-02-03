

	<div style="box-shadow:0px 2px 5px gray" class="row breadcrumb-div">
        <ol class="breadcrumb">
  		    <li><a  href="admin-dashboard.php?home">Dashboard</a></li>
            <li><a  href="admin-dashboard.php?first-year-students">1st Yr Students</a></li>
        </ol>
	</div>

	<div  class="row">
		<ul  style="font-weight:bold;"class="nav nav-tabs bordered">
			<li class="active"><a  style="color:teal;" href="#first_year" data-toggle="tab">First Years </a></li>
			<li ><a style="color:teal;" href="#bydep" data-toggle="tab">By department</a> </li>
			<li ><a style="color:teal;" href="#bycourse" data-toggle="tab">By course of study</a> </li>
			<li ><a style="color:teal;" href="#searchs" data-toggle="tab">Search a student</a> </li>
		</ul>
		
		<div style="background-color:white;"class="tab-content">
			<div class="tab-pane active" id="first_year"  style="padding:5px;">
				<div class="row">
					<p style="text-align:center;"class="text-warning">Below is a list of the first 50 1st year students.</p>
				<?php 
					$sql_first_year =mysqli_query($db_con,"SELECT * FROM students WHERE year_of_study='1' ORDER BY regno ASC");
								
					if(mysqli_num_rows($sql_first_year)> 0)
					{
						while($result=mysqli_fetch_array($sql_first_year))
						{
								
				?>
				
					<div class="col-md-1">
						<div style="overflow:auto;"class="student-area img-thumbnail">
							<a style="color:teal;font-size:90%;" data-toggle="modal"  href="#<?php  $modal_id23=$result['student_id']; echo $modal_id23;?>">
								<span><img class="img-circle img-responsive"src="../uploads/student/<?php echo $result['student_id'].".png";?>"></span>
								<?php echo $result['regno'];?> <?php echo $result['student_name'];?>
							</a>
						</div>
					</div>
					<!-------------------------------------------------
						modal
					-------------------------------------------------->
					<div  class="modal fade" id="<?php echo $modal_id23;?>" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content panel panel-default">
								<div style="background-color:teal;" class="modal-header panel-heading"><br>
									<h4 style="color:white;"align="center"class="modal-title">Choose what to do</h4>
								</div>
								<div style="padding:20px;"class="modal-body panel-body">
									<ul class="nav nav-pills nav-stacked">
										<li style="border-bottom:solid teal;"><a  href="admin-dashboard.php?student-portal=<?php echo $modal_id23;?>">View <?php echo $result['student_name'];?>'s profile</a></li>
										<li  style="bord