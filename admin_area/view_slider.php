<div class="row">
	<div class="col-lg-12">
		<ul class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i>Dashboard/View Slider
			</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h3>
					<i  class="fa fa-money fa-fw"></i>View Slider
				</h3>
			</div>
			<?php
							$get_slider="select * from slider";
							$run_slider=mysqli_query($con,$get_slider);
							while ($row_slider=mysqli_fetch_array($run_slider)) {
								$slider_id=$row_slider['id'];
								$slider_name=$row_slider['slider_name'];
								$slider_images=$row_slider['slider_images'];	
								
							
							?>
			<div class="card-body">
				<h3><center><?php echo $slider_name; ?></center></h3>
						<img src="..images/<?php echo $slider_images ?>"class="img-fluid">
				
			
			<div class="card-footer">
				<a href="index.php?delete_slider=<?php echo $slider_id; ?>"class="float-left"><i class="fa fa-trash-o"></i>Delete</a>
				<a href="index.php?edit_slider=<?php echo $slider_id; ?>"class="float-right"><i class="fa fa-pencil"></i>Edit</a>
				<?php
			}
			?>
			</div>
		</div>
	</div>
</div>