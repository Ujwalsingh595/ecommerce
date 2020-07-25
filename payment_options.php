<div class="box">
<?php
$session_email=$_SESSION['customer_email'];
$select_cust="select  * from  customers where customer_email='$session_email'";
$run_cust=mysqli_query($con,$select_cust);
$row=mysqli_fetch_array($run_cust);
$customer_id=$row['customer_id'];
?>
		<h1  class="text-center">Payment  options</h1>
		<p class="lead  text-center"><a href="order.php?c_id=<?php echo $customer_id ?>">Pay Offline</a></p>
	<center>
		<p>
		<a href="order_online.php?c_id=<?php echo $customer_id ?>"><strong>Pay Online</strong></a>
		</p>
		<img src="images/5.jpg">
	</center>
</div>