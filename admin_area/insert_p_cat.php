<div class="row">
	<div class="col-lg-12">
		<ul class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i>Dashboard/Insert Products Category
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
							<input type="text" name="p_cat_title"class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3">Product Category Description</label>
						<div class="col-md-6">
							<textarea type="text"name="p_cat_desc"class="form-control"></textarea>
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
	$p_cat_title=$_POST['p_cat_title'];
	$p_cat_desc=$_POST['p_cat_desc'];
	$insert_p_cat="insert into product_category(p_cat_title,p_cat_desc)values('$p_cat_title','$p_cat_desc')";
	$run_p_cat=mysqli_query($con,$insert_p_cat);
	if ($run_p_cat) {
		echo "<script>alert('Product category inserted successfully')</script>";
		echo "<script>window.open('index.php?insert_p_cat','_self')</script>";
	}
}
?>