<?php
	
	require 'core_file.php';
	setcookie('autosportskart','',time()-3600,'/');
	unset($_SESSION['user_id']);
	session_unset();
	//echo "unset";
	//session_destroy();
	//echo $_SESSION['user_id'];
	header("Location:home.php");
?>