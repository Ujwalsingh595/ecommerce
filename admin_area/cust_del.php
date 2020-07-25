<?php
if (isset($_GET['cust_del'])) {
	$delete_cust_id=$_GET['cust_del'];
	$delete_cust="delete from customers where customer_id='$delete_cust_id'";
	$run_delete=mysqli_query($con,$delete_cust);
	if ($run_delete) {
		echo "<script>alert('Customer has been successfully deleted')</script>";
		echo "<script>window.open('index.php?view_cust','_self')</script>";
	}
}
?>