<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>Brand ID</th>
            <th>Brand Title</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $result = mysqli_query($con,"select * from brands");
        while($row_data=mysqli_fetch_assoc($result)){
            echo "
            <tr>
                <td>".$row_data['brand_id']."</td>
                <td>".$row_data['brand_title']."</td>
                <td><a class='text-light' href='index.php?edit_brand=".$row_data['brand_id']."'>Edit</a></td>
            <tr>";
        }
        ?>
    
    </tbody>
</table>