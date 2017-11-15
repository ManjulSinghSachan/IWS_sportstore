<?php
	require 'core_file.php';
	require 'session.php';
	if(logged_in())
		header("Location:basket.php");
	else
		header("Location:register.php");
?>