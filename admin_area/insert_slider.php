<div class="row">
	<div class="col-lg-12">
		<ul class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i>Dashboard/Insert Slider
			</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div  class="card-header"><h3>
				<i class="fa fa-money fa-fw"></i>Insert Slider</h3>
			</div>

			<div class="card-body">
				<form class="form-horizontal"action=""method="post">
					<div class="form-group">
						<label class="col-md-3">Slider Name:</label>
						<div class="col-md-6">
							<input type="text" name="slider_name"class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3">Slider Image</label>
						<div class="col-md-6">
							<input type="file" name="slider_image"class="form-control">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6">
							<input type="submit" name="submit"value="submit"class="btn btn-primary form-control">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
if (isset($_POST['submit'])) {
	$slider_name=$_POST['slider_name'];
	$slider_image=$_FILES['slider_image']['name'];
	$temp_name=$_FILES['slider_image']['tmp_name'];
	$view_slides="select * from slider";
	$view_run_slides=mysqli_query($con,$view_slides);
	$count=mysqli_num_rows($view_run_slides);
	if ($count<4) {
		move_uploaded_file($temp_name,"..images/$slider_image");
		$insert_slide="insert into  slider (slider_name,slider_images)values('$slider_name','$slider_image')";
		$run_slide=mysqli_query($con,$insert_slide);
		echo "<script>alert('New Slide  has been  inserted')</script>";
		echo "<script>window.location('index.php?view_slider','_self')</script>";
	}
	else{
		echo "<script>alert('You have already  inserted  4 slides')</script>";
	}
}
?>