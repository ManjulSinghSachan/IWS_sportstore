
<?php

    require 'core_file.php';
	$user_id="";
	if(isset($_SESSION['user_id']))
		$user_id=$_SESSION['user_id'];
    $id = intval($_POST['name']);

    $connect = mysqli_connect("localhost","root","kanishk","sportskart");

    $query = "SELECT * FROM products WHERE product_id='$id'";
    $result = mysqli_query($connect, $query);

    $row = mysqli_fetch_array($result);
	$product_id=$row['product_id'];
	$category_id=$row['category_id'];
	$product_name=$row['product_name'];
	$product_name=addslashes($product_name);
	$price=$row['price'];
	$photo=$row['photo'];
	$photo=addslashes($photo);
	$quantity=1;
	if(!empty($user_id)){
		$q = "SELECT* FROM cartpage where product_id='$product_id';";
		if($result = mysqli_query($connect,$q)){
			$num_rows=mysqli_num_rows($result);
			if($num_rows>0){
				$data=mysqli_fetch_array($result);
				$quantity=$data['quantity']+1;
			
				$q = "UPDATE cartpage SET quantity = '$quantity' WHERE product_id = '$product_id'";
			}
			else{
				$q = "INSERT INTO cartpage VALUES ('$product_id','$category_id','$product_name','$quantity','$price','$photo','$user_id',CURRENT_TIMESTAMP);";
			}
				
			
		}

	
    
	//	echo $q;
	
		if($result = mysqli_query($connect,$q)){
			echo "OK";
		}
		else
			echo "Cannot add to Kart. Try Again.";
	}
	else{
		echo "Please login first to add items to cart.";
	}
	/*$query="SELECT * FROM cartspage";
	$ret=mysqli_query($connect,$query);
	$num_row=mysqli_num_rows($ret);
	echo $num_row;*/
	mysqli_close($connect);

 ?>
