<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .product_img{
            width: 50px;
            height: 100%;
        }
    </style>
</head>
<body>
    <h3 class="text-center text-success">All products</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr>
                <th>Product ID</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
            $result = mysqli_query($con,"select * from products");
            while($row_data = mysqli_fetch_assoc($result)){
                echo "            
                <tr class='text-center'>
                <td>".$row_data['product_id']."</td>
                <td>".$row_data['product_title']."</td>
                <td><img class='product_img' src='./product_images/".$row_data['product_image1']."' alt='".$row_data['product_title']."'></td>
                <td>".$row_data['product_price']."</td>
                <td>".$row_data['status']."</td>
                <td><a href='index.php?edit_product=".$row_data['product_id']."' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_product=".$row_data['product_id']."' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>";
            }
            ?>

        </tbody>
    </table>
    
</body>
</html>