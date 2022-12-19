<?php
include("./functions/common.php");

if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];

    $ip = getIPAddress();
    $query_result = mysqli_query($con,"select * from cart_details where ip_address = '$ip'");
    $no_of_items = 0;
    while($row_data = mysqli_fetch_assoc( $query_result)){
        $no_of_items+=$row_data['quantity'];
    }

    $total_price = total_cart_price();
    $invoice_number = mt_rand();
    $status = 'pending';

    $insert_order="insert into user_orders 
    (user_id,amount_due,invoice_number,total_products,order_date,order_status) values
    ($user_id,$total_price,$invoice_number,$no_of_items,NOW(),'$status')";
    $result=mysqli_query($con,$insert_order);
    $empty_cart = "delete from cart_details where ip_address = '$ip'";
    mysqli_query($con,$empty_cart);
    if($result){
        echo "<script>alert('Order submitted successfully!');
        window.open('profile.php','_self');
        </script>";
    }


}
?>