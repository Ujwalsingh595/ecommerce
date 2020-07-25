<?php
session_start();
include "includes/db.php";
include ("functions/functions.php");
?>
<?php
if (isset($_GET['c_d'])) {
  $customer_id=$_GET['c_d'];
}
$ip_add=getuserip();
$status="pending";
$invoice_no=mt_rand();
$select_cart="select * from cart where ip_add='$ip_add'";
$run_cart=mysqli_query($con,$select_cart);
while ($row_cart=mysqli_fetch_array($run_cart)) {
  $pro_id=$row_cart['p_id'];
  $pro_size=$row_cart['size'];
  $qty=$row_cart['qty'];
  $get_product="select * from product where product_id='$pro_id'";
  $run_pro=mysqli_query($con,$get_product);
  while ($row_pro=mysqli_fetch_array($run_pro)) {
    $sub_total=$row_pro['product_price']*$qty;
    $insert_customer_order="insert into customer_order 
    (customer_id,product_id,due_amount,invoice_no,qty,size,order_date,order_status)values('$customer_id','$pro_id','$sub_total','$invoice_no','$qty','$pro_size',NOW(),'$status')";
    $run_cust_order=mysqli_query($con,$insert_customer_order);
    $insert_pending_order="insert into pending_order(customer_id,invoice_no,product_id,qty,size,order_status)values('$customer_id','$invoice_no','$pro_id','$qty','$pro_size','$status')";
    $run_pending=mysqli_query($con,$insert_pending_order);
    $delete_cart="delete from cart where ip_add='$ip_add'";
    $run_del=mysqli_query($con,$delete_cart);
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

    <title>Thank You, Mojo</title>

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
        <p class="lead">A test payment integration for instamojo paypemnt gateway. Written in PHP</p>
      </div>

      <h3 style="color:#6da552">Thank You, Payment success!!</h3>
  

 <?php

include 'src/instamojo.php';

$api = new Instamojo\Instamojo('test_568652f1f49660f9743b39b7dde', 'test_05b020b20a114302ad395059654','https://test.instamojo.com/api/1.1/');

$payid = $_GET["payment_request_id"];


try {
    $response = $api->paymentRequestStatus($payid);


    echo "<h4>Payment ID: " . $response['payments'][0]['payment_id'] . "</h4>" ;
    echo "<h4>Payment Name: " . $response['payments'][0]['buyer_name'] . "</h4>" ;
    echo "<h4>Payment Email: " . $response['payments'][0]['buyer_email'] . "</h4>" ;

  echo "<pre>";
   print_r($response);
echo "</pre>";
    ?>


    <?php
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}



  ?>


      
    </div> <!-- /container -->


  </body>
</html>