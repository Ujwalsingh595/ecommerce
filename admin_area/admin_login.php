<?php
session_start();
include "includes/db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin login</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/login.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="box">

		<div  class="form ">
		<form action=""method="post">
			<div class="form-group">
				<h3 class="text-center">Admin Login</h3>
			</div>
			<div class="form-group">
				<input type="textbox" name="email"placeholder="Email address"class="form-control">
			</div>
			<div class="form-group">
				<input type="password" name="password"placeholder="Password"class="form-control">
			</div>
			<input type="submit" name="login"class="btn btn-primary text-center btn-block"value="login">
		</form></div>
	</div>

</body>
</html>
<?php
if (isset($_POST['login'])) {
	$admin_email=mysqli_real_escape_string($con,$_POST['email']);
	$admin_password=mysqli_real_escape_string($con,$_POST['password']);
	$get_admin="select * from admin where admin_email='$admin_email' AND admin_password='$admin_password'";
	$run_admin=mysqli_query($con,$get_admin);
	$count=mysqli_num_rows($run_admin);
	if ($count==1) {
		$_SESSION['admin_email']=$admin_email;
		
		echo "<script>window.open('index.php?dashboard','_self')</script>";
	}
else{
	echo "<script>alert('Email/password wrong')</script>";
}
}
?>