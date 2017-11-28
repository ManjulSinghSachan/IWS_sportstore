
<?php 
	$username="sql12206252";
	$password="qDhsLVHUV4";
	$servername="sql12.freemysqlhosting.net:3306";
	$connection= mysqli_connect($servername,$username,$password,'sql12206252');
	$select_db=mysqli_select_db($connection, 'sql12206252');
	$db_error="";
	if(!$connection||!$select_db){
		$db_error="Cannot connect to DB";
		die($db_error);
	}
	

?>