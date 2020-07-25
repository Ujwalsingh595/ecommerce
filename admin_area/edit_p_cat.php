<?php 
if (isset($_GET['edit_p_cat'])) {
	$edit_p_cat_id=$_GET['edit_p_cat'];
	$edit_p_cat_query="select * from product_category where p_cat_id='$edit_p_cat_id'";
	$run_edit=mysqli_query($con,$edit_p_cat_query);
	$row_edit=mysqli_fetch_array($run_edit);
	$p_cat_id=$row_edit['p_cat_id'];
	$p_cat_title=$row_edit['p_cat_title'];
	$p_cat_desc=$row_edit['p_cat_desc'];
}
?>
<div class="row">
	<div class="col-lg-12">
		<ul class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i>Dashboard/Edit Products Category
			</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div  class="card-header"><h3>
				<i class="fa fa-money fa-fw"></i>Insert Product Category</h3>
			</div>

			<div class="card-body">
				<form class="form-horizontal"action=""method="post">
					<div class="form-group">
						<label class="col-md-3">Product Category Title</label>
						<div class="col-md-6">
							<input type="text" name="p_cat_title"class="form-control"value="<?php echo $p_cat_title ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3">Product Category Description</label>
						<div class="col-md-6">
							<textarea type="text"name="p_cat_desc"class="form-control"><?php echo $p_cat_desc ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6">
							<input type="submit" name="submit"value="update"class="btn btn-primary form-control">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
if (isset($_POST['submit'])) {
	$p_cat_title=$_POST['p_cat_title'];
	$p_cat_desc=$_POST['p_cat_desc'];
	$update_p_cat="update product_category set  p_cat_title='$p_cat_title',p_cat_desc='$p_cat_desc'where p_cat_id='$p_cat_id'";
	$run_p_cat=mysqli_query($con,$update_p_cat);
	if ($run_p_cat) {
		echo "<script>alert('Product category Edited successfully')</script>";
		echo "<script>window.open('index.php?view_p_cat','_self')</script>";
	}
}
?>