<div class="d-flex">
	<div class="sidebar">
		<div class="sidebar-heading">
		<p class="text-center">Admin Panel</p>
	</div>
	<ul class="list-group">
		<li>
		<a href="index.php?dashboard"class="list-group-item list-group-item-action">
			<i class="fa fa-fw fa-dashboard"></i>Dashboard
		</a>
	</li>
	<ul class="list-group">
	<li>
		<a href=""class="list-group-item list-group-item-action"data-toggle="collapse"data-target=#products>
			<i class="fa fa-fw fa-table"></i>Product
		</a></li>
		<li class="collapse"id="products">
			<a href="index.php?insert_product">Insert Product</a>
		</li>
		<li class="collapse"id="products">
			<a href="index.php?view_product">View Product</a>
		</li></ul>
		<a href=""class="list-group-item list-group-item-action"data-toggle="collapse"data-target=#products_cat>
			<i class="fa fa-fw fa-caret-down"></i>Product Categories
		</a><li class="collapse"id="products_cat">
			<a href="index.php?insert_p_cat">Insert Product Cat</a>
		</li>
		<li class="collapse"id="products_cat">
			<a href="index.php?view_p_cat">View Product Cat</a>
		</li>
		<a href=""class="list-group-item list-group-item-action"data-toggle="collapse"data-target=#products_c>
			<i class="fa fa-fw fa-table"></i>Categories
		</a>
		<li class="collapse"id="products_c">
			<a href="index.php?insert_cat">Insert Category</a>
		</li>
		<li class="collapse"id="products_c">
			<a href="index.php?view_cat">View Category</a>
		</li>
		<a href=""class="list-group-item list-group-item-action"data-toggle="collapse"data-target=#products_s>
			<i class="fa fa-fw fa-table"></i>Slider
		</a>
		<li class="collapse"id="products_s">
			<a href="index.php?insert_slider">Insert Slider</a>
		</li>
		<li class="collapse"id="products_s">
			<a href="index.php?view_slider">View Slider</a>
		</li>
		<a href="index.php?view_cust"class="list-group-item list-group-item-action"data-toggle="collapse"data-target=#product_view>
			<i class="fa fa-fw fa-edit"></i>View Customer
			<li class="collapse"id="product_view">
				<a href="index.php?view_cust">View Customer</a>
			</li>
		</a>
		<a href=""class="list-group-item list-group-item-action"data-toggle="collapse"data-target=#produc>
			<i class="fa fa-fw fa-list"></i>View Order
		</a>
		<a href=""class="list-group-item list-group-item-action"data-toggle="collapse"data-target=#products_pro><i class="fa fa-user"></i><?php echo $admin_name ?>
		<a href=""class="list-group-item list-group-item-action"data-toggle="collapse"data-target=#produc>
			<i class="fa fa-fw fa-edit"></i>View Payments
		</a>
		<a href=""class="list-group-item list-group-item-action"data-toggle="collapse"data-target=#products_u>
			<i class="fa fa-fw fa-edit"></i>Users
		</a>
		<li class="collapse"id="products_u">
			<a href="">Insert User</a>
		</li>
		<li class="collapse"id="products_u">
			<a href="">View User</a>
		</li>

	</ul>
</div>

</div>
