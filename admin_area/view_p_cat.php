<div class="row">
	<div class="col-lg-12">
		<ul class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i>Dashboard/View Products Category
			</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h3>
					<i  class="fa fa-money fa-fw"></i>View Product Category
				</h3>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								
								<th>Product Category Id</th>
								<th>Product Category Title</th>
								<th>Product Category Description</th>
								<th>Delete Product Category</th>
								<th>Edit Product Category</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$get_p_cat="select * from product_category";
							$run_p_cat=mysqli_query($con,$get_p_cat);
							while ($row_p_cat=mysqli_fetch_array($run_p_cat)) {
								$p_cat_id=$row_p_cat['p_cat_id'];
								$p_cat_title=$row_p_cat['p_cat_title'];
								$p_cat_desc=$row_p_cat['p_cat_desc'];
								$i++;
								?><tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $p_cat_title; ?></td>
								<td><?php echo $p_cat_desc; ?></td>
								<td><a href="index.php?delete_p_cat=<?php echo $p_cat_id; ?>">
									<i class="fa fa-trash-o"></i>Delete
								</a></td>
								<td><a href="index.php?edit_p_cat=<?php echo $p_cat_id; ?>">
									<i class="fa fa-pencil"></i>Edit
								</a></td>
							</tr>
								<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>