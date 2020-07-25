<?php
include "includes/db.php";

?>
<div class="card sidebar-menu">
	<div class="card-header">
		<h4  class="card-title">Product Categories</h4>
	</div>
	<div class="card-body">
		<ul class="nav-stacked category-menu">
			<?php
             getProduct();
                ?>
			
		</ul>
	</div>
</div><br>
<div class="card sidebar-menu">
	<div class="card-header">
		<h4  class="card-title">Categories</h4>
	</div>
	<div class="card-body">
		<ul class="nav-stacked category-menu">
			<?php
getcats();
			?>
			
		</ul>
	</div>
</div>
