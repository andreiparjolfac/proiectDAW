<?php
include("./includes/connect.php");
if(isset($_POST['delete_account'])){
$user_username = $_SESSION['username'];
$user_password = $_POST['user_password'];
$row_data = mysqli_fetch_assoc(mysqli_query($con,"select * from user_table where user_username='$user_username'"));
if(password_verify($user_password,$row_data['user_password'])){
    $result = mysqli_query($con,"update user_table set disabled='true' where user_username='$user_username'");
    if($result){
        echo "<script>window.open('logout.php','_self');</script>";
    }
}else{
    echo "<script>alert('Incorrect password!');</script>";    
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
</head>
<body>
    <h3 class="text-center text-danger mb-4">
        Delete Account
    </h3>
    <form action="" method="POST" class="mt-5 m-auto w-50">
    <div class="form-outline mb-4">
        <label for="user_password" class="form-label">Enter Password:</label>
        <input type="password" name="user_password" id="user_password" class="form-control" required="required">
    </div>
    <div class="mt-4 pt-2">
        <input type="submit" value="Delete account" class="bg-info py-2 px-3 border-0" name="delete_account">
    </div>
    </form>
</body>
</html>