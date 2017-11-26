<?php
	
	require 'core_file.php';
	setcookie('autosportskart',NULL,time()-60*60);
	session_destroy();
	header("Location:home.php");
?>