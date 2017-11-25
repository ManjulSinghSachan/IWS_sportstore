
<?php

    require 'core_file.php';
    $name = $_POST['name'];
	
	$return_value=logged_in();
	if($return_value)
		$user_id =  $_SESSION['user_id'];

    echo $name;
    $connect = mysqli_connect("sql12.freemysqlhosting.net:3306","sql12206252","qDhsLVHUV4","sql12206252");

    $sql = "DELETE FROM cartpage WHERE product_id=$name AND user_id='$user_id'";
    mysqli_query($connect, $sql);

 ?>
