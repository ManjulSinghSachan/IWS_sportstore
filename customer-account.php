
<!DOCTYPE html>

<?php
	//require 'core_file.php';
?>


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

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">



</head>

<body>
    <?php require 'navbar.php';?>
	
	<?php	
	
	
		$error="";$debug="";
		if(isset($_POST["save_changes"])){
			if(empty($_SESSION['user_id']))
				header("Location:register.php");
			
			if(!empty($_POST['firstname']))
				$firstname=$_POST['firstname'];
			else
				$error="FirstName field cannot be empty";
			
			if(!empty($_POST['lastname']))
				$lastname=$_POST['lastname'];
			else
				$error="Lastname field cannot be empty";
			
			if(!empty($_POST['street']))
				$street=$_POST['street'];
			else
				$error="Street field cannot be empty";
		
			if(!empty($_POST['zip']))
				$zip=$_POST['zip'];
			else
				$error="Pincode field cannot be empty";
			
			if(!empty($_POST['state']))
				$state=$_POST['state'];
			else
				$error="State field cannot be empty";
		
			if(!empty($_POST['city']))
				$city=$_POST['city'];
			else
				$error="City field cannot be empty";
		
			$alter_email=$_POST['alter_email'];
			$company=$_POST['company'];
			$phone=$_POST['phone'];
			$user_id=$_SESSION['user_id'];
			if(!empty($firstname)&&!empty($lastname)&&!empty($street)&&!empty($zip)&&!empty($city)&&!empty($state)&&!empty($user_id))
			{
					$q="SELECT user_id from user WHERE user_id='$user_id'";
					if($ret=mysql_query($q)){
						$num_rows=mysql_num_rows($ret);
						if($num_rows!=0)
							$query="UPDATE user SET firstname='$firstname',lastname='$lastname',street='$street',zip='$zip',city='$city',state='$state',company='$company',alternate_email='$alter_email',phone='$phone' WHERE user_id='$user_id';";
						else
							$query="INSERT INTO user "."VALUES"."('$firstname','$lastname','$street','$zip','$city','$state','$company','$alter_email','$phone','$user_id');";
						echo $query;
						$ret=mysql_query($query);
				
						if(!$ret)
							$error= "Couldn't Save Changes. Please try again.";
						else{
						//echo 'OK';
							header("Location:home.php");
					 
						}
					}
					else
						echo "Bad query";
			}
		}
		$pwd_error="";				
		if(isset($_POST['new_pwd_btn'])){
			
			if(empty($_POST['email']))
				$pwd_error="Email field cannot be empty";
			else
				$email=$_POST['email'];
	
			if(empty($_POST['new_pwd']))
				$pwd_error="New Password field cannot be empty";
			else
				$new_pwd=$_POST['new_pwd'];
			if(empty($_POST['conf_new_pwd']))
				$pwd_error="Retype New Password field cannot be empty";
			else
				$conf_new_pwd=$_POST['conf_new_pwd'];
		
			if($new_pwd!=$conf_new_pwd)
				$pwd_error="New Password and Retype New Password fields are different";
			else{
			if(!empty($email)&&!empty($new_pwd)&&($new_pwd==$conf_new_pwd)){
				$query="UPDATE login SET pwd='$new_pwd' WHERE email='$email';";
				if($ret=mysql_query($query))
					header("Location:register.php");
				else
					$pwd_error="Couldn't change password. Try Again.";
				
			}
			}
			
		}	
	
	
	
	?>
	
	
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="home.php">Home</a>
                        </li>
                        <li>My account</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Customer section</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li class="active">
                                    <a href="customer-orders.html"><i class="fa fa-list"></i> My orders</a>
                                </li>
                                <li>
                                    <a href="customer-wishlist.html"><i class="fa fa-heart"></i> My wishlist</a>
                                </li>
                                <li>
                                    <a href="customer-account.html"><i class="fa fa-user"></i> My account</a>
                                </li>
                                <li>
                                    <a href="index.html"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9">
                    <div class="box">
                        <h1>My account</h1>
                        <p class="lead">Change your personal details or your password here.</p>
                        
                        <h3>Change password</h3>

                        <form action="customer-account.php" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_1">New password</label>
                                        <input type="password" class="form-control" id="password_1" name="new_pwd">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_2">Retype new password</label>
                                        <input type="password" class="form-control" id="password_2" name="conf_new_pwd">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="col-sm-12 text-center">
								<span id="star"><?php echo $pwd_error."<br>";?></span>
                                <button type="submit" class="btn btn-primary" name="new_pwd_btn"><i class="fa fa-save"></i> Save new password</button>
                            </div>
                        </form>

                        <hr>

                        <h3>Personal details</h3>
                        <form method="POST" action="customer-account.php">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">Firstname<span id="star">*</span></label>
                                        <input type="text" class="form-control" id="firstname" name="firstname">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lastname">Lastname<span id="star">*</span></label>
                                        <input type="text" class="form-control" id="lastname" name="lastname">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="company">Company</label>
                                        <input type="text" class="form-control" id="company" name="company">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="street">Street<span id="star">*</span></label>
                                        <input type="text" class="form-control" id="street" name="street">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="city">City<span id="star">*</span></label>
                                        <input type="text" class="form-control" id="city" name="city">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="zip">PinCode<span id="star">*</span></label>
                                        <input type="text" class="form-control" id="zip" name="zip">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="state">State<span id="star">*</span></label>
										<input type="text" class="form-control" id="state" name="state">
                                 	
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Telephone</label>
                                        <input type="text" class="form-control" id="phone" name="phone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Alternate Email</label>
                                        <input type="text" class="form-control" id="email" name="alter_email">
                                    </div>
                                </div>
								
                                <div class="col-sm-12 text-center">
									<span id="star"><?php echo $error."<br>";?></span>
									
								   <button type="submit" class="btn btn-primary" name="save_changes"><i class="fa fa-save"></i> Save changes</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
	</div>
        <!-- /#content -->
<?php require 'footer.php';?>

</body>

</html>
