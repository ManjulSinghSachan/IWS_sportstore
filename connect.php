<?php 
	$username="sql12206252";
	$password="qDhsLVHUV4";
	$servername="sql12.freemysqlhosting.net:3306";
	$connection= mysql_connect($servername,$username,$password);
	$select_db=mysql_select_db('sportskart');
	$db_error="";
	if(!$connection||!$select_db){
		$db_error="Cannot connect to DB";
		die($db_error);
	}
	
?>