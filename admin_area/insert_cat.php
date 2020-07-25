<div class="row">
	<div class="col-lg-12">
		<ul class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i>Dashboard/Insert Category
			</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div  class="card-header"><h3>
				<i class="fa fa-money fa-fw"></i>Insert Category</h3>
			</div>

			<div class="card-body">
				<form class="form-horizontal"action=""method="post">
					<div class="form-group">
						<label class="col-md-3">Category Title</label>
						<div class="col-md-6">
							<input type="text" name="cat_title"class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3">Category Description</label>
						<div class="col-md-6">
							<textarea type="text"name="cat_desc"class="form-control"></textarea>
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
	$insert_cat="insert into categories(cat_title,cat_desc)values('$cat_title','$cat_desc')";
	$run_cat=mysqli_query($con,$insert_cat);
	if ($run_cat) {
		echo "<script>alert('category inserted successfully')</script>";
		echo "<script>window.open('index.php?insert_cat','_self')</script>";
	}
}
?>