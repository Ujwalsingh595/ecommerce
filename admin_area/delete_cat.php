<?php
if (isset($_GET['delete_cat'])) {
	$delete_cat_id=$_GET['delete_cat'];
	$delete_cat="delete from categories where cat_id='$delete_cat_id'";
	$run_delete=mysqli_query($con,$delete_cat);
	if ($run_delete) {
		echo "<script>alert('one category has been successfully deleted')</script>";
		echo "<script>window.open('index.php?view_cat','_self')</script>";
	}
}
?>