<?php

include("./includes/connect.php");

function getProducts(){
    global $con;
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    $select_query = "select * from products order by rand() limit 0,4";
    $result_query = mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <a href='#' class='btn btn-info'>Add to cart</a>
                <a href='#' class='btn btn-secondary'>View more</a>
            </div>
        </div>
        </div>";
    }
}
}
}

function get_unique_categories(){
    global $con;
    if(isset($_GET['category'])){
    $category_id = $_GET['category'];
    $select_query = "select * from products where category_id=$category_id";
    $result_query = mysqli_query($con,$select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if($num_of_rows>0){
    while($row=mysqli_fetch_assoc($result_query)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <a href='#' class='btn btn-info'>Add to cart</a>
                <a href='#' class='btn btn-secondary'>View more</a>
            </div>
        </div>
        </div>";
    }
}else{
    echo "<h2 class='text-center text-danger'>No Stock for this category!</h2>";
}
}
}

function get_unique_brands(){
    global $con;
    if(isset($_GET['brand'])){
    $brand_id = $_GET['brand'];
    $select_query = "select * from products where brand_id=$brand_id";
    $result_query = mysqli_query($con,$select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if($num_of_rows>0){
    while($row=mysqli_fetch_assoc($result_query)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <a href='#' class='btn btn-info'>Add to cart</a>
                <a href='#' class='btn btn-secondary'>View more</a>
            </div>
        </div>
        </div>";
    }
}else{
    echo "<h2 class='text-center text-danger'>No Stock for this brand!</h2>";
}
}
}


function getBrands(){
    global $con;
    $select_brands = " select * from brands";
    $result_brands = mysqli_query($con, $select_brands);

    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "                    <li class='nav-item'>
        <a href='index.php?brand=$brand_id' class='nav-link text-light'>
        $brand_title
        </a>
    </li>";
    }
}

function getCategories(){
    global $con;
    $select_categories = " select * from categories";
    $result_categories = mysqli_query($con, $select_categories);

    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        echo "                    <li class='nav-item'>
        <a href='index.php?category=$category_id' class='nav-link text-light'>
            $category_title
        </a>
    </li>";
    }
}


function get_all_products(){

        global $con;
        if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){
        $select_query = "select * from products";
        $result_query = mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4 mb-2'>
            <div class='card'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <a href='#' class='btn btn-info'>Add to cart</a>
                    <a href='#' class='btn btn-secondary'>View more</a>
                </div>
            </div>
            </div>";
        }
    }
    }
    
}