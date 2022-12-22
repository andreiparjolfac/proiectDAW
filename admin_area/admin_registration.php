<?php
include("./functions/common.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6">
            <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="admin_username" class="form-label">Admin username</label>
                        <input type="text" name="admin_username" class="form-control" autocomplete="off" required="required" placeholder="Enter your username" id="admin_username">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_email" class="form-label">E-mail</label>
                        <input type="email" name="admin_email" class="form-control" autocomplete="off" required="required" placeholder="Enter your E-mail" id="admin_email">
                        
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_image" class="form-label">Admin image</label>
                        <input type="file" name="admin_image" class="form-control"  required="required"  id="admin_image">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" name="admin_password" class="form-control" autocomplete="off" required="required" placeholder="Enter your password" id="admin_password">
                        
                    </div>
                    <div class="form-outline mb-4">
                        <label for="conf_admin_password" class="form-label">Confirm Password</label>
                        <input type="password" name="conf_admin_password" class="form-control" autocomplete="off" required="required" placeholder="Confirm your password" id="conf_admin_password">
                        
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="admin_register">
                    </div>
                    <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ? <a href="admin_login.php" class="text-danger"> Login</a></p>
                </form>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

<?php
if(isset($_POST['admin_register'])){
    $admin_username=$_POST['admin_username'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $conf_admin_password = $_POST['conf_admin_password'];


    $admin_image = $_FILES['admin_image']['name'];
    $admin_image_tmp = $_FILES['admin_image']['tmp_name'];
    move_uploaded_file($admin_image_tmp,"./admin_images/$admin_image");



    $select_query = "select * from admin_table where admin_username='$admin_username' or admin_email='$admin_email'";
    if(mysqli_num_rows(mysqli_query($con,$select_query))>0){

        echo "<script>alert('Username or email already in use!');</script>";

    }else if($admin_password!=$conf_admin_password){
        echo "<script>alert('Passwords do not match!');</script>";
    }else{
    $hash_password = password_hash($admin_password,PASSWORD_DEFAULT);
    $insert_query = "insert into admin_table (admin_username,admin_email,admin_password,admin_image) values ('$admin_username','$admin_email','$hash_password','$admin_image')";

    $result_query = mysqli_query($con,$insert_query);
    if(!$result_query){
        die(mysqli_error($con));
    }else{
        echo "<script>alert('Successfully registered!');</script>";
    }
    }




        echo "<script>
        window.open('admin_login.php','_self');
        </script>";
}
?>