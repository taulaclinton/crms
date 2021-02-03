<?php
	
	
/**-----------------------------------------------------------------------------------------------------------------
		FETCHING COURSE ACCORDING TO DEPARTMENT SELECTED
-----------------------------------------------------------------------------------------------------------------**/
		if(isset($_GET['dep_id']))
		{
			include_once('../includes/config.php');
			$fetch_id=$_GET['dep_id'];
			$sqlcourse =mysqli_query($db_con,"SELECT * FROM courses WHERE department_id=$fetch_id ORDER BY course_name ASC");
			if (mysqli_num_rows($sqlcourse)>0)
			{
				while($cos1=mysqli_fetch_array($sqlcourse))
				{
												
					?>
					<option value="<?php echo $cos1['course_id'];?>"><?php echo $cos1['course_name'];?></option>
					<?php 
				}
			}
			else{
				echo 