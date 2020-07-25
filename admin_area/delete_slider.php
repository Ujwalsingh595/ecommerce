<?php
if (isset($_GET['delete_slider'])) {
	$delete_slider_id=$_GET['delete_slider'];
	$delete_slider="delete from slider where id='$delete_slider_id'";
	$run_delete=mysqli_query($con,$delete_slider);
	if ($run_delete) {
		echo "<script>alert('one slider has been successfully deleted')</script>";
		echo "<script>window.open('index.php?view_slider','_self')</script>";
	}
}
?>