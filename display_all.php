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
    <title>Ecommerce Website</title>
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
                            <a class="nav-link" href="#">Contact</a>
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
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
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

        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <?php
                    get_all_products();
                    get_unique_categories();
                    get_unique_brands();
                    ?>
                </div>
            </div>
            <div class="col-md-2 bg-secondary p-0">
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h4>
                                Brands
                            </h4>
                        </a>
                    </li>
                    <?php
                    getBrands();
                    ?>

                </ul>

                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h4>
                                Categories
                            </h4>
                        </a>
                    </li>
                    <?php
                    getCategories();
                    ?>
                </ul>
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