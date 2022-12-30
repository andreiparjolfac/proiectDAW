<?php
include('./includes/connect.php');
include('./functions/common.php');
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>window.open('index.php','_self');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php 
        echo $_SESSION['username'];
    ?></title>
    <!-- bootstrap css link -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style.css">
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
                            <a class="nav-link" href="./contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php
                                                                                                                echo cart_item_num();
                                                                                                                ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total price: <?php
                                                                       echo total_cart_price();
                                                                        ?></a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="search_product.php" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
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
                    $username=$_SESSION['username'];
                    echo "                <li class='nav-item'>
                    <a class='nav-link' href='profile.php'>Welcome $username</a>
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

        <div class="row">
            <div class="col-md-2 p-0">
                <ul class="navbar-nav bg-secondary text-center">
                    <li class="nav-item bg-info">
                        <a href="profile.php" class="nav-link text-light"><h4>Your profile</h4></a>
                    </li>
                    <li class="nav-item">
                        <?php
                        $user_username = $_SESSION['username'];
                        $user_image = mysqli_fetch_assoc(mysqli_query($con,"select * from user_table where user_username='$user_username'"))['user_image'];

                        echo "<img src='users_area/users_images/$user_image' class='admin_image' alt='$user_username'>";
                        ?>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php" class="nav-link text-light">Pending orders</a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php?edit_account" class="nav-link text-light">Edit account</a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php?my_orders" class="nav-link text-light">My orders</a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php?delete_account" class="nav-link text-light">Delete account</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link text-light">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10">
                <?php
                $user_username = $_SESSION['username'];
                $user_id = mysqli_fetch_assoc(mysqli_query($con,"select * from user_table where user_username='$user_username'"))['user_id'];
                if(isset($_GET['edit_account'])){
                    include("edit_account.php");
                }else if(isset($_GET['my_orders'])){
                    include("my_orders.php");
                }else if(isset($_GET['delete_account'])){
                    include("delete_account.php");
                }else{
                    $num_of_orders = mysqli_num_rows(mysqli_query($con,"select * from user_orders where user_id=$user_id and order_status='pending'"));
                    if($num_of_orders>0){
                        echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$num_of_orders</span> pending orders.</h3>
                        <p class='text-center'><a class='text-dark' href='profile.php?my_orders'>Order details</a></p>";
                    }else{
                        echo "<h3 class='text-center text-success mt-5 mb-2'>You have 0 pending orders.</h3>";
                    }
                }
                ?>
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