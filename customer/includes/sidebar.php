<?php
include "includes/db.php";
?>
<div class="card">
	<div class="card-header">
		<?php
		$session_customer=$_SESSION['customer_email'];
		$get_cust="select * from customers where customer_email='$session_customer'";
		$run_cust=mysqli_query($con,$get_cust);
		$row_customers=mysqli_fetch_array($run_cust);
		$customer_image=$row_customers['customer_image'];
		$customer_name=$row_customers['customer_name'];
		if (!isset($_SESSION['customer_email'])) {
			
		}else{
			echo "<center><img src='customer-images/$customer_image'class='img-thumbnail'><br>Name:$customer_name</center>
	</div>
	";
		}
?>

		
	
	<div class="card-body">
		<ul class="flex-column nav nav-pills">
			<li class="<?php if(isset($_GET['my_order'])){echo "active";} ?> nav-item"><a href="my_account.php?my_order"class="nav-link text-center flex-sm-fill">         <i class="fa fa-list"></i> My Order</a></li>
			<li class="<?php if(isset($_GET['pay_offline'])){echo "active";} ?> nav-item"><a href="my_account.php?pay_offline"class="nav-link text-center"><i class="fa fa-bolt"></i>Pay offline</a></li>
						<li class="<?php if(isset($_GET['my_address'])){echo "active";} ?> nav-item"><a href="my_account.php?my_address"class="nav-link text-center"><i class="fa fa-user"></i>My Address</a></li>
									<li class="<?php if(isset($_GET['edit_act'])){echo "active";} ?> nav-item"><a href="my_account.php?edit_act"class="nav-link text-center"><i class="fa fa-pencil"></i>Edit Account</a></li>
												<li class="<?php if(isset($_GET['change_pas'])){echo "active";} ?>nav-item"><a href="my_account.php?change_pas"class="nav-link text-center"><i class="fa fa-user"></i>Change Password</a></li>
																		<li class="<?php if(isset($_GET['delete_ac'])){echo "active";} ?>nav-item"><a href="my_account.php?delete_ac"class="nav-link text-center"><i class="fa fa-pencil"></i>Delete Account</a></li>
																					<li class="<?php if(isset($_GET['logout'])){echo "active";} ?>nav-item"><a href="my_account.php?logout"class="nav-link text-center"><i class="fa fa-sign-out"></i>Logout</a></li>
		</ul>
	</div>
</div><br>

