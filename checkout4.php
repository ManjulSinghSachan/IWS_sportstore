
<?php
	
    $connect = mysqli_connect("sql12.freemysqlhosting.net:3306","sql12206252","qDhsLVHUV4","sql12206252");
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">
	<meta name="description" content="SportsKart">
   
    <title>
        SportsKart
    </title>

    
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

	<script>
		function success_alert(){
			//alert('here');
			alert('Order Successfully Placed!');
			//window.location.href="home.php";
		}
	</script>

</head>

<body>

  <?php
      require 'navbar.php';
      //require 'session.php';

      $return_value=logged_in();
	  if($return_value)
        $user_id =  $_SESSION['user_id'];
      else
        header('location:register.php');
    
        $query = "SELECT * FROM cartpage WHERE user_id = '$user_id' ORDER BY product_id ASC;";
      $result = mysqli_query($connect, $query);



      $subtotal = 0;

      $num = mysqli_num_rows($result);

      ?>

    
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Checkout - Order review</li>
                    </ul>
                </div>

                <div class="col-md-9" id="checkout">

                    <div class="box">
                        <form method="post" action="checkout4.php">
                            <h1>Checkout - Order review</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="checkout1.php"><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                <li><a href="checkout2.php"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                </li>
                                <li><a href="checkout3.php"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li>
                                <li class="active"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>

                            <div class="content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Product</th>
                                                <th>Quantity</th>
                                                <th>Unit price</th>
                                                <th>Discount</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                          <?php
                                          $total = 0;
                                          if($num > 0)
                                          { 
                                              

                                              while($row = mysqli_fetch_array($result))
                                              {
                                                  $subtotal = ((int)$row['price'] * (int)$row['quantity']);

                                           ?>
                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="<?php echo $row['photo'] ?>" alt="">
                                                    </a>
                                                </td>
                                                <td><?php echo $row['product_name'] ?>
                                                </td>
                                                <td><?php echo intval($row['quantity']);?></td>
                                                <td>Rs.<?php echo $row['price'] ?></td>
                                                <?php
                                                    if($subtotal < 500)
                                                        $discount = 0;
                                                    else{
                                                        $discount = round($subtotal * 0.25);
                                                        $subtotal = $subtotal - $discount;
                                                        
                                                    }
                                                        
                                                ?>
                                                <td>Rs. <?php echo $discount?></td>
                                                <td>Rs. <?php echo $subtotal ?></td>
                                            </tr>
                                            <?php
                                                $total =  $total + (int)$subtotal;
                                                }
                                              }
                                             // $total =  $total + (int)$subtotal;

                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="5">Total</th>
                                                <th>Rs. <?php echo $total ?></th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.content -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="checkout3.php" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Payment method</a>
                                </div>
                                <div class="pull-right">
                                    <a href="booking_confirmed.php" class="btn btn-primary">Place an order<i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">

                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order summary</h3>
                        </div>
                        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order subtotal</td>
                                        <th>Rs. <?php echo $total ?></th>
                                    </tr>
                                    <?php 
                                        $tax = 0;
                                        if($total > 500)
                                        $tax = round($total * 0.18);
                                    ?>
                                    <tr>
                                        <td>Tax (18%)</td>
                                        <th>Rs.<?php echo $tax ?></th>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <th>Rs.<?php echo $total + $tax ?></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


<?php require 'footer.php';?> 
</body>

</html>
