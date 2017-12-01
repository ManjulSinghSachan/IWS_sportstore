<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SportsKart">

    <title>
        SportsKart
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">
	
	<script>
				  $(document).ready(function() {
							$(".addToKart").click(function() {
								//alert("d");
								var s = $(this).attr('id');
						//		alert(s);
								$.ajax({
				        type: "POST",
				        url: "addtocart.php",
				        data: { name: s }
				        }).done(function(msg) {
				          //alert("Product added to Kart Successfully!");
						  if(msg=="OK")
							  alert("Product Added to Kart! Checkout the Kart Page!")
						  else
							alert(msg);
				        });
				      });
					
					  $(".addToKart2").click(function() {
								//alert("d");
								var s = $(this).attr('id');
								//alert(s);
								$.ajax({
				        type: "POST",
				        url: "addtocart.php",
				        data: { name: s }
				        }).done(function(strtemp='') {
                            window.location.replace("basket.php");
                            
				        });
							
				      });
                  });	  
					  
					
		</script>



</head>



<body>
	<?php require 'navbar.php';?>

   <!-- *** TOPBAR ***
 _________<?php
						if(!empty($_GET['product_id']))
						$productID=$_GET["product_id"];
	
	
	$connect = mysqli_connect("sql12.freemysqlhosting.net:3306","sql12206252","qDhsLVHUV4","sql12206252");
	
	$sql = "SELECT * FROM products WHERE product_id='$productID';";
	$ret=mysqli_query($connect ,$sql);
	$data = mysqli_fetch_array($ret);
									// product ID
									$id = $data['product_id'];
									// product name
									$name = $data['product_name'];
									// price
									$price = $data['price'];
									// photo
									$photo = $data['photo'];
									// detail
									$detail = $data['detail'];
									//category
									$category_id = $data['category_id'];
									
									
				//retrieve data for breadcrumb
				$sql2 = "SELECT category_name FROM categories where category_id = '$category_id';";
				//echo $sql2;
				$ret2=mysqli_query($connect, $sql2);
				$data2 = mysqli_fetch_array($ret2);
				$arr = explode('_',$data2[0]);
				
				//Recommendation
				
				$product_data;
				$debug;
				if(logged_in()){
					$user_id = $_SESSION['user_id'];
					$query = "SELECT* FROM login where user_id = '$user_id';";
					$ret = mysqli_query($connect, $query);
					$product_data = mysqli_fetch_array($ret)[5];
					$array = explode(',',$product_data);
					$search =array_search((string)$id,$array); 
					
					if($search > -1){
						$temp = $array[(int)$search];
						$end = ((int)$search)+1;
						for($i=0;$i<$end;$i++){
							$t = $array[$i];
							$array[$i] = $temp;
							$temp = $t;
						}
					}
					else{
						$temp = (string)$id;
						$end = (int)sizeof($array);
						if($end < 5)
							array_push($array,$temp);
						else{
							for($i=0;$i<$end;$i++){
								$t = $array[$i];
								$array[$i] = $temp;
								$temp = $t;
							}
							
						}
						
					}
					
					
                    //store in database
                    echo "<div>$product_data</div>";
                    $product_data = implode(",",$array);
                    if(strcmp(substr($product_data,0,1),',') == 0)
                        $product_data = substr($product_data,1);
                    echo "<div>$product_data</div>";
					$sql = "UPDATE login SET products_viewed = '$product_data' WHERE user_id = '$user_id';";
					mysqli_query($connect, $sql);
				}
				?>
				________________________________________________ -->
   
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="home.php">Home</a>
                        </li>
                        <li><a href="search_result_page.php?category_name=<?php echo $arr[0]?>"><?php echo $arr[0]?></a>
                        </li>
						<li><a href="search_result_page.php?category_name=<?php echo $arr[0]."_".$arr[1]?>"><?php echo $arr[1]?></a>
                        </li>
                        <li><a href="search_result_page.php?category_name=<?php echo $data2[0]?>"><?php echo $arr[2]?></a>
                        </li>
                        <li><?php echo $name ?></li>
						<!-- 
                        <li><?php echo $product_data?></li> -->
						
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li>
                                    <a href="search_result_page.php?category_name=men">Men</a>
                                    <ul>
                                        <li><a href="search_result_page.php?category_name=men_football">Football</a>
                                        </li>
                                        <li><a href="search_result_page.php?category_name=men_basketball">Basketball</a>
                                        </li>
                                        <li><a href="search_result_page.php?category_name=men_tennis">Tennis</a>
                                        </li>
                                        <li><a href="search_result_page.php?category_name=men_cricket">Cricket</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="search_result_page.php?category_name=women">Ladies</a>
                                    <ul>
                                         <li><a href="search_result_page.php?category_name=women_football">Football</a>
                                        </li>
                                        <li><a href="search_result_page.php?category_name=women_basketball">Basketball</a>
                                        </li>
                                        <li><a href="search_result_page.php?category_name=women_tennis">Tennis</a>
                                        </li>
                                        <li><a href="search_result_page.php?category_name=women_cricket">Cricket</a>
                                        </li>
                                    </ul>
                                </li>
                                

                            </ul>

                        </div>
                    </div>

                   
                   
                    <div class="banner">
                            <img src="img/banner.jpg" alt="sales 2014" class="img-responsive">
                    </div>
                </div>

                <div class="col-md-9">

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                <img src="<?php echo $photo?>" alt="" class="img-responsive">
                            </div>

                            

                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <h1 class="text-center"><?php echo $name?></h1>
                                <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material & care and sizing</a>
                                </p>
                                <p class="price"><?php echo "Rs.".$price;?></p>

                                <p class="text-center buttons">
                                    <a id="<?php echo $id?>" class="btn btn-primary addToKart"><i class="fa fa-shopping-cart"></i> Add to cart</a> 
                                    <a id="<?php echo $id?>" class="btn btn-default addToKart2"><i class="fa fa-heart"></i> Buy Now</a>
                                </p>


                            </div>

                            <div class="row" id="thumbs">
                                <div class="col-xs-4">
                                    <a href="<?php echo $photo;?>" class="thumb">
                                        <img src="<?php echo $photo?>" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <div class="col-xs-4">
                                    <a href="<?php echo $photo;?>" class="thumb">
                                        <img src="<?php echo $photo?>" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <div class="col-xs-4">
                                    <a href="<?php echo $photo;?>" class="thumb">
                                        <img src="<?php echo $photo?>" alt="" class="img-responsive">
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="box" id="details">
                        <p>
                            <h4>Product details</h4>
                            <p><?php echo $detail?></p>
                            <h4>Material & care</h4>
                            <ul>
                                <li>Polyester</li>
                                <li>Machine wash</li>
                            </ul>
                            <h4>Size & Fit</h4>
                            <ul>
                                <li>Regular fit</li>
                            </ul>

                          
                            <hr>
                            <div class="social">
                                <h4>Show it to your friends</h4>
                                <p>
                                    <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                                </p>
                            </div>
                    </div>
				</div>
			</div>
		</div>
	</div>


   <?php require 'footer.php';?>
 
</body>
</html>





</body>
