
<?php
require 'connect.php';
require 'cookies.php';
require 'session.php';

if(!logged_in()){
	include 'login.php';
}
?>

<script type="text/javascript">
	function search_function(){

			if(window.XMLHttpRequest)
				var xmlHttp= new XMLHttpRequest();
			else
				var xmlHttp= new ActiveXObject('Microsoft.XMLHTTP');

			xmlHttp.onreadystatechange=function(){
				if(xmlHttp.readyState==4 && xmlHttp.status==200){

					document.getElementById('result').innerHTML=xmlHttp.responseText;
				}
			}
			//alert(document.getElementById("search_field").value);
			xmlHttp.open('GET','search.php?search_field='+document.getElementById("search_field").value,true);
			xmlHttp.send();
		}
	function logout(value){
		//alert(value);
		var link=document.getElementById('loginlink');

		if(value==1){
			link.setAttribute('data-target','');
			window.location.href="logout.php";
		}
		else{
			link.setAttribute('data-target','#login-modal');
		}
	}

</script>


<div id="top" style="position:relative">
        <div class="container">
            <div class="col-md-6 offer" data-animate="fadeInDown">
                <a href="#" class="btn btn-success btn-sm">Offer of the day</a>  <a href="#">Get flat 25% off on items over Rs.500!</a>
            </div>
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
					<?php if(logged_in())
							$val=1;
						else
							$val=0;
					?>
                    <li onclick="logout('<?php echo $val?>')"><a id= "loginlink" href="#" data-toggle="modal" data-target="#login-modal"><?php if(logged_in())
										$log_str="Log Out?";
									else
										$log_str="Login";
								echo $log_str?>
						</a>
                    </li>
                    <?php
                        if($val == 0)
                            echo "<li><a href=\"register.php\">Register</a></li>";
                    ?>
                    
                    <li><a href="contact.php">Contact</a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="login.php?location=<?php echo urlencode($_SERVER['REQUEST_URI'])?>" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email-modal" placeholder="email" name="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password-modal" placeholder="password" name="pwd">
                            </div>
							<p style="color:red"><?php echo $error?></p>
                            <p class="text-center">
                                <button class="btn btn-primary" name="log_in_btn"><i class="fa fa-sign-in"></i>
										Log in</button>
                            </p>

                        </form>

												<p class="text-center"><a href="customer-account.php">Forgot password?</a></p>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="register.php"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="home.php">
                    <img src="img/logo.png" alt="SportsKart logo" class="hidden-xs">
                    <img src="img/logo-small.png" alt="SportsKart logo" class="visible-xs"><span class="sr-only">SportKart - go to homepage</span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                    <a class="btn btn-default navbar-toggle" href="check_login.php">
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">Cart</span>
                    </a>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="home.php">Home</a>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Men <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>Football</h5>
                                            <ul>
                                                <li><a href="search_result_page.php?category_name=men_football_t-shirts">T-Shirts</a>
                                                </li>
                                                <li><a href="search_result_page.php?category_name=men_football_shorts">Shorts</a>
                                                </li>
                                                <li><a href="search_result_page.php?category_name=men_football_shoes">Shoes</a>
                                                </li>
                                                <li><a href="search_result_page.php?category_name=men_football_accessories">Accessories</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Basketball</h5>
                                            <ul>
                                                <li><a href="search_result_page.php?category_name=men_basketball_t-shirts">T-Shirts</a>
                                                </li>
                                                <li><a href="search_result_page.php?category_name=men_basketball_shorts">Shorts</a>
                                                </li>
                                                <li><a href="search_result_page.php?category_name=men_basketball_shoes">Shoes</a>
                                                </li>
                                                <li><a href="search_result_page.php?category_name=men_basketball_accessories">Accessories</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Tennis</h5>
                                            <ul>
                                                <li><a href="search_result_page.php?category_name=men_tennis_t-shirts">T-Shirts</a>
                                                </li>
                                                <li><a href="search_result_page.php?category_name=men_tennis_shorts">Shorts</a>
                                                </li>
                                                <li><a href="search_result_page.php?category_name=men_tennis_shoes">Shoes</a>
                                                </li>
                                                <li><a href="search_result_page.php?category_name=men_tennis_accessories">Accessories</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">

                                            <h5>Cricket</h5>
                                            <ul>
                                                <li><a href="search_result_page.php?category_name=men_cricket_t-shirts">T-Shirts</a>
                                                </li>
                                                <li><a href="search_result_page.php?category_name=men_cricket_shorts">Shorts</a>
                                                </li>
                                                <li><a href="search_result_page.php?category_name=men_cricket_shoes">Shoes</a>
                                                </li>
                                                <li><a href="search_result_page.php?category_name=men_cricket_accessories">Accessories</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>
					 <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Women <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>Football</h5>
                                            <ul>
                                                <li><a href="search_result_page.php?category_name=women_football_t-shirts">T-Shirts</a>
                                                </li>
                                                <li><a href="search_result_page.php?category_name=women_football_shorts">Shorts</a>
                                                </li>
                                                <li><a href="search_result_page.php?category_name=women_football_shoes">Shoes</a>
                                                </li>
                                                <li><a href="search_result_page.php?category_name=women_football_accessories">Accessories</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Basketball</h5>
                                            <ul>
                                                <li><a href="search_result_page.php?category_name=women_basketball_t-shirts">T-Shirts</a>
                                                </li>
                                                <li><a href="search_result_page.php?category_name=women_basketball_shorts">Shorts</a>
                                                </li>
                                                <li><a href="search_result_page.php?category_name=women_basketball_shoes">Shoes</a>
                                                </li>
                                                <li><a href="search_result_page.php?category_name=women_basketball_accessories">Accessories</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Tennis</h5>
                                            <ul>
                                                <li><a href="search_result_page.php?category_name=women_tennis_t-shirts">T-Shirts</a>
                                                </li>
                                                <li><a href="search_result_page.php?category_name=women_tennis_shorts">Shorts</a>
                                                </li>
                                                <li><a href="search_result_page.php?category_name=women_tennis_shoes">Shoes</a>
                                                </li>
                                                <li><a href="search_result_page.php?category_name=women_tennis_accessories">Accessories</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">

                                            <h5>Cricket</h5>
                                            <ul>
                                                <li><a href="search_result_page.php?category_name=women_cricket_t-shirts">T-Shirts</a>
                                                </li>
                                                <li><a href="search_result_page.php?category_name=women_cricket_shorts">Shorts</a>
                                                </li>
                                                <li><a href="search_result_page.php?category_name=women_cricket_shoes">Shoes</a>
                                                </li>
                                                <li><a href="search_result_page.php?category_name=women_cricket_accessories">Accessories</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>

                    <!-- <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">More Options <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                       <!-- <div class="col-sm-3">
                                            <h5>Shop</h5>
                                            <ul>
                                                <li><a href="index.html">Homepage</a>
                                                </li>
                                                <li><a href="category.html">Category - 1</a>
                                                </li>
                                                </li>
                                                <li><a href="detail.html">Product detail</a>
                                                </li>
                                            </ul>
                                        </div> -->
                                        <!-- <div class="col-sm-3">
                                            <h5>User</h5>
                                            <ul>
                                                <li><a href="register.php">Register / login</a>
                                                </li> -->
                                               <!-- <li><a href="customer-orders.html">Orders history</a>
                                                </li>
                                                <li><a href="customer-order.html">Order history detail</a>
                                                </li>
                                                <li><a href="customer-wishlist.html">Wishlist</a> -->
                                                <!-- </li>
                                                <li><a href="customer-account.php">Customer account / change password</a>
                                                </li>
                                            </ul>
                                        </div> -->
                                        <!-- <div class="col-sm-3">
                                            <h5>Order process</h5>
                                            <ul>
                                                <li><a href="basket.php">Shopping cart</a>
                                                </li>
                                                <li><a href="checkout1.php">Checkout - step 1</a>
                                                </li>
                                                <li><a href="checkout2.php">Checkout - step 2</a>
                                                </li>
                                                <li><a href="checkout3.php">Checkout - step 3</a>
                                                </li>
                                                <li><a href="checkout4.php">Checkout - step 4</a>
                                                </li>
                                            </ul>
                                        </div> -->
                                    <!-- </div>
                                </div>
                                <!-- /.yamm-content -->
                            <!-- </li>
                        </ul>
                    </li> -->
                </ul>

            </div>
            <!--/.nav-collapse -->

            <div class="navbar-buttons">

                <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="check_login.php" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">Cart</span></a>
                </div>
                <!--/.nav-collapse -->

                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>

            <div class="collapse clearfix" id="search">

                <form class="navbar-form" role="search" method="GET" action="search_result_page.php">
                    <div class="input-group" id="search_box">
                        <input type="text" class="form-control" placeholder="Search" id="search_field" name="search_field" onkeyup="search_function()">
                        <span class="input-group-btn">

												<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

		    								</span>
                    </div>
                </form>
						</div>
						<div id="result" style="font-size:18px;background-color:white;position:relative;height:auto;overflow:hidden;float:right;padding-right:150px;"></div>

            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->
