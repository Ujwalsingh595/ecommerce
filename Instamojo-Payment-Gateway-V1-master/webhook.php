<?php
 include "includes/db.php";
$data = $_POST;
$mac_provided = $data['mac'];  // Get the MAC from the POST data
unset($data['mac']);  // Remove the MAC key from the data.

$ver = explode('.', phpversion());
$major = (int) $ver[0];
$minor = (int) $ver[1];

if($major >= 5 and $minor >= 4){
     ksort($data, SORT_STRING | SORT_FLAG_CASE);
}
else{
     uksort($data, 'strcasecmp');
}

// You can get the 'salt' from Instamojo's developers page(make sure to log in first): https://www.instamojo.com/developers
// Pass the 'salt' without the <>.
$mac_calculated = hash_hmac("sha1", implode("|", $data), "2f58e7ac324e46efa47ce1b9a4dcd34e");

if($mac_provided == $mac_calculated){
    echo "MAC is fine";
    // Do something here
    if($data['status'] == "Credit"){
       // Payment was successful, mark it as completed in your database  
             
               $purpose=$data['purpose'];
               $amount=$data['amount'];
               $name=$data['buyer_name'];
               $email=$data['buyer'];
               $phone=$data['buyer_phone'];
               $pid=$data['payment_id'];
               $status=$data['status'];

               $sql="insert into online_payment(purpose,amount,name,email,phone,payment_id,status)values('$purpose','$amount','$name','$email','$phone','$pid','$status')";
               mysqli_query($con,$sql);

               

    }
    else{
       // Payment was unsuccessful, mark it as failed in your database
    }
}
else{
    echo "Invalid MAC passed";
}
?>
