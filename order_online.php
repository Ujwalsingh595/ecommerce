<?php
session_start();
include "includes/db.php";
include ("functions/functions.php");
?>
<?php
if (isset($_GET['c_id'])) {
  $customer_id=$_GET['c_id'];
}
$ip_add=getuserip();
$select_cart="select * from cart where ip_add='$ip_add'";
$run_cart=mysqli_query($con,$select_cart);
$total=0;
while ($row_cart=mysqli_fetch_array($run_cart)) {
  $pro_id=$row_cart['p_id'];
  $pro_size=$row_cart['size'];
  $qty=$row_cart['qty'];
  $get_product="select * from product where product_id='$pro_id'";
  $run_pro=mysqli_query($con,$get_product);
  while ($row_pro=mysqli_fetch_array($run_pro)) {
    $sub_total=$row_pro['product_price']*$qty;
    $pro_title=$row_pro['product_title'];
    $total +=$sub_total;
  }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Payment Mojo</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>

  <body>
    <div class="container">

      <div class="page-header">
        <h1><a href="index.php">Instamojo Payment</a></h1>
        <p class="lead">A test payment integration for instamojo payment gateway. Written in PHP</p>
      </div>

		<p>
		<b>Product name :</b> <?php echo $pro_title; ?>
		</p>
		<p>
		<b>Price : </b> <?php echo $total; ?>
		</p>
		<p><b>Bank Fee : </b> <small> (Rs:3+ 2% of fee+ 15% Service Tax)</small></p>

		<p><b>Total : </b> <?php echo $total; ?></p>

		<h3>Your Payment Details </h3>
		<hr>
		<form action="pay.php" method="POST" accept-charset="utf-8">
	
		<input type="hidden" name="product_name" value="<?php echo $pro_title; ?>"> 
		<input type="hidden" name="product_price" value="<?php echo $total; ?>"> 

		<div class="form-group">
    	<label>Your Name</label>
   		<input type="text" class="form-control" name="name" placeholder="Enter your name">	 <br/>
		</div>

		<div class="form-group">
    	<label>Your Phone</label>
   		<input type="text" class="form-control" name="phone" placeholder="Enter your phone number"> <br/>
		</div>


		<div class="form-group">
    	<label>Your Email</label>
   		<input type="email" class="form-control" name="email" placeholder="Enter you email"> <br/>
		</div>

	  
		<input type="submit" class="btn btn-success btn-lg" value="Click here to Pay Rs:<?php echo $sub_total; ?> ">

		 </form>
 <br/>
  <br/>     
    </div> <!-- /container -->


  </body>
</html>
