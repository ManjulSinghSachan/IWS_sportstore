<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    
    <title>
        SportKart : e-commerce website
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
	if(isset($_POST["sign_up_btn"])&&isset($_POST['username'])&&isset($_POST['email'])&&isset($_POST['pwd'])){
			$username=$_POST['username'];
			//echo $username;
			$email=$_POST['email'];
			//echo $email;
			$pwd=$_POST['pwd'];
			$conf_pwd=$_POST['conf_pwd'];
			
			if($pwd!=$conf_pwd)
				$error="Password and Confirm Password Fields are different. Try Again.";
			else{
				$error="";
				$query="SELECT email FROM login WHERE email='".mysql_real_escape_string($email)."'";
				$ret=mysql_query($query);
				$num=mysql_num_rows($ret);
				if($num>0){
					$error="Email already in use. Kindly enter new e-mail.";
					
				}
				else{
					$query="INSERT INTO login". "(name,email,pwd)". "VALUES"."('$username','$email','$pwd')";
					$ret=mysql_query($query);
				
					if(!$ret)
						$error= "Couldn't Sign Up. Please try again.";
					else{
						//echo 'OK';
						header("Location:home.php");
					 
					}
				}
					
			}
	}

	
	
	
	
	?>
	<div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>New account / Sign in</li>
                    </ul>

                </div>

                <div class="col-md-6">
                    <div class="box">
                        <h1>New account</h1>

                        <p class="lead">Not our registered customer yet?</p>
                        <p>With registration with us new world of fashion, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>

                        <hr>

                        <form action="register.php" method="post">
                            <div class="form-group">
                                <label for="name">Username</label>
                                <input type="text" class="form-control" id="name" name="username">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="pwd">
                            </div>
							<div class="form-group">
                                <label for="password">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="conf_pwd">
                            </div>
                            <p style="color:red"><?php echo $error;?></p>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="sign_up_btn"><i class="fa fa-user-md"></i> Register</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box">
                        <h1>Login</h1>

                        <p class="lead">Already our customer?</p>
                        
                        <hr>

                        <form action="register.php" method="post">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="pwd">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="log_in_btn"><i class="fa fa-sign-in"></i> Log in</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
            <!-- /.container -->
        </div>
    <?php require 'footer.php';?>
	</body>
</html>