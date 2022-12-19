<?php
include('./includes/connect.php');
include('./functions/common.php');
session_start();
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
        .cart_img {
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
                        <?php
                        if (!isset($_SESSION['username'])) {
                            echo "                        <li class='nav-item'>
                            <a class='nav-link' href='user_registration.php'>Register</a>
                        </li>";
                        } else {
                            echo "                        <li class='nav-item'>
                            <a class='nav-link' href='profile.php'>My account</a>
                        </li>";
                        }

                        ?>
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
                <?php
                if (!isset($_SESSION['username'])) {
                    echo "                <li class='nav-item'>
                                    <a class='nav-link' href='user_login.php'>Welcome Guest</a>
                                </li>";
                } else {
                    $username = $_SESSION['username'];
                    echo "                <li class='nav-item'>
                                    <a class='nav-link' href='logout.php'>Welcome $username</a>
                                </li>";
                }
                if (!isset($_SESSION['username'])) {
                    echo "                <li class='nav-item'>
                    <a class='nav-link' href='user_login.php'>Login</a>
                </li>";
                } else {
                    echo "                <li class='nav-item'>
                    <a class='nav-link' href='logout.php'>Logout</a>
                </li>";
                }
                ?>
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
                <form action="cart.php" method="POST">
                    <table class="table table-bordered text-center">
                        <?php
                        global $con;
                        $ip = getIPAddress();
                        $result_query = mysqli_query($con, "select * from cart_details where ip_address='$ip'");
                        $num_of_products = mysqli_num_rows($result_query);
                        if ($num_of_products > 0) {
                            echo "                        
                                <thead>
                                <tr>
                                    <th>Product Title</th>
                                    <th>Product Image</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Remove</th>
                                    <th colspan='2'>Operations</th>
                                </tr>
                                </thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_assoc($result_query)) {
                                $product_id = $row['product_id'];
                                $product_quantity = $row['quantity'];
                                $product = mysqli_fetch_assoc(mysqli_query($con, "select * from products where product_id=$product_id"));
                                $product_title = $product['product_title'];
                                $product_image1 = $product['product_image1'];
                                $product_price = $product['product_price'];
                                $total_price = $product_quantity * $product_price;
                                echo "
                                    <tr>
                                    <td>$product_title</td>
                                    <td><img src='./admin_area/product_images/$product_image1' class='cart_img' alt='$product_image1'></td>
                                    <td><input type='text' class='form-input w-50' name='quantity' id='' value='$product_quantity'></td>
                                    <td>$total_price</td>
                                    <td><input type='checkbox' name='checkeditems[]' id='' value='$product_id'></td>
                                    <td>
                                        <input type='submit' class='bg-info px-3 py-2 mx-3 border-0' value='Update Cart' name='update_cart'>
                                    </td>
                                </tr>
                                    ";
                            }
                        } else {
                            echo "<h2 class='text-danger text-center'>Cart is empty!</h2>";
                        }

                        if (isset($_POST['update_cart'])) {
                            $quantity = $_POST['quantity'];
                            mysqli_query($con, "update cart_details set quantity = $quantity where ip_address='$ip' and product_id=$product_id");
                            echo "<script>
                            window.open('cart.php','_self');
                            </script>";
                        }

                        if (isset($_POST['remove_cart'])) {
                            if (isset($_POST['checkeditems'])) {
                                $product_id_arr = $_POST['checkeditems'];
                                foreach ($product_id_arr as $remove_id) {
                                    $result_delete = mysqli_query($con, "delete from cart_details where ip_address='$ip' and product_id=$remove_id");
                                    if ($result_delete) {
                                        echo "<script>
                                            window.open('cart.php','_self');
                                            </script>";
                                    }
                                }
                            }
                        }



                        ?>
                        </tbody>
                    </table>
                    <?php
                    if ($num_of_products > 0) {
                        $total_price = total_cart_price();
                        echo "
                    <div class='d-flex mb-5'>
                        <h4 class='px-3'>Subtotal: <strong class='text-info'> $total_price </strong></h4>
                        <input type='submit' class='bg-info px-3 py-2 mx-3 border-0' value='Continue Shopping' name='continue_shopping'>
                        <input type='submit' class='bg-info px-3 py-2 mx-3 border-0' value='Checkout' name='checkout'>
                        <input type='submit' class='bg-info px-3 py-2 mx-3 border-0' value='Remove selected products' name='remove_cart'>
                    </div>
                    ";
                    } else {
                        echo "
                        <div class='d-flex mb-5'>

                        <input type='submit' class='bg-info px-3 py-2 mx-3 border-0' value='Continue Shopping' name='continue_shopping'>

                        </div>";
                    }

                    if (isset($_POST['continue_shopping'])) {
                        echo "<script>
                        window.open('index.php','_self');
                        </script>";
                    }

                    if (isset($_POST['checkout'])) {
                        echo "<script>
                        window.open('checkout.php','_self');
                        </script>";
                    }
                    ?>
                </form>
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