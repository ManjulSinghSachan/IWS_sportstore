<<<<<<< b4bc6392ea8e3c5a913ec907945fdb7ef67ecde9
<?php
	require 'core_file.php';
	require 'session.php';
	if(logged_in())
		header("Location:basket.php");
	else
		header("Location:register.php");
=======
<?php
	require 'core_file.php';
	require 'session.php';
	if(logged_in())
		header("Location:basket.php");
	else
		header("Location:register.php");
>>>>>>> recommendation
?>