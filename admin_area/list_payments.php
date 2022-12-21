<h3 class="text-center text-success">
    All payments
</h3>
<?php
        $result = mysqli_query($con,"select * from user_payments");
        $row_count = mysqli_num_rows($result);
        if($row_count==0){
            echo "<h2 class='text-danger text-center mt-5'>No payments yet!</h2>";
        }else{
            echo"<table class='table table-bordered mt-5'>
            <thead class='bg-info'>
                <tr>
                    <th>Payment ID</th>
                    <th>Order ID</th>
                    <th>Payment Mode</th>
                    <th>Order Date</th>

                </tr>
            </thead>
            <tbody class='bg-secondary text-light' >";
            while($row_data = mysqli_fetch_assoc($result)){
                echo "        
                <tr>
                <td>".$row_data['payment_id']."</td>
                <td>".$row_data['order_id']."</td>
                <td>".$row_data['payment_mode']."</td>
                <td>".$row_data['date']."</td>
                </tr>";
            }

            echo "    </tbody>
            </table>";
        }

?>
