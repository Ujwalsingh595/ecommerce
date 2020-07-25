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
<li class="breadcrumb-item active">Shop</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-3">
				<?php include "includes/sidebar.php"; ?>
			</div>
			<div class="col-md-9">
				<?php
              if(!isset($_GET['p_cat']))
              {
              	if (!isset($_GET['cat_id'])) {
              		echo "<div class='box'>
<h1>Shop</h1>
<p>We welcome our user we provide best service in e-commerce sector.</p>
              		</div>";
              	}
              }

				?>

				<div class="row">
					<?php
					if(!isset($_GET['p_cat']))
						{
							if (!isset($_GET['cat_id'])) {
								$perpage=6;
								if (isset($_GET['page'])) {
									$page=$_GET['page'];
								}
								else{
									$page=1;
								}
								$start_from=($page-1)* $perpage;
								$get_product="select  * from product order by 1 DESC LIMIT $start_from, $perpage ";
								$run_pro=mysqli_query($con,$get_product);
								while ($row=mysqli_fetch_array($run_pro)) {
									$pro_id=$row['product_id'];
										$product_title=$row['product_title'];
											$product_price=$row['product_price'];
												$product_img1=$row['product_img1'];
													echo "<div class='col-md-4 col-sm-6 center-responsive'><div class='product box content'>
                                       <a href='details.php?pro_id=$pro_id'>
                                       <figure>
							<img src='admin_area/product-images/$product_img1'class='img-fluid'>
							</figure>
 									</a>
											<div class='text'>
												<h3><a href='details.php?pro_id=$pro_id'>$product_title</a></h3>
													<p class='price'>INR $product_price</p>
														<p class='buttons'>
															<a href='details.php?pro_id=$pro_id'class='btn btn-primary'>View details</a>
				<a href='details.php?pro_id=$pro_id'class='btn btn-success'><i class='fa fa-shopping-cart'></i>Add to Cart</a>
																</p>
														</div>
													</div></div>
													";
								}
							
					?>
				</div>
				<center>
					<ul class="pagination">
						<?php
                        $query="select * from product";
                        $result=mysqli_query($con,$query);
                        $total_record=mysqli_num_rows($result);
                        $total_page=ceil($total_record/$perpage);
                        echo "
                                  <li class='page-item'><a href='shop.php?page=1'class='page-link'> ". 'First Page'."</a></li>
                        ";
                        for ($i=1; $i<=$total_page ; $i++) { 
                                              echo "<li class='page-item'><a href='shop.php?page=".$i."'class='page-link'> ".$i."</a></li>";
                        };
                        echo "<li class='page-item'><a href='shop.php?page=$total_page'class='page-link'> ". 'Last Page'."</a></li>";
						}
						}
						?>
					</ul>
				</center>
									
				
			
<?php
getpcatpro();
getcatspro();
?>


					</div>
		</div>
	</div>
</div>
<?php
include "includes/footer.php";
?>