<?php
require 'connect.php';
require 'core_file.php';
$error="";
$count=0;

	if(isset($_POST['email'])&&isset($_POST['pwd'])){
		$log_in_email=$_POST['email'];
		$log_in_pwd=$_POST['pwd'];
		//echo $log_in_email;
		echo $log_in_pwd;
		$query_new="SELECT user_id FROM login WHERE email='".mysqli_real_escape_string($connection,$log_in_email)."' AND pwd='".mysqli_real_escape_string($connection,$log_in_pwd)."'";
		if($ret_new=mysqli_query($connection,$query_new)){
			$debug= "Query Executed";
			//echo $ret_new;
			echo "here";
			$num_rows=mysqli_num_rows($ret_new);
			if($num_rows==0)
				$error= "Invalid UserName/Password combination";
			else{
				echo "ID grabbed";
				$row=mysqli_fetch_assoc($ret_new);
				$user_id=$row['user_id'];
				echo $user_id;
				$cookie_name='autosportskart';
				$cookie_value=md5($log_in_email);
				//header("Location:home.php");
				$q="UPDATE login SET sessionkey='".$cookie_value."' WHERE user_id='".$user_id."';";
				if($r=mysqli_query($connection,$q)){
					echo "updated";
					setcookie($cookie_name,$cookie_value,time()+(86400*30),"/");
					$_SESSION["user_id"]=$user_id;
					if(isset($_GET['location']))
						$location=htmlspecialchars($_GET['location']);
					else
						$location='home.php';
					header("Location:".$location);
				}
				else{
					echo "cannot execute";
				}
			}
		}
	}



?>
