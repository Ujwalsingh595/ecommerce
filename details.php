<?php
session_start();
include "includes/db.php";
include ("functions/functions.php");
?>
<?php
if (isset($_GET['pro_id'])) {
	$pro_id=$_GET['pro_id'];
	$get_product="select  * from product where product_id=$pro_id";
	$run_product=mysqli_query($con,$get_product);
	$row_product=mysqli_fetch_array($run_product);
	$p_cat_id=$row_product['p_cat_id'];
	$p_title=$row_product['product_title'];
	$p_price=$row_product['product_price'];
	$p_desc=$row_product['product_desc'];
$p_img1=$row_product['product_img1'];
$p_img2=$row_product['product_img2'];
$p_img3=$row_product['product_img3'];
$get_p_cat="select  * from product_category where p_cat_id='$p_cat_id'";
$run_p_cat=mysqli_query($con,$get_p_cat);
$row_p_cat=mysqli_fetch_array($run_p_cat);
$p_cat_id=$row_p_cat['p_cat_id'];
$p_cat_title=$row_p_cat['p_cat_title'];
}
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
<li class="breadcrumb-item active">Shop</li>
<li class="breadcrumb-item active"><a href="shop.php?p_cat=<? echo $p_cat_id; >?"><?php echo $p_cat_title ?></a> </li>
<li class="breadcrumb-item active"><?php echo $p_title ?></li>
			</ul>
		</div>
		<div class="row">
					<div class="col-md-3">
				<?php include "includes/sidebar.php"; ?>
			</div>
			<div class="col-md-9">
				<div  class="row"id="productmain">
					<div class="col-md-6">
						<div id="mainimage">

							<div class="carousel slide"id="myslider"data-ride="carousel">
								<div class="carousel-inner">
									<div class="carousel-item active">
										<img src="admin_area/product-images/<?php echo $p_img1 ?>"class="img-thumbnail">
									</div>
									<div class="carousel-item ">
										<img src="admin_area/product-images/<?php echo $p_img2 ?>"class="img-thumbnail">
									</div>
									<div class="carousel-item">
										<img src="admin_area/product-images/<?php echo $p_img3 ?>"class="img-thumbnail">
									</div>
								</div>
								<ul class="carousel-indicators">
									<li data-target="#myslider"data-slide-to="0"class="active"></li>
									<li data-target="#myslider"data-slide-to="1"></li>
									<li data-target="#myslider"data-slide-to="2"></li>
								</ul>
								<a href="#myslider"data-slide="prev"class="carousel-control-prev">
									<span class="carousel-control-prev-icon"></span>
								</a>
								<a href="#myslider"data-slide="next"class="carousel-control-next">
									<span class="carousel-control-next-icon"></span>
								</a>
						</div>

					</div>
				</div>

				<div class="col-sm-6">
					<div class="box">
						<h1 class="text-center"><?php echo $p_title ?></h1>
						<?php addcart(); ?>
						<form action="details.php?add_cart=<?php echo $pro_id ?>"method="post"class="form-horizontal">
							<label class="col-md-5 control-label">Product Quantity</label>
							<div class="col-md-7">
								<select name="product_qty"class="form-control">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
								</select>
							</div>
							<div class="form-group">
								<label class="col-md-5">Product size</label>
								<div class="col-md-7">
									<select name="product_size"class="form-control">
										<option>Select a size</option>
										<option>small</option>
										<option>medium</option>
										<option>large</option>
									</select>
								</div>
							</div>
							<p class="Price text-center"><h3 class="text-center">INR <?php echo $p_price ?></h3></p>
							<p class="text-center buttons">
								<button class="btn btn-primary"type="submit">
									<i class="fa fa-shopping-cart"></i>Add to cart
								</button>
							</p>
						</form>
					</div>
					

				</div>
			</div>
			<div class="box"id="details">
				<h4>Product details</h4>
				<p> <?php echo $p_desc ?></p>
				<h4>Size</h4>
				<ul>
					<li>small</li>
					<li>medium</li>
					<li>large</li>
				</ul>
			</div>
			<div id="row same-height-row">
				<div class="col-md-3 col-sm-3">
					<div class="box same-height headline">
						<h3 class="text-center">You also like these products</h3>
					</div>
				</div>
				<?php
				$get_product="select * from product order by 1 LIMIT 0,1";
				$run_product=mysqli_query($con,$get_product);
				while ($row=mysqli_fetch_array($run_product)) {
					$pro_id=$row['product_id'];
						$product_title=$row['product_title'];
							$product_price=$row['product_price'];
								$product_img1=$row['product_img1'];
								echo "
										<div class='d-flex justify-content-center align-items-center col-md-3 col-sm-6'>
										<div class='product'>
										<a href='details.php?pro_id=$pro_id'>
										<img src='admin_area/product-images/$product_img1'class='img-thumbnail'>
										</a>
										<div class='text'>
										<h4><a class='details.php?pro_id=$pro_id'>$product_title</a></h4>
										<p class='price'>INR $product_price</p>
										</div>
										</div>

										</div>
										";
									
				}
				?>
			</div>
		</div>
	</div>
</div>
<?php
include "includes/footer.php";
?>