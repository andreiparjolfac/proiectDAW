<?php
include("./functions/common.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6">
            <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="admin_username" class="form-label">Username</label>
                        <input type="text" name="admin_username" class="form-control" autocomplete="off" required="required" placeholder="Enter your username" id="admin_username">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" name="admin_password" class="form-control" autocomplete="off" required="required" placeholder="Enter your password" id="admin_password">
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="admin_login">
                    </div>
                    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account ? <a href="admin_registration.php" class="text-danger"> Register here!</a></p>
                </form>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

<?php
if(isset($_POST['admin_login'])){
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];

    $select_query = "select * from admin_table where admin_username='$admin_username'";
    $result = mysqli_query($con,$select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);

    if($row_count>0){
        if(password_verify($admin_password,$row_data['admin_password'])){
            $_SESSION['admin_username']=$admin_username;
            echo "<script>alert('Login Successful');</script>";

                
            echo "<script>window.open('index.php','_self');</script>";
                


        }else{
            echo "<script>alert('Invalid Password');</script>";
        }
    }else{
        echo "<script>alert('Invalid UserName');</script>";
    }

}
?>