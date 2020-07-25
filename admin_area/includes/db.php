<?php
$con=mysqli_connect("localhost","root","","ecom");
if ($con) {
	?>
	<script type="text/javascript">
	
	</script>
	<?php	
}
else{
	?>
	<script type="text/javascript">
		alert("Connection not successfull");
	</script>
	<?php
}
?>