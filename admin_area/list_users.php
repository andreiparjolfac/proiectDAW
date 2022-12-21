<h3 class="text-center text-success">
    All users
</h3>
<?php
        $result = mysqli_query($con,"select * from user_table where disabled='false'");
        $row_count = mysqli_num_rows($result);
        if($row_count==0){
            echo "<h2 class='text-danger text-center mt-5'>No users registered!</h2>";
        }else{
            echo"<table class='table table-bordered mt-5'>
            <thead class='bg-info'>
                <tr>
                    <th>UID</th>
                    <th>UserName</th>
                    <th>User Email</th>
                    <th>User Image</th>
                    <th>User Address</th>
                    <th>User Mobile</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody class='bg-secondary text-light' >";
            while($row_data = mysqli_fetch_assoc($result)){
                echo "        
                <tr>
                <td>".$row_data['user_id']."</td>
                <td>".$row_data['user_username']."</td>
                <td>".$row_data['user_email']."</td>
                <td><img class='admin_image' src='../users_area/users_images/".$row_data['user_image']."' alt='".$row_data['user_username']."'></td>
                <td>".$row_data['user_address']."</td>
                <td>".$row_data['user_mobile']."</td>
                <td><a href='index.php?delete_user=".$row_data['user_id']."' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                </tr>";
            }

            echo "    </tbody>
            </table>";
        }

?>
