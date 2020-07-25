<?php 
if (isset($_GET['edit_cat'])) {
	$edit_cat_id=$_GET['edit_cat'];
	$edit_cat_query="select * from categories where cat_id='$edit_cat_id'";
	$run_edit=mysqli_query($con,$edit_cat_query);
	$row_edit=mysqli_fetch_array($run_edit);
	$cat_id=$row_edit['cat_id'];
	$cat_title=$row_edit['cat_title'];
	$cat_desc=$row_edit['cat_desc'];
}
?>
<div class="row">
	<div class="col-lg-12">
		<ul class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i>Dashboard/Edit Category
			</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div  class="card-header"><h3>
				<i class="fa fa-money fa-fw"></i>Edit Category</h3>
			</div>

			<div class="card-body">
				<form class="form-horizontal"action=""method="post">
					<div class="form-group">
						<label class="col-md-3">Category Title</label>
						<div class="col-md-6">
							<input type="text" name="cat_title"class="form-control"value="<?php echo $cat_title ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3">Category Description</label>
						<div class="col-md-6">
							<textarea type="text"name="cat_desc"class="form-control"><?php echo $cat_desc ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6">
							<input type="submit" name="submit"value="submit"class="btn btn-primary form-control">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
if (isset($_POST['submit'])) {
	$cat_title=$_POST['cat_title'];
	$cat_desc=$_POST['cat_desc'];
	$update_cat="update categories set cat_title='$cat_title',cat_desc='$cat_desc'where cat_id='$cat_id'";
	$run_cat=mysqli_query($con,$update_cat);
	if ($run_cat) {
		echo "<script>alert('Category Edited successfully')</script>";
		echo "<script>window.open('index.php?view_cat','_self')</script>";
	}
}
?>