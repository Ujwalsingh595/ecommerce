<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<h4>Pages</h4>
				<ul>
					<li>
						<a href="./cart.php">Shopping Cart</a>
					</li>
					<li>
						<a href="contact.php">Contact Us</a>
					</li>
					<li>
						<a href="./shop.php">Shop</a>
					</li>
					<li>
						<a href="./checkout.php">Checkout</a>
					</li>
					<li>
						<a href="../customer/my_acount.php">My Account</a>
					</li>
				</ul>
				<hr>
				<ul>
					<li><a href="../customer/customer_login.php">Login</a></li>
					<li>
						<a href="../registration.php">Register</a>
					</li>
				</ul>
				<hr class="hidden-md hidden-lg hidden-sm">
			</div>
			<div class="col-md-3 col-sm-6">
				<h4>Top Product Categories</h4>
				<ul>
					<?php
$get_p_data="select * from product_category";
$run=mysqli_query($con,$get_p_data);
while ($row=mysqli_fetch_array($run)) {
	$p_cat_id=$row['p_cat_id'];
	$p_cat_title=$row['p_cat_title'];
	echo "<li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a></li>";
}
					?>
				</ul>
				<hr class="hidden-sm hidden-lg">
			</div>
			<div class="col-md-3 col-sm-6">
				<h4>Where to Find Us</h4>
				<p><strong>sporevent.com</strong>
					<br>Jamshedpur
					<br>
				<br>ujwalsingh595@gmail.com<br>
			7050461529</p>
			<a href="">Goto Contact Us Page</a>
			<hr>
			</div>
			<div class="col-md-3 col-sm-6">
				<h4>Get the news</h4>
				<p class="text-muted">
					Subscribe here for getting news of jamshedpur
				</p>
				<hr>
				<h4>Stay in  touch</h4>
				<p class="social">
					<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-twitter"></i></a>
							<a href=""><i class="fa fa-instagram"></i></a>
								<a href=""><i class="fa fa-google-plus"></i></a>
				</p>
			</div>
		</div>
	</div>
</div>
<div id="copyright">
	<div class="container">		
			<p class="float-left ">
				&copy; 2020 Ujwal Kumar
			</p>
		
			<p class="float-right">
				Designed & developed by Ujwal
			</p>
		</div>

	
</div>