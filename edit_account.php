<?php
$user_username = $_SESSION['username'];
$user_data =mysqli_fetch_assoc(mysqli_query($con,"select * from user_table where user_username='$user_username'"));

if(isset($_POST['user_update'])){
    $user_id =  $user_data['user_id'];
    $user_username = $_POST['user_username'];
    $_SESSION['username'] = $user_username;
    $user_email = $_POST['user_email'];
    $user_address = $_POST['user_address'];
    $user_mobile = $_POST['user_mobile'];
    $result = 0;
    if(!$_FILES['user_image']['name']){
        $result=mysqli_query($con,"update user_table set user_username='$user_username',user_email='$user_email',user_address='$user_address',user_mobile='$user_mobile' where user_id = $user_id");

    }else{
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_tmp,"./users_area/users_images/$user_image");
        $result=mysqli_query($con,"update user_table set user_username='$user_username',user_email='$user_email',user_image='$user_image',user_address='$user_address',user_mobile='$user_mobile'  where user_id = $user_id");
    }
    if($result){
        echo "<script>alert('Edit successfully!');
        window.open('profile.php','_self');</script>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>
<?php
include("./googleanalitycs.php");
?>
<body>
    <h3 class="text-center text-success mb-4">Edit Account</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="user_username" class="form-label">Username</label>
            <input type="text" value="<?php echo $user_data['user_username'];?>" name="user_username" id="user_username" class="form-control" autocomplete="off">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="user_email" class="form-label">Email</label>
            <input type="email" value="<?php echo $user_data['user_email'];?>" name="user_email" id="user_email" class="form-control" autocomplete="off">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="user_image" class="form-label">User Image</label>
            <input type="file" name="user_image" id="user_image" class="form-control">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="user_address" class="form-label">User Address</label>
            <input type="text" value="<?php echo $user_data['user_address'];?>" name="user_address" id="user_address" class="form-control" autocomplete="off">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="user_mobile" class="form-label">User Mobile</label>
            <input type="text" value="<?php echo $user_data['user_mobile'];?>" name="user_mobile" id="user_mobile" class="form-control" autocomplete="off">
        </div>
        <div class="text-center">
            <input type="submit" value="Update" class="bg-info py-2 px-3 border-0 mb-5" name="user_update">
        </div>
    </form>
</body>

</html>