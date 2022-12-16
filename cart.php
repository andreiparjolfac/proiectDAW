<?php
include('./includes/connect.php');
include('./functions/common.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart details</title>
    <!-- bootstrap css link -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style.css">
    <style>
        .cart_img{
    width: 80px;
    height: 80px;
}
    </style>
</head>

<body>

    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-danger">
            <div class="container-fluid">

                <img src="./images/logo.png" alt="Logo site" class="logo">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php
                            echo cart_item_num();
                            ?></sup></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php
        cart();
        ?>

        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </nav>

        <div class="bg-light">
            <h3 class="text-center">
                e-Library
            </h3>
            <p class="text-center">
                project is a WIP
            </p>
        </div>

        <div class="container">
            <div class="row">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colspan="2">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        global $con;
                        $ip = getIPAddress();                       
                        $result_query = mysqli_query($con,"select * from cart_details where ip_address='$ip'");
                        while($row=mysqli_fetch_assoc($result_query)){
                            $product_id = $row['product_id'];
                            $product_quantity = $row['quantity'];
                            $product= mysqli_fetch_assoc( mysqli_query($con,"select * from products where product_id=$product_id") );
                            $product_title = $product['product_title'];
                            $product_image1 = $product['product_image1'];
                            $product_price = $product['product_price'];
                            $total_price = $product_quantity * $product_price ;
                            echo "
                            <tr>
                            <td>$product_title</td>
                            <td><img src='./admin_area/product_images/$product_image1' class='cart_img' alt='$product_image1'></td>
                            <td><input type='text' class='form-input w-50' name='' id='' value='$product_quantity'></td>
                            <td>$total_price</td>
                            <td><input type='checkbox' name='' id=''></td>
                            <td>
                                <button class='bg-info px-3 py-2 mx-3 border-0'>Update</button>
                                <button class='bg-info px-3 py-2 mx-3 border-0'>Remove</button>
                            </td>
                        </tr>
                            ";

                        }

                        ?>
                    </tbody>
                </table>
                <div class="d-flex mb-5">
                    <h4 class="px-3">Subtotal: <strong class="text-info"> <?php
                    total_cart_price();
                    ?></strong></h4>
                    <a href="index.php"><button class="bg-info px-3 py-2 mx-3 border-0">Continue Shopping</button></a>
                    <a href="#"><button class="bg-secondary text-light px-3 py-2 border-0">Checkout</button></a>
                </div>
            </div>
        </div>


        <?php
            include("./includes/footer.php");
        ?>
    </div>
    <!-- bootstrap js link -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>