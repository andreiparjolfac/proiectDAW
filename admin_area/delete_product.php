<?php
$product_id = $_GET['delete_product'];
$result = mysqli_query($con,"update products set status='false' where product_id='$product_id'");
if($result){
    echo "<script>alert('Product deleted successfully!');
    window.open('index.php?view_products','_self');</script>";
}
?>