<h3 class="text-center text-success">All categories</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>Category ID</th>
            <th>Category Title</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $result = mysqli_query($con,"select * from categories");
        while($row_data=mysqli_fetch_assoc($result)){
            echo "
            <tr>
                <td>".$row_data['category_id']."</td>
                <td>".$row_data['category_title']."</td>
                <td><a class='text-light' href='index.php?edit_category=".$row_data['category_id']."'>Edit</a></td>
            <tr>";
        }
        ?>
    
    </tbody>
</table>