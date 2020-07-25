<?php
if (isset($_GET['edit_product'])) {
	$edit_id=$_GET['edit_product'];
	$get_p="select * from product  where product_id='$edit_id'";
	$run_edit=mysqli_query($con,$get_p);
	$row_edit=mysqli_fetch_array($run_edit);
	$p_id=$row_edit['product_id'];
	$p_title=$row_edit['product_title'];
	$p_cat=$row_edit['p_cat_id'];
	$cat_id=$row_edit['cat_id'];
	$product_img1=$row_edit['product_img1'];
	$product_img2=$row_edit['product_img2'];
	$product_img3=$row_edit['product_img3'];
	$p_price=$row_edit['product_price'];
	$p_desc=$row_edit['product_desc'];
	$p_keyword=$row_edit['product_ketword'];
}
$get_p_cat="select * from product_category where p_cat_id='$p_cat'";
$run_p_cat=mysqli_query($con,$get_p_cat);
$row_p_cat=mysqli_fetch_array($run_p_cat);
$p_cat_title=$row_p_cat['p_cat_title'];
$get_cat="select  * from categories where cat_id='$cat_id'";
$run_cat=mysqli_query($con,$get_cat);
$row_cat=mysqli_fetch_array($run_cat);
$cat_title=$row_cat['cat_title'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Products</title>
</head>
<body>
<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard/Edit  Products
			</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h3>
				<i class="fa fa-money fa-fw"></i>Edit Products
			</h3></div>
		<div class="card-body">
			<form method="post"enctype="multipart/form-data">
<div class="form-group">
	<label class="col-md-3">Product title</label>
	<input type="text" name="product_title"class="form-control"value="<?php echo $p_title ?>"required>
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
	<input type="text" name="product_price"class="form-control"value="<?php echo $p_price ?>"required>
</div>
<div class="form-group">
	<label class="col-md-3">Product keyword</label>
	<input type="text" name="product_keywords"class="form-control"value="<?php echo $p_keyword ?>"required>
</div>
<div class="form-group">
	<label class="col-md-3">Product description</label>
<textarea name="product_desc"class="form-control"rows="6"cols="19"><?php echo $p_desc ?></textarea>
</div>
<div class="form-group">

	<input type="submit" name="update"class="btn btn-primary"value="insert product"required>
</div>
	</form>	
		</div>
		</div>
	</div>
</div>
</body>
</html>
<?php
if (isset($_POST['update'])) {
$product_title=$_POST['product_title'];
$product_cat=$_POST['product_cat'];
$cat=$_POST['cat'];
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
$update_product="update product set p_cat_id='$product_cat',cat_id='$cat',date=NOW(),product_title='$product_title',product_img1='$product_image1',product_img2='$product_image2',product_img3='$product_image3',product_price='$product_price',product_desc='$product_desc',product_ketword='$product_keywords'where product_id='$p_id'";
$run_product=mysqli_query($con,$update_product);
if ($run_product) {
	echo "<script>alert('Product updated Successfully')</script>";
	echo "<script>window.open('index.php?view_product','_self')</script>";
}
}
?>