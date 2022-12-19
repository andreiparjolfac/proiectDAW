<?php
include("./includes/connect.php");
session_start();

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $order_data = mysqli_fetch_assoc(mysqli_query($con,"select * from user_orders where order_id='$order_id'"));

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body class="bg-secondary">

    <div class="container my-5">
        <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="" method="POST">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="invoice_number" class="form-label text-light">Invoice Number</label>
                <input type="text" name="invoice_number" class="form-control w-50 m-auto" id="invoice_number" value="<?php 
                echo $order_data['invoice_number'];
                ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="amount_due" class="form-label text-light">Amount Due</label>
                <input type="text" name="amount_due" class="form-control w-50 m-auto" id="amount_due" value="<?php
                echo $order_data['amount_due'];
                ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="payment_method" class="form-label text-light">Payment method</label><br>
                <select name="payment_method" id="payment_method" class="form-select w-50 m-auto">
                    <option>Select Payment Method</option>
                    <option>UPI</option>
                    <option>PayPal</option>
                    <option>Cash on Delivery</option>
                    <option>NetBanking</option>
                    <option>Pay offline</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" value="Confirm" name="confirm_payment" class="bg-info py-2 px-3 border-0">
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>