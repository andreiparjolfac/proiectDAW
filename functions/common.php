<?php

include("./includes/connect.php");

function getProducts()
{
    global $con;
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "select * from products where status='true' order by rand() limit 0,4";
            $result_query = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
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
                <p class='card-text'>Price: $product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
            </div>
        </div>
        </div>";
            }
        }
    }
}

function get_unique_categories()
{
    global $con;
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_query = "select * from products where category_id=$category_id and status='true'";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            while ($row = mysqli_fetch_assoc($result_query)) {
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
                <p class='card-text'>Price: $product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
            </div>
        </div>
        </div>";
            }
        } else {
            echo "<h2 class='text-center text-danger'>No Stock for this category!</h2>";
        }
    }
}

function get_unique_brands()
{
    global $con;
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_query = "select * from products where brand_id=$brand_id and status='true'";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            while ($row = mysqli_fetch_assoc($result_query)) {
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
                <p class='card-text'>Price: $product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
            </div>
        </div>
        </div>";
            }
        } else {
            echo "<h2 class='text-center text-danger'>No Stock for this brand!</h2>";
        }
    }
}


function getBrands()
{
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

function getCategories()
{
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


function get_all_products()
{

    global $con;
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "select * from products where status='true'";
            $result_query = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
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
                    <p class='card-text'>Price: $product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                </div>
            </div>
            </div>";
            }
        }
    }
}

function search_product(){
    global $con;
    if(isset($_GET['search_data_product'])){
        $search_data = $_GET['search_data'];
            $select_query = "select * from products where product_keywords like '%$search_data%' and status='true'";
            $result_query = mysqli_query($con, $select_query);
            $num_of_rows = mysqli_num_rows($result_query);
            if($num_of_rows==0){
                echo "<h2 class='text-center text-danger'>
                No results found for $search_data
                </h2>";
            }
            while ($row = mysqli_fetch_assoc($result_query)) {
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
                <p class='card-text'>Price: $product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
            </div>
        </div>
        </div>";
            }
        }
}


function view_details(){
    global $con;
    if(isset($_GET['product_id'])){
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $product_id = $_GET['product_id'];
            $select_query = "select * from products where product_id=$product_id and status='true'";
            $result_query = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_image2 = $row['product_image2'];
                $product_image3 = $row['product_image3'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo "<div class='col-md-4 mb-2'>
                <div class='card'>
                    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'>Price: $product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                        <a href='index.php' class='btn btn-secondary'>Go home</a>
                    </div>
                </div>
            </div>

            <div class='col-md-8'>
                <div class='row'>
                    <div class='col-md-12'>
                        <h4 class='text-center text-info mb-5'>
                            Related images
                        </h4>
                    </div>
                    <div class='col-md-6'>
                    <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                    </div>
                    <div class='col-md-6'>
                    <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                    </div>
                </div>
            </div> ";
            }
        }
    }
}
}

function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  

// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  

function cart(){
if(isset($_GET['add_to_cart'])){
    global $con;
    $ip = getIPAddress(); 
    $product_id = $_GET['add_to_cart'];
    $select_query = "select * from cart_details where ip_address='$ip' and product_id=$product_id ";
    $result_query = mysqli_query($con,$select_query);
    $num_rows = mysqli_num_rows($result_query);
    if($num_rows>0){
        echo "<script>
        alert('Item already in the cart!');
        window.open('index.php','_self');
        </script>";
    }else{
        $insert_query = "insert into cart_details (product_id,ip_address,quantity) values ($product_id,'$ip',1)";
        $result_query = mysqli_query($con,$insert_query);
        echo "<script>
        alert('Item added successfully in the cart!');
        window.open('index.php','_self');
        </script>";

    }
}
}

function cart_item_num(){
    
        global $con;
        $ip = getIPAddress(); 
        $select_query = "select * from cart_details where ip_address='$ip'";
        $result_query = mysqli_query($con,$select_query);
        $num_rows = mysqli_num_rows($result_query);

        return $num_rows;
    
}

function total_cart_price(){
    global $con;
    $ip = getIPAddress(); 
    $cart_query = "select * from cart_details where ip_address='$ip'";
    $result_cart = mysqli_query($con,$cart_query);
    $sum=0;
    while($row=mysqli_fetch_array($result_cart)){
        $product_id = $row['product_id'];
        $product_quantity = $row['quantity'];
        $result_product = mysqli_query($con,"select * from products where product_id=$product_id");
        $product_price = mysqli_fetch_array($result_product)['product_price'];
        $sum+=$product_quantity*$product_price;
    }

    return $sum;
}




?>