<?php 
	$username="root";
	$password="kanishk";
	$servername="localhost";
	$connection = mysqli_connect("sql12.freemysqlhosting.net:3306","sql12206252","qDhsLVHUV4","sql12206252");
	$select_db=mysqli_select_db($connection,"sql12206252");
	$db_error="";
	if(!$connection||!$select_db){
		$db_error="Cannot connect to DB";
		die($db_error);
	}
	
?>