<<<<<<< b4bc6392ea8e3c5a913ec907945fdb7ef67ecde9
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
=======
<?php
	require 'core_file.php';
	
	
	$return_value = logged_in();
	echo $return_value;
	if($return_value)
		//header("Location:home.php");
		echo $_SESSION['user_id'];
	else
		echo 'Not logged in';
		//include 'home.php';
>>>>>>> recommendation
?>	