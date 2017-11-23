
<?php

    require 'core_file.php';
    $str = $_POST['id'];
    $arr = explode(',',$str);

    $connect = mysqli_connect("sql12.freemysqlhosting.net:3306","sql12206252","qDhsLVHUV4","sql12206252");
    
    $id = intval($arr[0]);
	$op = $arr[1];

	if($op == "plus")
		$sql = "UPDATE cartpage SET quantity=quantity+1 WHERE product_id='$id';";
	else
		$sql = "UPDATE cartpage SET quantity=quantity-1 WHERE product_id='$id';";
   // echo $sql;
	//echo $op;
	if($ret=mysqli_query($connect, $sql))
		echo "Updated Successfully";
	else
		echo "Cannot Update. Try Again Later.";

 ?>
