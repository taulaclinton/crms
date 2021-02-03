<?php
/**------------------------------------------------
	@@THE ADDING SCRIPT
	
	1. ADDING ADMIN
	2. ADDING TEACHERS
	3. ADDING ONE STUDENT AT A TIME
	4. ADDING MASSIVE STUDENTS
	5. ADDING CLASSES
	6. ADDING COURSES
	7. ADDING DEPARTMENTS
--------------------------------------------------**/
session_start();
if(!isset($_SESSION['admin'])){
	header("Location:../index.php");
}
else{
	include('../includes/config.php');
	
	
	/**----------------------------
		ADDING ADMIN 
	-----------------------------**/
	if(isset($_POST['add-admin'])){
		$name= mysqli_real_escape_string($db_con,$_POST['name']);
		$username= mysqli_real_escape_string($db_con,$_POST['username']);
		$phone= mysqli_real_escape_string($db_con,$_POST['phone']);
		$idno = mysqli_real_escape_string($db_con,$_POST['idno']);
		$email = mysqli_real_escape_string($db_con,$_POST['email']);
		$status = mysqli_real_escape_string($db_con,$_POST['status']);
		$upass = mysqli_real_escape_string($db_con,$_POST['password']);
		$level= "1";
		$upass=md5($upass);
		
		$insert="INSERT INTO admin (name,username,email,idno,phone,status, password,level) VALUES('$name','$username','$email','$idno','$phone','$status','$upass','$level')";
		$query=mysqli_query($db_con,$insert);
		if($query)
		{
			header("Location:admin-dashboard.php?admins");
		}
			else
			{
				?>
				<script>alert('Error while adding admin...');</script>
				<?php
			}
	}
	/**----------------------------
		ADDING TEACHERS
	-----------------------------**/
	if(isset($_POST['add-teacher'])){
		$name= mysqli_real_escape_string($db_con,$_POST['name']);
		$username= mysqli_real_escape_string($db_con,$_POST['username']);
		$email = mysqli_real_escape_string($db_con,$_POST['email']);
		$idno = mysqli_real_escape_string($db_con,$_POST['idno']);
		$phone= mysqli_real_escape_string($db_con,$_POST['phone']);
		$title= mysqli_real_escape_string($db_con,$_POST['title']);
		$department= mysqli_real_escape_string($db_con,$_POST['department']);
		$status ="1";
		$upass = mysqli_real_escape_string($db_con,$_POST['password']);
		$upass=md5($upass);
		
		$insert="INSERT INTO teachers (teacher_name,username,email,idno,phone,title, department,status,password)
		VALUES('$name','$username','$email','$idno','$phone','$title','$department','$status','$upass')";
		$query=mysqli_query($db_con,$insert);
		if($query)
			{
				header("Location:admin-dashboard.php?teachers");
			}
				else
				{
					?>
					<script>alert('Error while adding teacher...');</script>
					<?php
				}
	}
	
/*-----------------------------------------------------------------------------------------------------------------------------
	ADDING ONE STUDENT AT A TIME
------------------------------------------------------------------------------------------------------------------------------*/
	if(isset($_POST['add_student'])){
		$name= mysqli_real_escape_string($db_con,$_POST['student_name']);
		$regno = mysqli_real_escape_string($db_con,$_POST['regno']);
		$email = mysqli_real_escape_string($db_con,$_POST['email']);
		$phone= mysqli_real_escape_string($db_con,$_POST['phone']);
		$dob= mysqli_real_escape_string($db_con,$_POST['dob']);
		$sex= mysqli_real_escape_string($db_con,$_POST['sex']);
		$form4grade= mysqli_real_escape_string($db_con,$_POST['form4grade']);
		$program= mysqli_real_escape_string($db_con,$_POST['program']);
		$class= mysqli_real_escape_string($db_con,$_POST['class']);
		$year= mysqli_real_escape_string($db_con,$_POST['year_of_study']);
		//Set password to the student's phone number
		$upass = mysqli_real_escape_string($db_con,$_POST['phone']);
		$upass=md5($upass);
		
		$insert="INSERT INTO students (student_name,regno,email,phone,dob,sex,form4grade,program,class,year_of_study,password)
		VALUES('$name','$regno','$email','$phone','$dob','$sex','$form4grade','$program','$class','$year','$upass')";
		$query=mysqli_query($db_con,$insert);
		if($query)
			{
				echo "<script>alert('Student added successfully'); window.location.assign('admin-dashboard.php?students');</script>";
			}
			else
				{
					?>
					<script>alert('Error while adding student...');</script>
					<?php
			}
	}

/**---------------------------------------------------------------------------------------------------------------------------------------
		ADDING MASSIVE STUDENTS
--------------------------------------------------------------------------------------------------------------------------------------------*/
	if(isset($_POST["add_many_students"])){
 
		$student_excel=$_FILES["mass_students"]["tmp_name"];
 
		 if($_FILES["mass_students"]["size"] > 0)
		 {
 
		  	$file = fopen($student_excel, "r");
			$countRow=0;
	         while (($studentData = fgetcsv($file, 10000, ",")) !== FALSE)
	        {
				//use a variable to skip the first row.the variable has value 1 in the first loop, in the second loop it has value 2 hence can start picking values
				 $countRow++;
				if($countRow==1){
					continue;
				}
				else{
					
					$name=$studentData[0];
					$regno = $studentData[1];
					$email = $studentData[2];
					$phone= $studentData[3];
					$dob=$studentData[4];
					$sex= $studentData[5];
					$form4grade= $studentData[6];
					$program= mysqli_real_escape_string($db_con,$_POST['program']);
					$class= mysqli_real_escape_string($db_con,$_POST['class']);
					$year= mysqli_real_escape_string($db_con,$_POST['year_of_study']);
					$upass = $phone;
					$upass=md5($upass);
				  
					//Insert the records into the student database
					$sinsert="INSERT INTO students (student_name,regno,email,phone,dob,sex,form4grade,program,class,year_of_study,password)
					VALUES('$name','$regno','$email','$phone','$dob','$sex','$form4grade','$program','$class','$year','$upass')";
					$squery=mysqli_query($db_con,$sinsert);
					if(!$squery){
							echo"<script>alert('Import failed. Please upload a csv file');</script>";
					}
					else{
						echo "<script>alert('Students added successfully'); window.location.assign('admin-dashboard.php?students');</script>";
					}
				}
	        }
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file
	         echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
					</script>";
		 }
	}
	
/**--------------------------------------------------------------------------------------------------------------------------------------------
		ADDING CLASSES 
-------------------------------------------------------------------------------------------------------------------------------------------------**/
	if(isset($_POST['create_class'])){
		$classname= mysqli_real_escape_string($db_con,$_POST['classname']);
		$period= mysqli_real_escape_string($db_con,$_POST['period']);
		$year_admitted= mysqli_real_escape_string($db_con,$_POST['year_admitted']);
		$status="In session";
		$yr_ofstudy="1";
		if(mysqli_query($db_con,"INSERT INTO classes(classname,year_admitted,period,class_status,year_of_study) 
			VALUES ('$classname','$year_admitted','$period','$status','$yr_ofstudy')")){
			echo "<script>alert('Class added successfully'); window.location.assign('admin-dashboard.php?manage-classes');</script>";
		}else
		{
			echo "Class creation failed";
		}
	}
	
/**------------------------------------------------------------------------------------------------------------------------------------------------
		ADDING COURSES 
------------------------------------------------------------------------------------------------------------------------------------------------**/
	if(isset($_POST['add_course'])){
		$name= mysqli_real_escape_string($db_con,$_POST['course_name']);
		$department= mysqli_real_escape_string($db_con,$_POST['department']);
		if(mysqli_query($db_con,"INSERT INTO courses(course_name,department_id) VALUES ('$name','$department')")){
			echo "<script>alert('Course added successfully'); window.location.assign('admin-dashboard.php?manage-courses');</script>";
		}else
		{
			echo "<script>alert('Course adding failed');</script>";
		}
	}
/**----------------------------------------------------------------------------------------------------------------------------------------------
		ADDING DEPARTMENTS 
------------------------------------------------------------------------------------------------------------------------------------------------**/
	if(isset($_POST['add-department'])){
		$department= mysqli_real_escape_string($db_con,$_POST['name']);
		$description= mysqli_real_escape_string($db_con,$_POST['description']);
		if(mysqli_query($db_con,"INSERT INTO departments(name,description) VALUES ('$department','$description')")){
			echo "<script>alert('Department created');</script>";
			header("Location:admin-dashboard.php?manage-departments");
		}else
		{
			echo "Department creation failed";
		}
	}
/**------------------------------------------------------------------------------------------------------------------------------------------------
		ADDING ONE SUBJECT AT A TIME
-------------------------------------------------------------------------------------------------------------------------------------------------**/
	if(isset($_POST['add-subject'])){
		$subject= mysqli_real_escape_string($db_con,$_POST['subject_name']);
		$department= mysqli_real_escape_string($db_con,$_POST['department']);
		$course= mysqli_real_escape_string($db_con,$_POST['course']);
		$year= mysqli_real_escape_string($db_con,$_POST['year']);
		$sem= mysqli_real_escape_string($db_con,$_POST['semester']);
		
		if(mysqli_query($db_con,"INSERT INTO subjects(subject_name,department,course_of_study,year_of_study,semester)
			VALUES ('$subject','$department','$course','$year','$sem')")){
			echo "<script>alert('Subject added successfully'); window.location.assign('admin-dashboard.php?add-subjects');</script>";
		}else
		{
			echo "Subject addition failed.";
		}
	}
/**------------------------------------------------------------------------------------------------------------------------------------------------
		ADDING A LIST OF SUBJECTS
-------------------------------------------------------------------------------------------------------------------------------------------------**/
if(isset($_POST["add_many_subjects"])){
 
		$subjects_excel=$_FILES["list_subjects"]["tmp_name"];
		
		 if($_FILES["list_subjects"]["size"] > 0)
		 {
 
		  	$file = fopen($subjects_excel, "r");
			$countRow=0;
	         while (($studentData = fgetcsv($file, 10000, ",")) !== FALSE)
	        {
				//use a variable to skip the first row.the variable has value 1 in the first loop, in the second loop it has value 2 hence can start picking values
				 $countRow++;
				if($countRow==1){
					continue;
				}
				else{
					$subject=$studentData[0];
					$department= mysqli_real_escape_string($db_con,$_POST['department']);
					$course= mysqli_real_escape_string($db_con,$_POST['course']);
					$year= mysqli_real_escape_string($db_con,$_POST['year']);
					$sem= mysqli_real_escape_string($db_con,$_POST['semester']);
					
					if(mysqli_query($db_con,"INSERT INTO subjects(subject_name,department,course_of_study,year_of_study,semester)
						VALUES ('$subject','$department','$course','$year','$sem')")){
						echo "<script>alert('Subject added successfully'); window.location.assign('admin-dashboard.php?add-subjects');</script>";
					}else
					{
						echo "Subject addition failed.";
					}
					
				}
	        }
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel 