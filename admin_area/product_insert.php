<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('admin_login.php','_self')</script>";
}
else{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert product</title>
</head>
<body>
<div class="row">
	<div class="col-lg-3"></div>
	<div class="col-lg-12">
		<div class="breadcrumb">
			<li class="breadcrumb-item">
				<i class="fa fa-dashboard"></i>Dashboard/Insert Product
			</li>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h3>
					<i class="fa fa-money "></i>Insert Product
				</h3>
			</div>
			<div class="card-body">

	<form method="post"enctype="multipart/form-data">
<div class="form-group">
	<label class="col-md-3">Product title</label>
	<input type="text" name="product_title"class="form-control"required>
</div>
<div class="form-group">
	<label class="col-md-3">Product category</label>
	<select name="product_cat"class="form-control">
		<option>Select a product category</option>
		<?php
		$get_p_cat="select  * from product_category";
		$run=mysqli_query($con,$get_p_cat);
		while($row=mysqli_fetch_array($run))
		{
			$id=$row['p_cat_id'];
			$cat_title=$row['p_cat_title'];
			echo "
<option value='$id' >$cat_title </option>
			";
		}
		?>
	</select>
</div>
<div class="form-group">
	<label class="col-md-3">Categories</label>
		<select name="cat"class="form-control">
			<option>Select categories</option>
			<?php
		$get_p_cat="select  * from categories";
		$run=mysqli_query($con,$get_p_cat);
		while($row=mysqli_fetch_array($run))
		{
			$id=$row['cat_id'];
			$cat_title=$row['cat_title'];
			echo "
<option value='$id' >$cat_title </option>
			";
		}
		?>
	</select>
</div>
<div class="form-group">
	<label class="col-md-3">Product image1</label>
	<input type="file" name="product_image1"class="form-control"required>
</div>
<div class="form-group">
	<label class="col-md-3">Product image2</label>
	<input type="file" name="product_image2"class="form-control"required>
</div>
<div class="form-group">
	<label class="col-md-3">Product image3</label>
	<input type="file" name="product_image3"class="form-control"required>
</div>
<div class="form-group">
	<label class="col-md-3">Product price</label>
	<input type="text" name="product_price"class="form-control"required>
</div>
<div class="form-group">
	<label class="col-md-3">Product keyword</label>
	<input type="text" name="product_keywords"class="form-control"required>
</div>
<div class="form-group">
	<label class="col-md-3">Product description</label>
<textarea name="product_desc"class="form-control"rows="6"cols="19"></textarea>
</div>
<div class="form-group">

	<input type="submit" name="submit1"class="btn btn-primary"value="insert product"required>
</div>
	</form>			
	</div>
	</div>
	
</div>
</div>
<?php
if (isset($_POST['submit1'])) {
$product_title=$_POST['product_title'];
$product_cat=$_POST['product_cat'];
$product_cat=$_POST['cat'];
$product_price=$_POST['product_price'];
$product_desc=$_POST['product_desc'];
$product_keywords=$_POST['product_keywords'];
$product_image1=$_FILES['product_image1']['name'];
$product_image2=$_FILES['product_image2']['name'];
$product_image3=$_FILES['product_image3']['name'];
$temp_name1=$_FILES['product_image1']['tmp_name'];
$temp_name2=$_FILES['product_image2']['tmp_name'];
$temp_name3=$_FILES['product_image3']['tmp_name'];
move_uploaded_file($temp_name1,"product-images/$product_image1");
move_uploaded_file($temp_name2,"product-images/$product_image2");
move_uploaded_file($temp_name3,"product-images/$product_image3");
$insert_product="insert into product(p_cat_id,cat_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_desc,product_ketword)values('$product_cat','$product_cat',NOW(),'$product_title','$product_image1','$product_image2','$product_image3','$product_price','$product_desc','$product_keywords')";
$run_product=mysqli_query($con,$insert_product);
if ($run_product) {
	?>
	<script type="text/javascript">
		alert("Product inserted successfully");
			echo "<script>window.open('index.php?view_product')</script>";
	</script>
	<?php	
}
else{
	?>
	<script type="text/javascript">
		alert("Product not inserted successfully");
	</script>
	<?php
}
}
?>
</body>
</html>
<?php } ?>