<?php
$product_id = $_GET['edit_product'];
$row_data = mysqli_fetch_assoc(mysqli_query($con,"select * from products where product_id=$product_id"));
$product_category = mysqli_fetch_assoc(mysqli_query($con,"select * from categories where category_id=".$row_data['category_id'].""))['category_title'];
$product_brand = mysqli_fetch_assoc(mysqli_query($con,"select * from brands where brand_id=".$row_data['brand_id'].""))['brand_title'];

if(isset($_POST['edit_product'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];

    $result = mysqli_query($con,"update products set product_title='$product_title',product_description='$product_description',product_keywords='$product_keywords',category_id =$product_category,brand_id=$product_brand,product_price='$product_price' where product_id=$product_id");
    if($result){
        echo "<script>alert('Product updated successfully!');
        window.open('index.php','_self');</script>";
    }
}

?>

<div class="container mt-5">
    <h1 class="text-center">
        Edit Product
    </h1>
    <form action="" method="POST" enctype="multipart/form-data" class="w-50 m-auto">
        <div class="form-outline mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input value="<?php echo $row_data['product_title'];?>" type="text" class="form-control" required="required" name="product_title" id="product_title">        
        </div>
        <div class="form-outline mb-4">
            <label for="product_description" class="form-label">Product Description</label>
            <input value="<?php echo $row_data['product_description'];?>" type="text" class="form-control" required="required" name="product_description" id="product_description">        
        </div>
        <div class="form-outline mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input value="<?php echo $row_data['product_keywords'];?>" type="text" class="form-control" required="required" name="product_keywords" id="product_keywords">        
        </div>
        <div class="form-outline mb-4">
            <label for="product_category" class="form-label">Product Category</label>
            <select name="product_category" id="product_category" class="form-select">
                <option value="<?php echo $row_data['category_id'];?>"><?php echo $product_category;?></option>
                <?php
                    $result = mysqli_query($con,"select * from categories where category_id<>".$row_data['category_id']."");
                    while($category_data = mysqli_fetch_assoc($result)){
                        echo "<option value=".$category_data['category_id'].">".$category_data['category_title']."</option>";
                    }
                ?>

            </select>
        </div>
        <div class="form-outline mb-4">
            <label for="product_brand" class="form-label">Product Brand</label>
            <select name="product_brand" id="product_brand" class="form-select">
                <option value="<?php echo $row_data['brand_id'];?>"><?php echo $product_brand;?></option>
                <?php
                $result = mysqli_query($con,"select * from brands where brand_id<>".$row_data['brand_id']."");
                while($brand_data = mysqli_fetch_assoc($result)){
                    echo "<option value=".$brand_data['brand_id'].">".$brand_data['brand_title']."</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-outline mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input value="<?php echo $row_data['product_price'];?>" type="text" class="form-control" required="required" name="product_price" id="product_price">        
        </div>
        <div class="text-center">
        <input type="submit" class="btn btn-info px-3 py-2" value="Edit Product " name="edit_product" >
    </div>
    </form>
</div>