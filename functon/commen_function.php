<?php
//include('./includes/connect.php');
//to get product 
function getteacher()
{
    global $con;
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select = "SELECT * from teacher  order by rand() ";
            $result = mysqli_query($con, $select);
            while ($rows = mysqli_fetch_assoc($result)) {
                
                $teach_id = $rows['teach_id'];
                $name = $rows['name'];
                $location = $rows['location'];
                $phone = $rows['phone'];
                $gender = $rows['gender'];
                $description = $rows['description'];
                $subject = $rows['subject'];
                $level = $rows['level'];
                $budget = $rows['budget'];
                $photo_upload = $rows['photo_upload'];
                echo "
                    <div class='col-md-4 mb-3'>
                        <div class='card'>
                            <img src='./admin_area/upload/$photo_upload' class='card-img-top' alt='$name'>
                            <div class='card-body'>
                                <h5 class='card-title'>$name</h5>
                                <p class='card-text'>$description</p>
                                <p class='card-text'>$subject</p>
                                <p class='card-text'>$location</p>
                                <p class='card-text'>$level</p>
                                <p class='card-text'>$gender</p>
                                <p class='card-text'>$phone</p>
                                <span class='card-text text-primary'>current price $budget ETB</span><br>
                                <a href='index.php ? add_to_cart=$teach_id' class='btn btn-info'>Select teacher</a>
                                
                            </div>
                        </div>
                    </div>
                        ";
            } }
    //}}

//get all products
function get_all_product()
{
    global $con;
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select = "SELECT * from product order by rand()";
            $result = mysqli_query($con, $select);
            while ($rows = mysqli_fetch_assoc($result)) {
                $product_id = $rows['product_id'];
                $product_title = $rows['product_title'];
                $product_desc = $rows['product_description'];
                $product_image1 = $rows['product_image1'];
                $product_price = $rows['product_price'];
                $category_id = $rows['category_id'];
                $brand_id = $rows['brand_id'];
                echo "
                    <div class='col-md-4 mb-3'>
                        <div class='card'>
                            <img src='./admin_area/upload/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_desc</p>
                                <span class='card-text text-primary'>current price $product_price ETB</span><br>
                                <a href='index.php? add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='product_detail.php ? product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>
                        ";
            }
        }
    }
}




// get unique category
function get_unique_category()
{
    global $con;
    if (isset($_GET['category'])) {
        $cate_id = $_GET['category'];
        $select = "SELECT * from product where category_id='$cate_id'";
        $result = mysqli_query($con, $select);
        $cont = mysqli_num_rows($result);
        if ($cont == 0) {
            echo '<h2 class="text-danger text-center">there is no this kind of brand in store. </h2>';
        }
        while ($rows = mysqli_fetch_assoc($result)) {
            $product_id = $rows['product_id'];
            $product_title = $rows['product_title'];
            $product_desc = $rows['product_description'];
            $product_image1 = $rows['product_image1'];
            $product_price = $rows['product_price'];
            $category_id = $rows['category_id'];
            $brand_id = $rows['brand_id'];
            echo "
                    <div class='col-md-4 mb-3'>
                        <div class='card'>
                            <img src='./admin_area/upload/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_desc</p>
                                <span class='card-text text-primary'>current price $product_price ETB</span><br>
                                <a href='index.php? add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='product_detail.php ? product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>
                        ";
        }
    }
}
//get unique brand
function get_unique_brand()
{
    global $con;
    if (isset($_GET['brand'])) {
        $brad_id = $_GET['brand'];
        $select = "SELECT * from product where brand_id='$brad_id'";
        $result = mysqli_query($con, $select);
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
            echo '<h2 class="text-danger text-center">there is no this kind of brand in store </h2> ';
        }
        while ($rows = mysqli_fetch_assoc($result)) {
            $product_id = $rows['product_id'];
            $product_title = $rows['product_title'];
            $product_desc = $rows['product_description'];
            $product_image1 = $rows['product_image1'];
            $product_price = $rows['product_price'];
            $category_id = $rows['category_id'];
            $brand_id = $rows['brand_id'];
            echo "
                    <div class='col-md-4 mb-3'>
                        <div class='card'>
                            <img src='./admin_area/upload/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_desc</p>
                                <span class='card-text text-primary'>current price $product_price ETB</span><br>
                                <a href='index.php? add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='product_detail.php ? product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>
                        ";
        }
    }
}
//get brands
function getbrand()
{
    global $con;
    $query = "SELECT * from brand ";
    $result = mysqli_query($con, $query);
    while ($row_data = mysqli_fetch_assoc($result)) {
        $brand_tit = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];

        echo "<li class='nav-item '>
        <a href='index.php?brand=$brand_id' class='nav-link text-light'> $brand_tit </a>
    </li>";
    }
}
//get category function
function getcategory()
{
    global $con;
    $select = "SELECT * from catagory ";
    $result = mysqli_query($con, $select);
    while ($rows = mysqli_fetch_assoc($result)) {
        $cat_id = $rows['category_id'];
        $cat_title = $rows['category_title'];
        echo "
                        <li class='nav-item '>
                        <a href='index.php?category=$cat_id' class='nav-link text-light'> $cat_title </a>
                    </li>
                    ";
    }
}
// search product
function search_product()
{
    global $con;
    if (isset($_GET['search_product'])) {
        $search_value = $_GET['search_data'];
        $select = "SELECT * from product where product_keyword like '%$search_value%'";
        $result = mysqli_query($con, $select);
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
            echo '<h2 class="text-danger text text-center">there is no this kind of brand in store </h2>';
            //echo $search_value;

        }
        while ($rows = mysqli_fetch_assoc($result)) {
            $product_id = $rows['product_id'];
            $product_title = $rows['product_title'];
            $product_desc = $rows['product_description'];
            $product_image1 = $rows['product_image1'];
            $product_price = $rows['product_price'];
            $category_id = $rows['category_id'];
            $brand_id = $rows['brand_id'];
            echo "
                    <div class='col-md-4 mb-3'>
                        <div class='card'>
                            <img src='./admin_area/upload/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_desc</p>
                                <span class='card-text text-primary'>current price $product_price ETB</span><br>
                                <a href='index.php? add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='product_detail.php ? product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>
                        ";
        }
    }
}
function product_detail()
{
    global $con;
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {
                $id = $_GET['product_id'];
                $select = "SELECT * from product where product_id='$id' order by rand() ";
                $result = mysqli_query($con, $select);
                while ($rows = mysqli_fetch_assoc($result)) {
                    $product_id = $rows['product_id'];
                    $product_title = $rows['product_title'];
                    $product_desc = $rows['product_description'];
                    $product_image1 = $rows['product_image1'];
                    $product_image2 = $rows['product_image2'];
                    $product_image3 = $rows['product_image3'];
                    $product_price = $rows['product_price'];
                    $category_id = $rows['category_id'];
                    $brand_id = $rows['brand_id'];
                    echo "
                    <div class='col-md-4 mb-3'>
                        <div class='card'>
                            <img src='./admin_area/upload/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_desc</p>
                                <span class='card-text text-primary'>current price $product_price ETB</span><br>
                                <a href='index.php? add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                
                            </div>
                        </div>
                    </div>
                    <div class=col-md-8>
                        
                        <div class='row'>
                            <div class='col-md-12'>
                                <h4 class='text-center text-info'>Related products</h4>
                            </div>
                        <div class='col-md-6'>
                            <img src='./admin_area/upload/$product_image2' class='card-img-top' alt='$product_title'>
                        </div>
                        <div class='col-md-6'>
                            <img src='./admin_area/upload/$product_image3' class='card-img-top' alt='$product_title'>  
                        </div>
                    </div>
                </div>   
                ";
                }
            }
        }
    }
}
//get ip address
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// $ip = getIPAddress();
// echo 'User Real IP Address - ' . $ip;

//add to cart function
function cart()
{
    global $con;
    if (isset($_GET['add_to_cart'])) {
        // $ip_address = getIPAddress();
        $get_teach_id = $_GET['add_to_cart'];
        $select = "SELECT * from cart_detail where and product_id=$get_teach_id ";
        $result = mysqli_query($con, $select);
        $cont = mysqli_num_rows($result);
        if ($cont > 0) {
            echo "<script> alert ('The item is already present inside cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert = "INSERT into cart_detail (product_id,ip_address,quantity)values($get_product_id,'$ip_address',0)";
            $result = mysqli_query($con, $insert);
            echo "<script> alert ('Item is inserted successfully to cart!!!')</script>";
            echo "<script>window.open('cart.php','_self')</script>";
        }
    }
}
//count number of  cart products
function cart_product()
{
    global $con;
    if (isset($_GET['add_to_cart'])) {
        $ip_address = getIPAddress();

        $select = "SELECT * from cart_detail where ip_address='$ip_address' ";
        $result = mysqli_query($con, $select);
        $cont = mysqli_num_rows($result);
    } else {
        $ip_address = getIPAddress();

        $select = "SELECT * from cart_detail where ip_address='$ip_address' ";
        $result = mysqli_query($con, $select);
        $cont = mysqli_num_rows($result);
    }
    echo $cont;
}
//total price function
function total_cart_price()
{
    global $con;
    $total = 0;
    $ip_address = getIPAddress();
    $select = "SELECT * from cart_detail where ip_address='$ip_address '";
    $result = mysqli_query($con, $select);
    while ($rows = mysqli_fetch_array($result)) {
        $product_id = $rows['product_id'];
        $select_price = "SELECT * from product where product_id=$product_id";
        $result_product = mysqli_query($con, $select_price);
        while ($rows_product = mysqli_fetch_array($result_product)) {
            $product_price = array($rows_product['product_price']); //[56][96]
            $price_sum = array_sum($product_price);
            $total += $price_sum;
        }
    }
    echo $total;
}
//get order detail function
function get_order_detail()
{
    global $con;
    $username = $_SESSION['username'];
    $get_user_id = "SELECT *from user_data where user_name='$username'";
    $result = mysqli_query($con, $get_user_id);
    while ($fetch_id = mysqli_fetch_array($result)) {
        $user_id = $fetch_id['user_id'];
        if (!isset($_GET['edit_account'])) {
            if (!isset($_GET['my_orders'])) {

                if (!isset($_GET['delete_account'])) {
                    $get_user_order = "SELECT *from user_order where user_id='$user_id' and order_status='pending'";
                    $order_result = mysqli_query($con, $get_user_order);

                    $count_order = mysqli_num_rows($order_result);
                    if ($count_order > 0) {
                        echo "<h3 class='text-center text-success my-4'> You have <span class='text-danger'>$count_order</span> Pending  Order </h3>
                        <p class='text-center my-3'> <a href='profile.php?my_order'> Order Detail</a> </p>  
                        ";
                    } else {
                        echo "<h3 class='text-center text-success my-4'> You have <span class='text-danger'>Zero</span> Pending  Order </h3>
                        <p class='text-center my-3'> <a href='../index.php'> Explore product</a> </p>  
                        ";
                    }
                }
            }
        }
    }
}
//edit account
function sa()
{
    global $con;
    $username = $_SESSION['username'];
    $select_profile = "SELECT * from user_data where user_name='$username'";
    $result = mysqli_query($con, $select_profile);
    $fetch = mysqli_fetch_array($result);
    $profile = $fetch['user_image'];
    echo $profile;
    //$profile_temp=$fetch['user_image'];
?>
    <li class='nav-item'>
        <a class='nav-link profile_image  my-4'> <img src='./images/ <?php $profile ?>'> </a>
                    </li>
                    <?php
                }
                ?>
                