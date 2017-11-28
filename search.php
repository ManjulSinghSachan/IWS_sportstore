
<?php

if(isset($_GET['search_field'])){
	$search_field=$_GET['search_field'];
}
if(!empty($search_field)){
		
		$connect = mysqli_connect("sql12.freemysqlhosting.net:3306","sql12206252","qDhsLVHUV4","sql12206252");
		
		if(!(mysqli_connect_errno())){
			
			
			$search_field=str_replace(' ','_',$search_field);
			$query="SELECT category_name FROM categories WHERE category_name LIKE '%".mysqli_real_escape_string($connect, $search_field)."%'";
			
			if(!($query_run=mysqli_query($connect,$query))){
				echo "Bad query";
			}
			
			while($query_result=mysqli_fetch_assoc($query_run)){
				$name=$query_result['category_name'];
				$newname=str_replace('_',' ',$name);
				echo '<a href="search_result_page.php?category_name='.$name.'">'.$newname.'</a><br>';
			
				
			}
	}	
	
	
}


?>