<?php
if (isset($_GET['delete_p_cat'])) {
	$delete_p_cat_id=$_GET['delete_p_cat'];
	$delete_p_cat="delete from product_category where p_cat_id='$delete_p_cat_id'";
	$run_delete=mysqli_query($con,$delete_p_cat);
	if ($run_delete) {
		echo "<script>alert('one  product category has been successfully deleted')</script>";
		echo "<script>window.open('index.php?view_p_cat','_self')</script>";
	}
}
?>