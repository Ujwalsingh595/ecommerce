<?php
$db=mysqli_connect("localhost","root","","ecom");
function getuserip(){
	switch (true) {
		case (!empty($_SERVER['HTTP_X_REAL_IP'])):return $_SERVER['HTTP_X_REAL_IP'];
			case (!empty($_SERVER['HTTP_CLIENT_IP'])):return $_SERVER['HTTP_CLIENT_IP'];
				case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):return $_SERVER['HTTP_X_FORWARDED_FOR'];
					default : return $_SERVER['REMOTE_ADDR'];
	}
}
function addcart(){
	global $db;
	if (isset($_GET['add_cart'])) {
		$ip_add=getuserip();
		$p_id=$_GET['add_cart'];
		$product_qty=$_POST['product_qty'];
		$product_size=$_POST['product_size'];
		$check_pro="select * from cart  where ip_add='$ip_add AND p_id='$p_id'";
		$run_check=mysqli_query($db,$check_pro);
		if (mysqli_num_rows($run_check)>0) {
			echo "<script>alert('This product is already added in your cart')</script>";
			echo "<script>window.open(details.php?pro_id=$p_id','_self')</script>";
		}else{
			$query="insert into cart(p_id,ip_add,qty,size)values('$p_id','$ip_add','$product_qty','$product_size')";
			$run_query=mysqli_query($db,$query);
			echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
		}
	}
}
function items(){
global $db;
$ip_add=getuserip();
$get_items="select * from cart where ip_add='$ip_add'";
$run_item=mysqli_query($db,$get_items);
$count=mysqli_num_rows($run_item);
echo $count;
}
function price(){
	global $db;
	$ip_add=getuserip();
	$total=0;
	$select_cart="select * from cart where ip_add='$ip_add'";
	$run_cart=mysqli_query($db,$select_cart);
	while($record=mysqli_fetch_array($run_cart))
	{
		$pro_id=$record['p_id'];
		$pro_qty=$record['qty'];
		$get_price="select * from product where product_id='$pro_id'";
		$run_price=mysqli_query($db,$get_price);
		while ($row=mysqli_fetch_array($run_price)) {
			$sub_total=$row['product_price']*$pro_qty;
			$total +=$sub_total;
		}
	}
	echo "$total";
}
function getPro(){
	global $db;
	$get_product="select * from product order by 1 DESC LIMIT 0,6";
	$run_product=mysqli_query($db,$get_product);
	while ($row_product=mysqli_fetch_array($run_product)) {
		$product_id=$row_product['product_id'];
		$product_title=$row_product['product_title'];
		$product_price=$row_product['product_price'];
		$product_image1=$row_product['product_img1'];
		echo "<div class='col-md-4 col-sm-6'>
<div class='product'>
<a href='details.php?pro_id=$product_id'>
<img src='admin_area/product-images/$product_image1'class='img-thumbnail'>
</a>
<div class='text'>
<h3><a href='details.php?pro_id=$product_id'>$product_title</a></h3>
<p class='price'>INR $product_price</p>
<p class='buttons text-center'><a href='details.php?pro_id=$product_id'class='btn btn-success'>View Details</a>
<a href='details.php?pro_id=$product_id'class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add to cart</a></p>
</div>
</div>
		</div>";
	}
}
/*Product Categories*/
function getProduct(){
		global $db;
		$get_p_cats="select * from product_category";
$run=mysqli_query($db,$get_p_cats);
while ($row=mysqli_fetch_array($run)) {
	$p_cat_id=$row['p_cat_id'];
	$p_cat_title=$row['p_cat_title'];
	echo "<li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a></li>";
}
	}
	function  getcats(){
	global $db;
		$get_cats="select * from categories";
$run=mysqli_query($db,$get_cats);
while ($row=mysqli_fetch_array($run)) {
	$cat_id=$row['cat_id'];
	$cat_title=$row['cat_title'];
	echo "<li><a href='shop.php?cat_id=$cat_id'>$cat_title</a></li>";
}
}
/*get product categories*/
function getpcatpro(){
	global $db;
	if (isset($_GET['p_cat'])) {
		$p_cat_id=$_GET['p_cat'];
		$get_p_cat="select * from product_category where p_cat_id='$p_cat_id'";
		$run=mysqli_query($db,$get_p_cat);
		$row_p_data=mysqli_fetch_array($run);
		$p_cat_title=$row_p_data['p_cat_title'];
		$p_cat_desc=$row_p_data['p_cat_desc'];
		$get_products="select * from product where p_cat_id=$p_cat_id";
		$run_product=mysqli_query($db,$get_products);
		$count=mysqli_num_rows($run_product);
		if ($count==0) {
			echo "<div class='box'>
			<h1>No Product found  in this product  category.</h1></div>";
		}
		else{
			/*echo "<div class='box'>
			<h1 class='text-center'>$p_cat_title</h1>
			<p class='text-center'>$p_cat_desc</p></div>";*/
		}
		while ($row_product=mysqli_fetch_array($run_product)) {
			$pro_id=$row_product['product_id'];
				$pro_title=$row_product['product_title'];
					$pro_price=$row_product['product_price'];
						$pro_img1=$row_product['product_img1'];
						echo "<div class='col-md-4 col-sm-6'>
						<div class='product'>
						<a href='details.php?pro_id=$pro_id'>
						<img src='admin_area/product-images/$pro_img1'class='img-fluid'></a>
						<div class='text'>
						<h3><a href='details.php?pro_id=$pro_id'>$pro_title
						</a></h3>
						<p class='price'>INR $pro_price</p>
						<p class='buttons text-center'>
						<a  href='details.php?pro_id=$pro_id'class='btn btn-primary'>View Details</a>
						<a  href='details.php?pro_id=$pro_id'class='btn btn-success'><i class='fa fa-shopping-cart'></i>Add to cart</a>
						</p></div></div>
						</div>";
		}
	}
}
/*get categories*/
function getcatspro(){
	global $db;
	if (isset($_GET['cat_id'])) {
		$cat_id=$_GET['cat_id'];
		$get_cat="select * from categories where cat_id='$cat_id'";
		$run=mysqli_query($db,$get_cat);
		$row=mysqli_fetch_array($run);
		$cat_title=$row['cat_title'];
		$cat_desc=$row['cat_desc'];
		$get_products="select * from  product where cat_id='$cat_id'";
		$run_product=mysqli_query($db,$get_products);
		$count=mysqli_num_rows($run_product);
		if ($count==0) {
			echo "<div class='box'>
			<h1>No Product found  in this product  category.</h1></div>";
		}
		while ($row_product=mysqli_fetch_array($run_product)) {
			$pro_id=$row_product['product_id'];
				$pro_title=$row_product['product_title'];
					$pro_price=$row_product['product_price'];
						$pro_img1=$row_product['product_img1'];
						echo "<div class='col-md-4 col-sm-6'>
						<div class='product'>
						<a href='details.php?pro_id=$pro_id'>
						<img src='admin_area/product-images/$pro_img1'class='img-fluid'></a>
						<div class='text'>
						<h3><a href='details.php?pro_id=$pro_id'>$pro_title
						</a></h3>
						<p class='price'>INR $pro_price</p>
						<p class='buttons text-center'>
						<a  href='details.php?pro_id=$pro_id'class='btn btn-primary'>View Details</a>
						<a  href='details.php?pro_id=$pro_id'class='btn btn-success'><i class='fa fa-shopping-cart'></i>Add to cart</a>
						</p></div></div>
						</div>";
		}
	}
}
?>