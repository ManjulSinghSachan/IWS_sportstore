<?php
	require 'connect.php';
	$cookiebool;
	if(isset($_COOKIE['autosportskart'])){
		$hash=$_COOKIE['autosportskart'];
		$cookiebool=true;
		$query="SELECT user_id FROM login where sessionkey='".$hash."';";
		if($res=mysqli_query($connection,$query)){
			$num=mysqli_num_rows($res);
			if($num==1){
				$row=mysqli_fetch_assoc($res);
				$_SESSION['user_id']=$row['user_id'];

			}
		}
	}
	else{
		$cookiebool=false;
		
	}

	

?>
