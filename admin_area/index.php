<?php
include("./functions/common.php");
session_start();
if(!isset($_SESSION['admin_username'])){
    echo "<script>window.open('admin_login.php','_self')</script>";
}else{
    $admin_username = $_SESSION['admin_username'];
    $row_data = mysqli_fetch_assoc(mysqli_query($con,"select * from admin_table where admin_username='$admin_username'"));
    $admin_image = $row_data['admin_image'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
    <style>
        body{
            overflow-x: hidden;
        }
        .footer{
    position: inherit;
    bottom: 0;
}
    </style>
</head>

<body>

    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="Logo Site" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Welcome <?php echo $admin_username;?></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <div class="bg-light">
            <h3 class="text-center p-2">
                Manage Details
            </h3>
        </div>

        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="./admin_images/<?php echo $admin_image;?>" alt="profil" class="admin_image"></a>
                    <p class="text-light text-center"><?php echo $admin_username;?></p>
                </div>
                <div class="button text-center">
                    <button class="my-3 border-0"><a href="insert_product.php" class="nav-link text-light bg-info my-1 p-2">Insert Product</a></button>
                    <button class="border-0"><a href="index.php?view_products" class="nav-link text-light bg-info my-1 p-2">View Products</a></button>
                    <button class="border-0"><a href="index.php?insert_category" class="nav-link text-light bg-info my-1 p-2">Insert Category</a></button>
                    <button class="border-0"><a href="index.php?view_categories" class="nav-link text-light bg-info my-1 p-2">View Categories</a></button>
                    <button class="border-0"><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1 p-2">Insert Brand</a></button>
                    <button class="border-0"><a href="index.php?view_brands" class="nav-link text-light bg-info my-1 p-2">View Brands</a></button>
                    <button class="border-0"><a href="index.php?list_orders" class="nav-link text-light bg-info my-1 p-2">All orders</a></button>
                    <button class="border-0"><a href="index.php?list_payments" class="nav-link text-light bg-info my-1 p-2">All payments</a></button>
                    <button class="border-0"><a href="index.php?list_users" class="nav-link text-light bg-info my-1 p-2">List users</a></button>
                    <button class="border-0"><a href="logout.php" class="nav-link text-light bg-info my-1 p-2">Logout</a></button>
                </div>
            </div>
        </div>
        <div class="container my-3">
            <?php
            if(isset($_GET['insert_category'])){
                include('insert_category.php');
            }
            if(isset($_GET['insert_brand'])){
                include('insert_brand.php');
            }
            if(isset($_GET['view_products'])){
                include("view_products.php");
            }
            if(isset($_GET['edit_product'])){
                include("edit_product.php");
            }
            if(isset($_GET['delete_product'])){
                include("delete_product.php");
            }
            if(isset($_GET['view_categories'])){
                include("view_categories.php");
            }
            if(isset($_GET['view_brands'])){
                include("view_brands.php");
            }
            if(isset($_GET['edit_category'])){
                include("edit_category.php");
            }
            if(isset($_GET['edit_brand'])){
                include("edit_brand.php");
            }
            if(isset($_GET['list_orders'])){
                include("list_orders.php");
            }
            if(isset($_GET['list_payments'])){
                include("list_payments.php");
            }
            if(isset($_GET['list_users'])){
                include("list_users.php");
            }
            if(isset($_GET['delete_user'])){
                $del_id = $_GET['delete_user'];
                $result = mysqli_query($con,"update user_table set disabled='true' where user_id=$del_id");
                if($result){
                    echo "<script>
                    alert('User deleted successfully!');
                    window.open('index.php?list_users','_self');
                    </script>";
                }
            }
            ?>
        </div>
        <div class="bg-info p-3 text-center footer">
            <p> No &copy; reserved Parjol Andrei 2022 </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>