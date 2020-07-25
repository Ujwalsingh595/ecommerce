<div class="row">
	<div class="col-lg-12">
		<ul class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i>Dashboard/View Customer
			</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h3>
					<i  class="fa fa-money fa-fw"></i>View Customer
				</h3>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								
								<th>Customer No.</th>
								<th>Customer Name</th>
								<th>Customer Email</th>
								<th>Customer Image</th>
								<th>Customer Country</th>
								<th>Customer City</th>
								<th>Customer Phone no:</th>
								<th>Customer Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$get_c="select * from customers";
							$run_c=mysqli_query($con,$get_c);
							while ($row_c=mysqli_fetch_array($run_c)) {
								$c_id=$row_c['customer_id'];
								$c_name=$row_c['customer_name'];
								$c_email=$row_c['customer_email'];
								$c_image=$row_c['customer_image'];
								$c_country=$row_c['customer_country'];
								$c_city=$row_c['customer_city'];
								$c_contact=$row_c['customer_contact'];
								$i++;
								?><tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $c_name; ?></td>
								<td><?php echo $c_email; ?></td>
								<td><img src="../customer/customer-images/<?php echo $c_image; ?>"width="100px"height="100px"></td>
								<td><?php echo $c_country; ?></td>
								<td><?php echo $c_city; ?></td>
								<td><?php echo $c_contact; ?></td>
								<td><a href="index.php?cust_del=<?php echo $c_id; ?>">
									<i class="fa fa-trash-o"></i>Delete
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