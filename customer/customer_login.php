<div class="box">
	<div class="box-header">
		<center><h2>Login</h2>
			<p class="lead">Already our customer</p>
		</center>
	</div>
	<form action="checkout.php"method="post">
		<div class="form-group">
			<label>Email:</label>
			<input type="text" name="c_email"class="form-control"required>
		</div>
		<div class="form-group">
			<label>Password:</label>
			<input type="password" name="c_password"class="form-control"required>
		</div>
		<div class="text-center">
			<button class="btn btn-primary"name="login"value="login"><i class="fa fa-sign-in"></i>Login</button>
		</div>
	</form>
	<center><a href="registration.php"><h3>New?Register Now</h3></a></center>
</div>
<?php
if (isset($_POST['login'])) {
	$customer_email=$_POST['c_email'];
	$customer_password=$_POST['c_password'];
	$select_customers="select * from customers where customer_email='$customer_email'AND customer_password='$customer_password'";
	$run_cust=mysqli_query($con,$select_customers);
	$get_ip=getuserip();
	$check_customer=mysqli_num_rows($run_cust);
	$select_cart="select * from cart where ip_add='$get_ip'";
	$run_cart=mysqli_query($con,$select_cart);
	$check_cart=mysqli_num_rows($run_cart);
	if ($check_customer==0) {
		echo "<script>swal({
			title:'Error',
			text:'Please check your email/password',
			icon:'error',
			button:'tryAgain',
		})</script>";
		exit();
	}
	if ($check_customer==1 AND $check_cart==0) {
		$_SESSION['customer_email']=$customer_email;
		echo "<script>swal({
			title:'Success',
			text:'Log in Successfull',
			icon:'success',
			button:'congrats',
		})</script>";

		echo "<script>window.open('customer/my_account.php','_self')</script>";
	}else{
		$_SESSION['customer_email']=$customer_email;
		echo "<script>swal({
			title:'Success',
			text:'Log in Successfull',
			icon:'success',
			button:'congrats',
		})</script>";

		echo "<script>window.open('checkout.php','_self')</script>";
	}
}

?>