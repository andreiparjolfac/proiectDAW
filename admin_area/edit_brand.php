<?php
$brand_id = $_GET['edit_brand'];
$brand_title = mysqli_fetch_assoc(mysqli_query($con,"select * from brands where brand_id=$brand_id"))['brand_title'];

if(isset($_POST['edit_brand'])){
    $new_brand_title = $_POST['brand_title'];
    $result = mysqli_query($con,"update brands set brand_title='$new_brand_title' where brand_id = $brand_id");
    if($result){
        echo "<script>
        alert('Brand updated successfully!');
        window.open('index.php?view_brands','_self');</script>";
    }
}
?>

<div class="container mt-3">
    <h1 class="text-center">Edit Brand</h1>
    <form action="" method="POST" class="text-center w-50 m-auto" >
        <div class="form-outline mb-4">
            <label for="brand_title" class="form-label">Brand Title</label>
            <input type="text" value="<?php echo $brand_title;?>" class="form-control" autocomplete="off" required="required" name="brand_title" id="brand_title">
        </div>
        <input type="submit" value="Update Brand" class="btn btn-info px-3 py-2 mb-3" name="edit_brand">
    </form>
</div>