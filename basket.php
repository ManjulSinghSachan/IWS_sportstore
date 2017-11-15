
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SportsKart">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

    <script>
      $(document).ready(function(){
      $(".fa-plus").on('click',function(){
           
            //alert(str);
			
			var id = $(this).attr('id');
			id = id + "," + "plus";
			//alert(id);
            $.ajax({
            type: "POST",
            url: "quantity.php",
            data: { 'id': id }
            }).done(function( msg ) {
              //alert( "Data Saved: " + msg );
			  alert(msg);
            });

              location.reload(true);
        });

        $(".fa-minus").on('click',function(){
            
            //alert(str);
			var id = $(this).attr('id');
			id = id + "," + "minus";
			//alert(id);
            $.ajax({
            type: "POST",
            url: "quantity.php",
            data: { 'id': id }
            }).done(function( msg ) {
              //alert( "Data Saved: " + msg );
			  alert(msg);
            });

              location.reload(true);
        });

    });

  </script>

    <!-- AJAX -->
    <script>
    $(document).ready(function() {


    // delete an entry
    $("a.deleteButton").click(function() {

      var t = $(this).attr('name');
      console.log(t);

        $.ajax({
        type: "POST",
        url: "delete.php",
        data: { name: t }
        }).done(function( msg ) {
          //alert( "Data Saved: " + msg );
        });

          location.reload(true);
      });
      //change quantity
      $(":input").bind('keyup mouseup', function () {

          //alert("changed");
          //alert( "Data Saved");


          //location.reload(true);
        });



    });


    </script>


</head>

<body>

  <?php
	require 'navbar.php';			
      $query = "SELECT * FROM cartpage ORDER BY product_id ASC";
      $result = mysql_query($query);



      $subtotal = 0;

      $num = mysql_num_rows($result);

      ?>





    
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="home.php">Home</a>
                        </li>
                        <li>Shopping cart</li>
                    </ul>
                </div>

                <div class="col-md-9" id="basket">

                    <div class="box">

                        <form method="post" action="checkout1.php">

                            <h1>Shopping cart</h1>
                            <p class="text-muted">You currently have <?php echo $num ?> item(s) in your cart.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Quantity</th>
                                            <th>Unit price</th>
                                            <th>Discount</th>
                                            <th colspan="2">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                      <?php
                                      if($num > 0)
                                      {

                                          while($row = mysql_fetch_array($result))
                                          {
                                              $subtotal = $subtotal + ((int)$row['price'] * (int)$row['quantity']);

                                       ?>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <img src="<?php echo $row['photo'] ?>" alt="">
                                                </a>
                                            </td>
                                            <td><?php echo $row['product_name'] ?>
                                            </td>
                                            <td>
                                                <!--<input type="number" id="<?php echo $row['product_id'];?>" value="<?php echo intval($row['quantity']);?>" class="form-control" > -->
                                                <div id="incdec">
                                                  <i class="fa fa-minus" id="<?php echo $row['product_id'];?>"></i>
                                                  <input type="text" value="<?php echo intval($row['quantity']);?>" />
                                                  <i class="fa fa-plus" id="<?php echo $row['product_id'];?>"></i>
                                                </div>

                                            </td>
                                            <td>Rs.<?php echo $row['price'] ?></td>
                                            <td>Rs.0.00</td>
                                            <td>Rs. <?php echo $row['price']*$row['quantity'] ?></td>
                                            <td><a class="deleteButton" name="<?php echo (int)$row['product_id'] ?>"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>

                                        <?php
                                            }
                                          }
                                          $total = 10 + (int)$subtotal;

                                        ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th colspan="2">Rs. <?php echo $subtotal ?></th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="home.php" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                                </div>
                                <div class="pull-right">

                                    <button type="submit" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
				</div>
                    <!-- /.box -->

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
                                        <th>Rs.<?php echo $subtotal ?></th>
                                    </tr>
                                    <tr>
                                        <td>Shipping and handling</td>
                                        <th>Rs0.0</th>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <th>Rs.0.00</th>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <th>Rs.<?php echo $subtotal ?></th>
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
