<?php
include("./functions/common.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .payimg{
            width: 90%;
            margin: auto;
            display: block;
        }
    </style>
</head>
<?php
include("./googleanalitycs.php");
?>
<body>
<?php
    //$user_ip = getIPAddress();
    $username = $_SESSION['username'];
    $get_user = "select * from user_table where user_username = '$username'";
    $result = mysqli_query($con,$get_user);
    $row_data = mysqli_fetch_assoc($result);
    $user_id = $row_data['user_id'];
    ?>
    <div class="container">
        <h2 class="text-center text-info">
            Payment options
        </h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6">
            <a href="https://www.paypal.com" target="_blank">
                <img src="./images/images-1.jpg" class="payimg" alt="paypal">
            </a>
            </div>
            <div class="col-md-6">
            <?php
            echo "<a href='order.php?user_id=$user_id'>
                <h2 class='text-center'>Pay offline</h2>
            </a>";
            ?>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>