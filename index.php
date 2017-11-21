
<?php

	

	require 'core_file.php';
	
	
	$return_value=logged_in();
	echo $return_value;
	if($return_value)
		//header("Location:home.php");
		echo $_SESSION['user_id'];
	else
		echo 'Not logged in';
		//include 'home.php';
?>
