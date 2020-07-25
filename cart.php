<?php
session_start();
include "includes/db.php";
include ("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>E-Commerce Store</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
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
				<a href="#"class="btn btn-success"><?php 
				if (!isset($_SESSION['customer_email'])) {
					echo "Welcome Guest";
				}
				else{
					echo "Welcome: ".$_SESSION['customer_email'];
				}
				?></a>
				<a href="cart.php">Shoping Cart Total Price: INR <?php price(); ?>,Total items <?php items(); ?></a>
			</div>
			<div  class="col-md-6">
				<ul class="menu">
					<li>
						<a href="registration.php">Register</a>
					</li>
					<li>
						<?php if (!isset($_SESSION['customer_email'])) {
							echo "<a href='checkout.php'class='nav-link'>My Account</a>";
						} 
						else{
							echo "<a href='customer/my_account.php'class='nav-link'>My Account</a>";
							}?>
					</li>
					<li>
						<a href="cart.php">Goto Cart</a>
					</li>
					<li>
						<a href=""><?php 
						if (!isset($_SESSION['customer_email'])) {
							echo "<a href='checkout.php'>Login</a>";
						}else{
							echo "<a href='logout.php'>Logout</a>";
						}
						?></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<nav class="navbar navbar-expand-lg navbar-light"id="navbar">
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
						<a href="index.php"class="nav-link">Home</a>
					</li>
					<li class="nav-item">
						<a href="shop.php"class="nav-link">Shop</a>
					</li>
					<li class="nav-item">
						<?php if (!isset($_SESSION['customer_email'])) {
							echo "<a href='checkout.php'class='nav-link'>My Account</a>";
						} 
						else{
							echo "<a href='customer/my_account.php'class='nav-link'>My Account</a>";
							}?>
					</li>
					<li class="nav-item">
						<a href="cart.php"class="nav-link">Shopping Cart</a>
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
<li class="breadcrumb-item active">Cart</li>
			</ul>
		</div>
		<div class="row">
		<div class="col-md-9"id="cart">
			<div class="box">
				<form action="cart.php"method="post"enctype="multipart-form-data">
					<h1>Shopping Cart</h1>
					<?php 
					$ip_add=getuserip();
					$select_cart="select * from cart where ip_add='$ip_add'";
					$run_cart=mysqli_query($con,$select_cart);
					$count=mysqli_num_rows($run_cart);

						?>
					<p class="text-muted">Currently you have  <?php echo $count ?> items in your cart.</p>
					<div class="table-responsive">
						
						<table class="table">
							<thead><tr>
								<th>Product</th>
								<th>Quantity</th>
								<th>Unit Price</th>
								<th>Size</th>
								<th >Delete</th>
								<th>Sub Total</th>
							</tr></thead>
							<tbody>
								<?php 
								$total=0;
								while($row=mysqli_fetch_array($run_cart))
								{
									$pro_id=$row['p_id'];
									$pro_size=$row['size'];
									$pro_qty=$row['qty'];
									$get_product="select * from  product where product_id='$pro_id'";
									$run_pro=mysqli_query($con,$get_product);
									while($row=mysqli_fetch_array($run_pro))
									{


										$p_title=$row['product_title'];
										$p_price=$row['product_price'];
										$sub_total=$row['product_price']*$pro_qty;
										$total +=$sub_total;

																?>
								<tr>
									
									<td><?php echo $p_title ?></td>
									<td><?php echo $pro_qty ?></td>
									<td><?php echo $p_price ?></td>
									<td><?php echo $pro_size ?></td>
									<td><input type="checkbox" name="remove[]"value="<?php echo $pro_id ?>"></td>
									<td>INR <?php echo $sub_total ?></td>
								</tr>
								
								
							</tbody>
							
							<?php } } ?>
							<tfoot>
								<th colspan="5">Total Price</th>
								<th colspan="2">INR <?php echo $total ?></th>
							</tfoot>
						</table>
					</div>

					<div class="box-footer">
						<div class="float-left">
							<a href="index.php"class="btn btn-primary">
								<i class="fa fa-chevron-left"></i>Continue Shopping
							</a>
						</div>
						<div class="float-right">
							<button class="btn  btn-success"type="submit"value="update cart"name="update"><i class="fa fa-refresh"></i>Updatecart</button>
							<a href="checkout.php"class="btn btn-primary">Proceed to checkout<i class="fa fa-chevron-right"></i></a>
						</div>

					</div>
				</form>
				</div>
				<?php 
				function update_cart(){
					global $con;
					if (isset($_POST['update'])) {
						foreach ($_POST['remove'] as $remove_id) {
							$delete_product="delete from cart where p_id='$remove_id'";
							$run_del=mysqli_query($con,$delete_product);
							if($run_del)
							{
								echo "<script>window.open('cart.php','_self')</script>";
							}
						}
					}
				}
				echo @$up_cart=update_cart();
				?>
			</div>
				<div class="col-md-3">
					<div class="box"id="order-summary">
						<div class="box-header">
							<h3>Order Summary</h3>
						</div>
						<p class="text-muted">Shopping and additional costs are calculated based on the values you have entered</p>
						<div class="table-responsive">
							<table class="table">
								<tbody>
									<tr>
										<td>Order Subtotal</td>
										<th>INR <?php echo $total ?></th>
										</tr>
										<tr>
											<td>Shipping and Handling</td>
											<td>INR 0</td>
										</tr>
										<tr><td>Tax</td>
											<td>INR 0</td></tr>
											<tr class="total">
												<td>Total</td>
												<th>INR <?php echo $total ?></th>
											</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
					</div>
			

			</div>
		</div>
	
		
			<?php
			include "includes/footer.php";
			?>