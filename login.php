<<<<<<< b4bc6392ea8e3c5a913ec907945fdb7ef67ecde9
<?php
require 'connect.php';
require 'core_file.php';
$error="";
if(isset($_POST['email'])&&isset($_POST['pwd'])){
		$log_in_email=$_POST['email'];
		$log_in_pwd=$_POST['pwd'];
		//echo $log_in_email;
		//echo $log_in_pwd;
		$query_new="SELECT user_id FROM login WHERE email='".mysql_real_escape_string($log_in_email)."' AND pwd='".mysql_real_escape_string($log_in_pwd)."'";
		if($ret_new=mysql_query($query_new)){
			$debug= "Query Executed";
			//echo $ret_new;
			$num_rows=mysql_num_rows($ret_new);
			if($num_rows==0)
				$error= "Invalid UserName/Password combination";
			else{
				//echo "ID grabbed";
				$user_id=mysql_result($ret_new,0,'user_id');
				//echo $user_id;
				$_SESSION["user_id"]=$user_id;
			//	echo "SESSION ID".$_SESSION['user_id'];
				header("Location:home.php");
			}
		}
		
		
	
	}


=======
<?php
require 'connect.php';
require 'core_file.php';
$error="";
if(isset($_POST['email'])&&isset($_POST['pwd'])){
		$log_in_email=$_POST['email'];
		$log_in_pwd=$_POST['pwd'];
		//echo $log_in_email;
		//echo $log_in_pwd;
		$query_new="SELECT user_id FROM login WHERE name='".mysql_real_escape_string($log_in_email)."' AND pwd='".mysql_real_escape_string($log_in_pwd)."'";
		echo $query_new;
		if($ret_new=mysql_query($query_new)){
			$debug= "Query Executed";
			echo $ret_new;
			$num_rows = mysql_num_rows($ret_new);
			if($num_rows==0)
				echo "Invalid UserName/Password combination";
				
			else{
				//echo "ID grabbed";
				$user_id = mysql_result($ret_new,0,'user_id');
				//echo $user_id;
				$_SESSION["user_id"] = $user_id;
			//	echo "SESSION ID".$_SESSION['user_id'];
				header("Location:home.php");
			}
		}
		
		
	
	}


>>>>>>> recommendation
?>