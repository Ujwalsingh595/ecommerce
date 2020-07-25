<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('admin_login.php','_self')</script>";
}
else{
?>
<div class="row">
	<div class="col-lg-12">
		<ul class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard/View Product
			</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<i class="fa fa-money fa-fw"></i><h3>View Products</h3>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<th>Product Id</th>
							<th>Product title</th>
							<th>Product Image</th>
							<th>Product Price</th>
							<th>Product Keyword</th>
							<th>Product Date</th>
							<th>Product Delete</th>
							<th>Product Edit</th>
						</thead>
						<tbody>
							<?php
							$i=0;
							$get_product="select  * from product";
							$run_product=mysqli_query($con,$get_product);
							while ($row=mysqli_fetch_array($run_product)) {
								$pro_id=$row['product_id'];
									$product_title=$row['product_title'];
										$product_img1=$row['product_img1'];
											$product_price=$row['product_price'];
												$product_keywords=$row['product_ketword'];
													$pro_date=$row['date'];
														$i++;
							
							?>
							<tr>
								<td><?php echo $i ?></td>
									<td><?php echo $product_title ?></td>
										<td><img src="product-images/<?php echo $product_img1 ?>"width="100"height="100"></td>

												<td><?php echo $product_price ?></td>
												<td><?php echo $product_keywords ?></td>
												<td><?php echo $pro_date ?></td>

												<td>
													<a href="index.php?delete_product=
													<?php echo $pro_id ?>"><i class="fa fa-trash-o"></i>Delete</a>
												</td>
												<td>
													<a href="index.php?edit_product=
													<?php echo $pro_id ?>"><i class="fa fa-pencil"></i>Edit</a>
												</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php } ?>