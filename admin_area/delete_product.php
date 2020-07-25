<?php
if (isset($_GET['delete_product'])) {
	$delete_id=$_GET['delete_product'];
	$delete_prp="delete from product where product_id='$delete_id'";
	$run_delete=mysqli_query($con,$delete_prp);
	if ($run_delete) {
		echo "<script>alert('Product has been deleted  successfully')</script>";
		echo "<script>window.open('index.php?view_product','_self')</script>";
	}
}
?>