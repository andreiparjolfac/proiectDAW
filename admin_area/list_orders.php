<h3 class="text-center text-success">
    All orders
</h3>
<?php
        $result = mysqli_query($con,"select * from user_orders");
        $row_count = mysqli_num_rows($result);
        if($row_count==0){
            echo "<h2 class='text-danger text-center mt-5'>No orders yet!</h2>";
        }else{
            echo"<table class='table table-bordered mt-5'>
            <thead class='bg-info'>
                <tr>
                    <th>Order ID</th>
                    <th>Amount Due</th>
                    <th>Invoice No</th>
                    <th>Total Products</th>
                    <th>Order Date</th>
                    <th>Payment status</th>
                </tr>
            </thead>
            <tbody class='bg-secondary text-light' >";
            while($row_data = mysqli_fetch_assoc($result)){
                echo "        
                <tr>
                <td>".$row_data['order_id']."</td>
                <td>".$row_data['amount_due']."</td>
                <td>".$row_data['invoice_number']."</td>
                <td>".$row_data['total_products']."</td>
                <td>".$row_data['order_date']."</td>
                <td>".$row_data['order_status']."</td>
                </tr>";
            }

            echo "    </tbody>
            </table>";
        }

?>
