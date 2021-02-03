

<?php
	/* The UPLOAD SCRIPT....*/
	if(isset($_POST['upload_student_photo']) && isset($_GET['upload_id'])){
		$student_id=$_GET['upload_id'];
		//Set the directory within which the file will be saved. 
		$target_dir = "../uploads/student/";
		//Set the file to be rename to the idno of the student and jpg extension
		$filename=$student_id.".png";
		//$target_file specifies the path or the filename by which the file will be saved in the directory.
		$target_file = $target_dir . basename($filename);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		
		// Check if image file is a actual image or fake image
			$check = getimagesize($_FILES["student_photo"]["tmp_name"]);
			if($check !== false) {
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		// Check if file already exists
		if (file_exists($target_file)) {
			unlink($target_file);
			$uploadOk = 1;
		}
		 // Check file size
		if ($_FILES["student_photo"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		 }
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["student_photo"]["tmp_name"], $target_file)) {
				header("Location:../admin/admin-dashboard.php?student-portal=$student_id");
			}
			else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
	}
?>