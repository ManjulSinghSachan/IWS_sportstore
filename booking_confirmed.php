<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        Sportskart
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

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">



</head>

<body>
 <?php require 'navbar.php';?>
 <?php 
	$user_id="";$product_id="";$category_id="";$price=0;$quantity=1;$msg="";
	if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
		$user_id=$_SESSION['user_id'];
	
	if(!empty($user_id)){
		$query="SELECT * from cartpage where user_id='$user_id';";
		if($ret=mysqli_query($connection,$query)){
			$num_rows=mysqli_num_rows($ret);
			if($num_rows>0){
				while($data=mysqli_fetch_array($ret)){
					$product_id.=$data['product_id'].',';
					$price+=$data['price']*$data['quantity'];
				}
			}
		}
	}
	//echo $price;
	//echo $product_id;
	if($price>0){
		$query="INSERT INTO orders (user_id,total_price,products) VALUES ('$user_id','$price','$product_id');";
		if($result=mysqli_query($connection,$query))
			$msg="OK";
		else
			$msg="Bad query";
		$query="DELETE FROM cartpage WHERE user_id='$user_id';";
		$result=mysqli_query($connection,$query);
	}
 
 ?>
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="home.php">Home</a>
                        </li>
                        <li>About Us</li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <!-- *** PAGES MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Pages</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li>
                                    <a href="aboutus.php">About Us</a>
                                </li>
                                <li>
                                    <a href="contact.php">Contact Us</a>
                                </li>
                             
                            </ul>

                        </div>
                    </div>

                    <!-- *** PAGES MENU END *** -->


                    <div class="banner">
                        <a href="#">
                            <img src="img/banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
                </div>

                <div class="col-md-9">

                    <div class="box" id="text-page">
                        <h1>SPORTSKART</h1>

                        <p class="lead">Your order has been placed</p>

                        

                    
                    </div>


                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


    </div>
    <!-- /#all -->



       <?php require 'footer.php';?>
    

    



</body>

</html>