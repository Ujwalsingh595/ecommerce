<?php
session_start();
if (!isset($_SESSION['customer_email'])) {
	echo "<script>window.open('../checkout.php','_self')</script>";
}else{

include "includes/db.php";
include ("functions/functions.php");
if (isset($_GET['order_id'])) {
	$order_id=$_GET['order_id'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>E-Commerce Store</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="styles/style.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="top">
	<div class="container">
		<div class="row">
			<div class="col-md-6 offer">
				<a href="#"class="btn btn-success">Welcome Guest</a>
				<a href="cart.php">Shoping Cart Total Price: INR <?php price(); ?>,Total items <?php items(); ?></a>
			</div>
			<div  class="col-md-6">
				<ul class="menu">
					<li>
						<a href="">Register</a>
					</li>
					<li>
						<a href="">My Account</a>
					</li>
					<li>
						<a href="">Goto Cart</a>
					</li>
					<li>
						<a href="">Login</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<nav class="navbar navbar-expand-sm"id="navbar">
	<div class="container">
		<div class="navbar-header">
			<a href=""class="navbar-brand home">
				<img src="images/logoo.png">
			</a>
			<button type="button"class="navbar-toggler"data-toggle="collapse"data-target="#navigation">
			<span class="navbar-toggler-icon"></span>
			
			</button>
			
		</div>
		<div class="navbar-collapse collapse"id="navigation">
			<div class="padding-nav">
				<ul class="nav  navbar-nav navbar-left">
					<li class="nav-item active">
						<a href="../index.php"class="nav-link">Home</a>
					</li>
					<li class="nav-item">
						<a href="../shop.php"class="nav-link">Shop</a>
					</li>
					<li class="nav-item">
						<a href="my_account.php"class="nav-link">MyAccount</a>
					</li>
					<li class="nav-item">
						<a href="../cart.php"class="nav-link">Shopping Cart</a>
					</li>
					
					
					
				</ul>
			</div>
			<a href="cart.php"class="btn btn-primary navbar-btn right">
				<i class="fa fa-shopping-cart"></i>
				<span><?php items(); ?> items in cart</span>
			</a>
			
			
				<form class="navbar-form"method="get">
					<div class="input-group">
						<input type="text" name="user_query"placeholder="search"class="form-control"required>
						<button type="submit"name="search"value="search"class="btn btn-primary">
							<i class="fa fa-search"></i>
						</button>
					</div>
				</form>
			
		</div>
	</div>
</nav>
<div id="content">
	<div class="container">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
<li class="breadcrumb-item active">My Account</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-3">
			<?php
			include "includes/sidebar.php";
			?>
			</div>
			<div class="col-md-9">
				<div class="box">
					<h1 class="text-center">Please confirm your payment</h1>
				<form action="confirm.php?update_id=<?php echo $order_id ?>"method="post"enctype="multipart/form-data">
					<div class="form-group">
						<label>Invoice  number</label>
						<input type="text" name="invoice_number"class="form-control">
					</div>
					<div class="form-group">
						<label>Amount</label>
						<input type="text" name="amount"class="form-control">
					</div>
					<div class="form-group">
						<label>Select Payment Mode</label>
						<select class="form-control"name="payment_mode">
							<option>Bank Transfer</option>
							<option>Paypal</option>
							<option>Phonepe</option>
							<option>Paytm</option>
						</select>
					</div>
					<div class="form-group">
						<label>Transaction Number</label>
						<input type="text" name="trfnum"class="form-control">
					</div>
					<div class="form-group">
						<label>Payment Date</label>
						<input type="date" name="date"class="form-control">
					</div>
					<div class="text-center">
						<button type="submit"class="btn btn-success btn-lg"name="confirm">Confirm Payment</button>
					</div>
				</form>
				<?php
				if (isset($_POST['confirm'])) {
					$update_id=$_GET['update_id'];
					$invoice_number=$_POST['invoice_number'];
					$amount=$_POST['amount'];
					$payment_mode=$_POST['payment_mode'];
					$transaction_num=$_POST['trfnum'];
					$date=$_POST['date'];
					$complete="complete";
					$insert="insert into payments(invoice_id,amount,payment_mode,reference_no,payment_date)values('$invoice_number','$amount','$payment_mode','$transaction_num','$date')";
					$run_insert=mysqli_query($con,$insert);
					$update_q="update customer_order set order_status='$complete' where order_id='$update_id'";
					$run_update=mysqli_query($con,$update_q);
					$update_p="update pending_order set order_status='$complete' where order_id='$update_id'";
					$run_update=mysqli_query($con,$update_p);
					echo "<script>alert('YOur order has been received')</script>";	
					echo "<script> window.open('my_account.php?order','_self')</script>";			}
				
				?>
				</div>
			</div>
</div>
</div>
</div>
<?php
include "includes/footer.php";
?>
<?php } ?>