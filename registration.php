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
			
			
				<form class="navbar-form"method="get"">
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
				<center><h2>Customer Registration</h2></center>
				<form action="registration.php"method="post"enctype="multipart/form-data">
					<div class="form-group">
		<label>Customer Name</label>
		<input type="text" name="c_name"class="form-control"id="c_name"autocomplete="off">
		<h5 id="name_check"class="text-danger"></h5>
	</div>
	<div class="form-group">
		<label>Customer Email</label>
		<input type="email" name="c_email"class="form-control"id="c_email">
		<h5 id="email_check"class="text-danger"></h5>
	</div>
	<div class="form-group">
		<label>Customer Password</label>
		<input type="password" name="c_password"class="form-control"id="c_pass">
		<h5 id="password_check"class="text-danger"></h5>
	</div>
	<div class="form-group">
		<label>Customer country</label>
		<input type="text" name="c_country"class="form-control"id="c_country">
		<h5 id="country_check"class="text-danger"></h5>
	</div>
	<div class="form-group">
		<label>Contact city</label>
		<input type="text" name="c_city"class="form-control"id="c_city">
		<h5 id="city_check"class="text-danger"></h5>
	</div>
	<div class="form-group">
		<label>Customer Number</label>
		<input type="text" name="c_contact"class="form-control"id="c_mobile">
		<h5 id="number_check"class="text-danger"></h5>
	</div>
	<div class="form-group">
		<label>Customer Address</label>
		<input type="text" name="c_address"class="form-control"id="c_addr">
		<h5 id="address_check"class="text-danger"></h5>
	</div>
	<div class="form-group">
		<label>Customer image</label>
		<input type="file" name="c_image"class="form-control"id="c_img">
		<h5 id="image_check"class="text-danger"></h5>
	
	</div>
	<div class="text-center">
		<button type="submit"class="btn btn-primary"name="submit"onclick="return validation()"><i class="fa fa-user-md"></i>Register</button>
	</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
	function validation(){
		var cus_name=document.getElementById('c_name').value;
		var cus_email=document.getElementById('c_email').value;
		var cus_pass=document.getElementById('c_pass').value;
		var cus_country=document.getElementById('c_country').value;
		var cus_city=document.getElementById('c_city').value;
		var cus_mobile=document.getElementById('c_mobile').value;
		var cus_addr=document.getElementById('c_addr').value;
		
		
		var cus_image=document.getElementById('c_img').value;
		if (cus_name=="") {
			document.getElementById("name_check").innerHTML="**Please enter your name";
			return false;
		}
		if ((cus_name.length<=2)||(cus_name.length>20)) {
			document.getElementById("name_check").innerHTML="**Name must between 2 and 20";
			return false;
		}

		if (!isNaN(cus_name)) {
			document.getElementById("name_check").innerHTML="**Only characters are allowed";
			return false;
		}
		if (cus_email=="") {
			document.getElementById("email_check").innerHTML="**Please enter your email";
			return false;
		}
		if (cus_email.indexOf('@')<=0) {
			document.getElementById("email_check").innerHTML="**Incorrect email";
			return false;
		}
		if ((cus_email.charAt(cus_email.length-4)!='.')&&(cus_email.charAt(cus_email.length-3)!='.')){
			document.getElementById("email_check").innerHTML="**Incorrect email";
			return false;
		}
		if (cus_pass=="") {
			document.getElementById("password_check").innerHTML="**Please enter your password";
			return false;
		}
		if ((cus_pass.length<=7)||(cus_pass.length>20)) {
			document.getElementById("password_check").innerHTML="**Password must between 7 and 20";
			return false;
		}
		if (cus_country=="") {
			document.getElementById("country_check").innerHTML="**Please enter your country";
			return false;
		}
		if (cus_city=="") {
			document.getElementById("city_check").innerHTML="**Please enter your  city";
			return false;
		}
		if (cus_mobile=="") {
			document.getElementById("number_check").innerHTML="**Please enter  your mobile no";
			return false;
		}
		if (isNaN(cus_mobile)) {
			document.getElementById("number_check").innerHTML="**Must writes digit only";
			return false;
		}
		if (cus_mobile.length!=10) {
			document.getElementById("number_check").innerHTML="**Mobile number must be 10 digits only";
			return false;
		}
		if (cus_addr=="") {
			document.getElementById("address_check").innerHTML="**Please enter  your shipping address";
			return false;
		}
		
		
		if (cus_image=="") {
			document.getElementById("image_check").innerHTML="**Please enter your  image";
			return false;
		}
	}
</script>

			<?php
include "includes/footer.php";
?>
<?php
if (isset($_POST['submit'])) {
	$c_name=$_POST['c_name'];
	$c_email=$_POST['c_email'];
	$c_password=$_POST['c_password'];
	$c_country=$_POST['c_country'];
	$c_city=$_POST['c_city'];
	$c_contact=$_POST['c_contact'];
	$c_address=$_POST['c_address'];
	$c_image=$_FILES['c_image']['name'];
	$c_tmp_image=$_FILES['c_image']['tmp_name'];
	$c_ip=getuserip();
	move_uploaded_file($c_tmp_image,"customer/customer-images/$c_image");
	$insert_customer="insert into customers(customer_name,customer_email,customer_password,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip)values('$c_name','$c_email','$c_password','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
	$run_customer=mysqli_query($con,$insert_customer);
	$select_cart="select * from where ip_add='$c_ip'";
	$run_cart=mysqli_query($con,$select_cart);
	$check_cart=mysqli_num_rows($run_cart);
	if ($check_cart>0) {
		$_SESSION['customer_email']=$c_email;
		echo "<script>alert('You have been registered successfully')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
	}
	else{
			$_SESSION['customer_email']=$c_email;
				echo "<script>alert('You have been registered successfully')</script>";
					echo "<script>window.open('index.php','_self')</script>";
	}
}
?>