<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My orders</title>
</head>
<?php
include("./googleanalitycs.php");
?>
<body>
    <?php
    $username = $_SESSION['username'];
    $user_id = mysqli_fetch_assoc(mysqli_query($con,"select * from user_table where user_username = '$username'"))['user_id'];

 ?>
    <div class="text-center">
        <h3 class="text-success"> All my orders</h3>
        <table class="table table-bordered mt-5">
            <thead class="bg-info">
                <tr>
                    <th>Order Number</th>
                    <th>Amount Due</th>
                    <th>Total Products</th>
                    <th>Invoice number</th>
                    <th>Date</th>
                    <th>Payment status</th>
                    <th>Pay</th>

                </tr>
            </thead>
            <tbody class="bg-secondary text-light">
                <?php
                $orders = mysqli_query($con,"select * from user_orders where user_id=$user_id");
                while($row_data=mysqli_fetch_assoc($orders)){
                    echo "                
                    <tr>
                    <td>".$row_data['order_id']."</td>
                    <td>".$row_data['amount_due']."</td>
                    <td>".$row_data['total_products']."</td>
                    <td>".$row_data['invoice_number']."</td>
                    <td>".$row_data['order_date']."</td>
                    <td>".$row_data['order_status']."</td>";
                    if($row_data['order_status']=="pending")
                    echo "<td><a href='confirm_payment.php?order_id=".$row_data['order_id']."' class='text-light'>Confirm</a></td>
                    </tr>";
                    else 
                    echo "<td>Paid</td>
                    </tr>";
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>