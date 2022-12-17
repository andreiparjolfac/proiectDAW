<?php

include("./functions/common.php");
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> User registration </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New user Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" name="user_username" class="form-control" autocomplete="off" required="required" placeholder="Enter your username" id="user_username">

                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">E-mail</label>
                        <input type="email" name="user_email" class="form-control" autocomplete="off" required="required" placeholder="Enter your E-mail" id="user_email">
                        
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">User image</label>
                        <input type="file" name="user_image" class="form-control"  required="required"  id="user_image">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" name="user_password" class="form-control" autocomplete="off" required="required" placeholder="Enter your password" id="user_password">
                        
                    </div>
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <input type="password" name="conf_user_password" class="form-control" autocomplete="off" required="required" placeholder="Confirm your password" id="conf_user_password">
                        
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" name="user_address" class="form-control" autocomplete="off" required="required" placeholder="Enter your address" id="user_address">

                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" name="user_contact" class="form-control" autocomplete="off" required="required" placeholder="Enter your mobile phone" id="user_contact">
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
                    </div>
                    <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ? <a href="user_login.php" class="text-danger"> Login</a></p>
                </form>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

<?php
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $conf_user_password = $_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact = $_POST['user_contact'];

    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    move_uploaded_file($user_image_tmp,"./users_area/users_images/$user_image");

    $user_ip = getIPAddress();

    $select_query = "select * from user_table where user_username='$user_username' or user_email='$user_email'";
    if(mysqli_num_rows(mysqli_query($con,$select_query))>0){

        echo "<script>alert('Username or email already in use!');</script>";

    }else if($user_password!=$conf_user_password){
        echo "<script>alert('Passwords do not match!');</script>";
    }else{
        
    $insert_query = "insert into user_table (user_username,user_email,user_password,user_image,user_ip,user_address,user_mobile) values ('$user_username','$user_email','$user_password','$user_image','$user_ip','$user_address','$user_contact')";

    $result_query = mysqli_query($con,$insert_query);
    if(!$result_query){
        die(mysqli_error($con));
    }else{
        echo "<script>alert('Successfully registered!');</script>";
    }
    }

}
?>