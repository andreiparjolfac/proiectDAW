<?php
$category_id = $_GET['edit_category'];
$category_title = mysqli_fetch_assoc(mysqli_query($con,"select * from categories where category_id=$category_id"))['category_title'];

if(isset($_POST['edit_category'])){
    $new_category_title = $_POST['category_title'];
    $result = mysqli_query($con,"update categories set category_title='$new_category_title' where category_id = $category_id");
    if($result){
        echo "<script>
        alert('Category updated successfully!');
        window.open('index.php?view_categories','_self');</script>";
    }
}
?>

<div class="container mt-3">
    <h1 class="text-center">Edit Category</h1>
    <form action="" method="POST" class="text-center w-50 m-auto" >
        <div class="form-outline mb-4">
            <label for="category_title" class="form-label">Category Title</label>
            <input type="text" value="<?php echo $category_title;?>" class="form-control" autocomplete="off" required="required" name="category_title" id="category_title">
        </div>
        <input type="submit" value="Update Category" class="btn btn-info px-3 py-2 mb-3" name="edit_category">
    </form>
</div>