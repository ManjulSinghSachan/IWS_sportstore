<?php
	//require 'core_file.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">

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

    <link href="css/custom.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">

		<script>
				  $(document).ready(function() {
							$(".addToKart").click(function() {
								//alert("d");
								var s = $(this).attr('id');

								//alert(s);

								$.ajax({
				        type: "POST",
				        url: "addtocart.php",
				        data: { name: s }
				        }).done(function(msg) {
				          //alert("Product added to Kart Successfully!");
						  //alert(msg);
						  if(msg=="OK")
							alert("Successfully Added to Kart! Checkout the Kart Page!")
							else
								alert(msg);
				        });
						

				      });
					});

		</script>




</head>

<body>
	<?php require 'navbar.php';?>
	<?php 
			$category_name="";
			if(isset($_GET['category_name'])&&!empty($_GET['category_name'])){
				$category_name=$_GET['category_name']."%";
			}
			else if(isset($_GET['search_field'])&&!empty($_GET['search_field'])){
				$category_name=$_GET['search_field'];
				$category_name=str_replace(' ','%',$category_name);
				$category_name="%".$category_name."%";
			}
			else
				$category_name="NIL";
			$category_name_display=str_replace('_',' ',$category_name);
			$category_name_display=str_replace('%',' ',$category_name_display);
	?>
	<div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="home.php">Home</a>
                        </li>
                        <li><?php echo $category_name_display?></li>
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
                                    <a href="search_result_page.php?category_name=men">Men </a>
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
                                <li class="active">
                                    <a href="search_result_page?category_name=women">Ladies </a>
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
			</div>

				<?php

						$query= "SELECT categories.category_id, products.product_id,products.category_id,products.product_name,products.price,products.photo from categories,products WHERE categories.category_name LIKE '".mysqli_real_escape_string($connection,$category_name)."' AND products.category_id=categories.category_id;";
						if($ret=mysqli_query($connection,$query)){
							$msg="Query executed";
							$num_rows=mysqli_num_rows($ret);
							//echo $num_rows;
							if($num_rows>0){
								while($data=mysqli_fetch_array($ret)){
									// product ID
									$id = $data['product_id'];
									// product name
									$name = $data['product_name'];
									// price
									$price = $data['price'];
									// photo
									$photo = $data['photo'];

				?>
				 <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="product_detail.php?product_id=<?php echo $id?>">
                                                <img src="<?php echo $photo?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="product_detail.php?product_id=<?php echo $id?>">
                                                <img src="<?php echo $photo?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="product_detail.php?product_id=<?php echo $id?>" class="invisible">
                                    <img src="<?php echo $photo?>" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="product_detail.php?product_id=<?php echo $id?>"><?php echo $name?></a></h3>
                                    <p class="price">Rs.<?php echo $price?></p>
                                    <p class="buttons">
                                        <a href="product_detail.php?product_id=<?php echo $id?>" class="btn btn-default">View detail</a>
                                        <a id="<?php echo $id?>" class="btn btn-primary addToKart"><i id="<?php echo $id?>" class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>

                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                    </div>
				<?php
								}
							}
							else{
									echo "No product found in this category!";
							}
						}
						else{
							echo "Bad Query";
						}
						$_GET['search_field']="";
					

				?>


			</div>
		</div>
	</div>
</div>

	<?php require 'footer.php';?>
</body>
</html>
