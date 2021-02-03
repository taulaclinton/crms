<?php
/*----------------------
1. BASE URL
2. DATABASE
3. SETTTINGS
--------------------*/

/** SET THE BASE URL **/
define('BASE_URL','srms/');

/*-----------------------------------
	DATABASE CONFIGURATIONS
-------------------------------------*/
	/** Name of the school results management system database **/ 
	define('DB_NAME','crms');
	/** MYSQLI database host**/ 
	define('DB_HOST','localhost');
	/** MYSQLI database username**/ 
	define('DB_USER','root');
	/** MYSQLI database password**/ 
	define('DB_PASSWORD','');
	/** Database Charset to use in creating database tables. */
	define('DB_CHARSET', 'utf8');
	
	$db_con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD);
	$db_select=mysqli_select_db($db_con,DB_NAME);
	if(!$db_con)
	{
		die('oops connection problem ! --> '.mysqli_error());
	}
	if(!$db_select)
	{
		die('oops database selection problem ! --> '.mysqli_error());
	}

/*--------------------------------------------
	SYSTEM SETTINGS
---------------------------------------------*/
/* Fetching system name **/
	$system_name_array=mysqli_fetch_array(mysqli_query($db_con,"SELECT description FROM settings WHERE setting_name='system name'"));
	$system_name=$system_name_array['description'];
	
/* Fetching system name for phones and tablets and sm**/
	$system_array=mysqli_fetch_array(mysqli_query($db_con,"SELECT description FROM settings WHERE setting_name='system'"));
	$system=$system_array['description'];
	
/* Getting the college name from database**/
	$college_name_array=mysqli_fetch_array(mysqli_query($db_con,"SELECT description FROM settings WHERE setting_name='college name'"));
	$college_name=$college_name_array['description'];
	
/* Getting the college name for phones and tablets from database**/
	$college_array=mysqli_fetch_array(mysqli_query($db_con,"SELECT description FROM settings WHERE setting_name='college'"));
	$college=$college_array['description'];

/* Getting the slogan from database**/
	$slogan_array=mysqli_fetch_array(mysqli_query($db_con,"SELECT description FROM settings WHERE setting_name='slogan'"));
	$slogan=$slogan_array['description'];

?>