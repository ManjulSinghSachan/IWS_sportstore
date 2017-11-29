
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="sportskart">
	<meta name="description" content="SportsKart">
    
    <!-- Google Analytics -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-110427452-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-110427452-1');
    </script>
    <!-- -->


    <title>
        SportsKart : e-commerce website
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

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">



</head>

<body>
	<?php require 'navbar.php';?>
	<?php require 'location.php';?>
	
	
	<div id="all">

        <div id="content">

            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider">
                        <div class="item">
                            <img class="img-responsive" src="img/main-slider1.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/main-slider2.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/main-slider3.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/main-slider4.jpg" alt="">
                        </div>
                    </div>
                    <!-- /#main-slider -->
                </div>
            </div>

            <!-- *** ADVANTAGES HOMEPAGE ***
 _________________________________________________________ -->
            <div id="advantages">

                <div class="container">
                    <div class="same-height-row">
                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-heart"></i>
                                </div>

                                <h3><a href="#">We love our customers</a></h3>
                                <p>We are known to provide best possible service ever</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-tags"></i>
                                </div>

                                <h3><a href="#">Best prices</a></h3>
                                <p>Get quality products at the lowest prices.</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-thumbs-up"></i>
                                </div>

                                <h3><a href="#">100% satisfaction guaranteed</a></h3>
                                <p>Free returns on everything for 3 months.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container -->

            </div>
            <!-- /#advantages -->

            <!-- *** ADVANTAGES END *** -->

            <!-- *** HOT PRODUCT SLIDESHOW ***
 _________________________________________________________ -->
            <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Hot this week</h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="product-slider">
				<?php	
					
                    $query="SELECT p_ids FROM geolocation WHERE region='".$country."';";
					$result=mysqli_query($connection,$query);
					if(mysqli_num_rows($result)==1){
					$data=mysqli_fetch_assoc($result);
					 $str=$data['p_ids'];
					$str='(' .$str . ')';
					
					$q="SELECT products.product_id, products.category_id, products.product_name, products.price, products.photo FROM products WHERE products.product_id IN ".$str.";";
					$r=mysqli_query($connection,$q);
					$num_rows = mysqli_num_rows($r);
					
					if($num_rows > 0){
						while($d=mysqli_fetch_assoc($r)){
							//Product ID
							$id = $d['product_id'];
							//Product Name
							$name = $d['product_name'];
							//Product Price
							$price = $d['price'];
							//Product Photo
							$photo = $d['photo'];
				?>
				<div class="item">
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
									</div>
									<!-- /.text -->
								</div>
								<!-- /.product -->
				</div>
				<?php 
					}
			}
		}
	
	?>

                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="product_detail.php?product_id=6">
                                                <img src="spm/51qOCzsfrbL._AC_US200_.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="product_detail.php?product_id=6">
                                                <img src="spm/51qOCzsfrbL._AC_US200_.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="product_detail.php?product_id=6" class="invisible">
                                    <img src="img/product1.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="product_detail.php?product_id=6">Nautica Men's Anchor Solid Navy Trunks Shorts</a></h3>
                                    <p class="price">Rs.390.00</p>
                                </div>
                                <!-- /.text -->

                                
                            </div>
                            <!-- /.product -->
                        </div>
                        <!-- /.col-md-4 -->

                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="product_detail.php?product_id=7">
                                                <img src="spm/41Lm4csvNPL._AC_US160_.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="product_detail.php?product_id=7">
                                                <img src="spm/41Lm4csvNPL._AC_US160_.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="product_detail.php?product_id=7" class="invisible">
                                    <img src="img/product2.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="product_detail.php?product_id=7">Jazba Men's SKYDRIVE 110 PU Mesh KPU Cricket Shoes</a></h3>
                                    <p class="price"><del>Rs.750</del> Rs.590.00</p>
                                </div>
                                <!-- /.text -->

                               
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="product_detail.php?product_id=8">
                                                <img src="spm/416S7ClnklL._AC_US160_.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="product_detail.php?product_id=8">
                                                <img src="spm/416S7ClnklL._AC_US160_.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="product_detail.php?product_id=8" class="invisible">
                                    <img src="img/product3.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="product_detail.php?product_id=8">CW Cricket Kit With Accessories Senior Size</a></h3>
                                    <p class="price">Rs.1800.00</p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                    </div>
                    <!-- /.product-slider -->
                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->

            <!-- *** HOT END *** -->

        </div>
        <!-- /#content -->
		<?php require 'footer.php';?>
</body>
</html>
