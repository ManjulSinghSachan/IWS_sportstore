<<<<<<< b4bc6392ea8e3c5a913ec907945fdb7ef67ecde9
<?php 
	$username="root";
	$password="";
	$servername="localhost";
	$connection= mysql_connect($servername,$username,$password);
	$select_db=mysql_select_db('sportskart');
	$db_error="";
	if(!$connection||!$select_db){
		$db_error="Cannot connect to DB";
		die($db_error);
	}
	
=======
<?php 
	$username="root";
	$password="";
	$servername="localhost";
	$connection= mysql_connect($servername,$username,$password);
	$select_db=mysql_select_db('sportskart');
	$db_error="";
	if(!$connection||!$select_db){
		$db_error="Cannot connect to DB";
		die($db_error);
	}
	
>>>>>>> recommendation
?>