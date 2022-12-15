<?php
include('../includes/connect.php');

if (isset($_POST['insert_brand'])) {
    $brand_title = $_POST['brand_title'];
    $select_query = "select * from `brands` where lower(brand_title)=lower('$brand_title')";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);
    if (!$number) {
        $insert_query = "insert into `brands` (brand_title) values ('$brand_title')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo "<script>alert('Brand has been inserted successfully');</script>";
        }
    }else{
        echo "<script>alert('This brand is present in the database!');</script>";
    }
}
?>

<h2 class="text-center">Insert Brand</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" placeholder="Brand Name" name="brand_title" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info p-2 my-3 border-0"  name="insert_brand" value="Insert Brand" aria-describedby="basic-addon1">
    </div>
</form>