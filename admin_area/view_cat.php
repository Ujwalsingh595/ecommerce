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
								
								<th>Category Id</th>
								<th>Category Title</th>
								<th>Category Description</th>
								<th>Delete Category</th>
								<th>Edit Category</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$get_cat="select * from categories";
							$run_cat=mysqli_query($con,$get_cat);
							while ($row_cat=mysqli_fetch_array($run_cat)) {
								$cat_id=$row_cat['cat_id'];
								$cat_title=$row_cat['cat_title'];
								$cat_desc=$row_cat['cat_desc'];
								$i++;
								?><tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $cat_title; ?></td>
								<td><?php echo $cat_desc; ?></td>
								<td><a href="index.php?delete_cat=<?php echo $cat_id; ?>">
									<i class="fa fa-trash-o"></i>Delete
								</a></td>
								<td><a href="index.php?edit_cat=<?php echo $cat_id; ?>">
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