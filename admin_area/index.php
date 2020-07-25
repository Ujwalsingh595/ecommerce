<?php
session_start();
include "includes/db.php";
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('admin_login.php','_self')</script>";
}
else{
?>
<?php
$admin_session=$_SESSION['admin_email'];
$get_admin="select * from admin where admin_email='$admin_session'";
$run_admin=mysqli_query($con,$get_admin);
$row_admin=mysqli_fetch_array($run_admin);
$admin_id=$row_admin['admin_id'];
$admin_name=$row_admin['admin_name'];
$admin_email=$row_admin['admin_email'];
$admin_image=$row_admin['admin_image'];
$admin_country=$row_admin['admin_country'];
$admin_job=$row_admin['admin_job'];
$admin_contact=$row_admin['admin_contact'];
$admin_about=$row_admin['admin_about'];


$get_pro="select * from product";
$run_pro=mysqli_query($con,$get_pro);
$count_pro=mysqli_num_rows($run_pro);

$get_cust="select * from customers";
$run_cust=mysqli_query($con,$get_cust);
$count_cust=mysqli_num_rows($run_cust);

$get_p_cat="select * from product_category";
$run_p_cat=mysqli_query($con,$get_p_cat);
$count_p_cat=mysqli_num_rows($run_p_cat);

$get_cus_order="select * from customer_order";
$run_cus_order=mysqli_query($con,$get_cus_order);
$count_cus_order=mysqli_num_rows($run_cus_order);
?>
<html>
<head>
	<title>Admin Panel</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
 <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="wrapper">
		<div class="row">
			<div class="col-md-3">
		<?php include "includes/sidebar.php"; ?>
	</div>
	<div class="col-md-9">
		<div class="page-wrapper">
		
				<?php
if (isset($_GET['dashboard'])) {
	include "dashboard.php";
}
				?>
				<?php
if (isset($_GET['insert_product'])) {
	include "product_insert.php";
}
				?>
				<?php
if (isset($_GET['view_product'])) {
	include "view_product.php";
}
				?>
						<?php
if (isset($_GET['delete_product'])) {
	include "delete_product.php";
}
				?>
					<?php
if (isset($_GET['edit_product'])) {
	include "edit_product.php";
}
				?>
					<?php
if (isset($_GET['insert_p_cat'])) {
	include "insert_p_cat.php";
}
				?>
				<?php
if (isset($_GET['view_p_cat'])) {
	include "view_p_cat.php";
}
				?><?php
if (isset($_GET['delete_p_cat'])) {
	include "delete_p_cat.php";
}
				?>
				<?php
if (isset($_GET['edit_p_cat'])) {
	include "edit_p_cat.php";
}
				?>
				<?php
if (isset($_GET['insert_cat'])) {
	include "insert_cat.php";
}
				?>
				<?php
if (isset($_GET['view_cat'])) {
	include "view_cat.php";
}
				
				?><?php
if (isset($_GET['delete_cat'])) {
	include "delete_cat.php";
}
				?>
				<?php
if (isset($_GET['edit_cat'])) {
	include "edit_cat.php";
}
				?>
				<?php
if (isset($_GET['view_cust'])) {
	include "view_cust.php";
}
				
				?>
				<?php
if (isset($_GET['cust_del'])) {
	include "cust_del.php";
}
				?>
				<?php
if (isset($_GET['insert_slider'])) {
	include "insert_slider.php";
}
				
				?>
				<?php
if (isset($_GET['view_slider'])) {
	include "view_slider.php";
}
if (isset($_GET['delete_slider'])) {
	include "delete_slider.php";
}
if (isset($_GET['edit_slider'])) {
	include "edit_slider.php";
}
				?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php
}
?>