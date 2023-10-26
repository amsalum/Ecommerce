<h3 class="text-center text-danger">edit product </h3>
<?php
if(!isset($_SESSION['admin_name'])){
    header('location:admin_login.php');
}
include('../includes/connect.php');
if (isset($_GET['edit_product'])) {
    $product_id = $_GET['edit_product'];

    $get_product = "SELECT * from product where product_id =$product_id";
    $product_result = mysqli_query($con, $get_product);
    $row = mysqli_fetch_assoc($product_result);
    //$product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $product_price = $row['product_price'];
    $product_status = $row['status'];
    $product_description = $row['product_description'];
    $product_keyword = $row['product_keyword'];
}

//fetch category 
$select_category = "SELECT * FROM catagory where category_id= $category_id";
$category_result = mysqli_query($con, $select_category);
$row_category = mysqli_fetch_array($category_result);
$category_id = $row_category['category_id'];
$category_title = $row_category['category_title'];
//fetch brand
$select_brand = "SELECT * FROM brand where brand_id= $brand_id";
$brand_result = mysqli_query($con, $select_brand);
$row_brand = mysqli_fetch_array($brand_result);
$brand_id=$row_brand['brand_id'];
$brand_title = $row_brand['brand_title'];
//database quary
if (isset($_POST['update_product'])) {
    $product_title = $_POST['product_title'];
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image1_temp = $_FILES['product_image1']['tmp_name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image2_temp = $_FILES['product_image2']['tmp_name'];
    $product_image3 = $_FILES['product_image3']['name'];
    $product_image3_temp = $_FILES['product_image3']['tmp_name'];
    $product_price = $_POST['product_price'];
    //$product_status = $_POST['status'];
    $product_description = $_POST['product_description'];
    $product_keyword = $_POST['product_keyword'];
    //upload image
    $upload_img1 = "upload/" . $product_image1;
    move_uploaded_file($product_image1_temp, $upload_img1);
    $upload_img2 = "upload/" . $product_image2;
    move_uploaded_file($product_image2_temp, $upload_img2);
    $upload_img3 = "upload/" . $product_image3;
    move_uploaded_file($product_image3_temp, $upload_img3);
    $update ="UPDATE product set product_title='$product_title',product_description='$product_description',product_keyword='$product_keyword',category_id=$category_id,brand_id=$brand_id
    ,product_image1='$product_image1',product_image2='$product_image2',product_image3='$product_image3', 
    product_price=$product_price,register_date=NOW() where product_id=$product_id";
    $result = mysqli_query($con, $update);
    if ($result) {
        echo "<script> alert('product have been edited successfully!!!')</script>";
        echo "<script> window.open('./index.php?view_product','_self')</script>";
    }
}
?>
<div class="mt-4">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline m-auto w-50 my-4">
            <label for="" class="form-label"> product title:</label>
            <input type="text" name="product_title" class=" form-control  " value="<?php echo $product_title ?>" required="required">
        </div>
        <div class="form-outline m-auto w-50 my-4 ">
            <label for="" class="form-label"> product image1:</label>
            <div class="d-flex">
                <input type="file" name="product_image1" class=" form-control " required="required"><img src="./upload/<?php echo $product_image1 ?> " alt="" class="edit_image">
            </div>
        </div>
        <div class="form-outline m-auto w-50 my-4 ">
            <label for="" class="form-label"> product image2:</label>
            <div class="d-flex">
                <input type="file" name="product_image2" class=" form-control " required="required"><img src="./upload/<?php echo $product_image2 ?> " alt="" class="edit_image">
            </div>
        </div>
        <div class="form-outline m-auto w-50 my-4 ">
            <label for="" class="form-label"> product image3:</label>
            <div class="d-flex">
                <input type="file" name="product_image3" class="text form-control" required="required"> <img src="./upload/<?php echo $product_image3 ?> " alt="" class="edit_image">
            </div>
        </div>
        <div class="form-outline m-auto w-50 my-4">
            <label for="" class="form-label"> product price:</label>
            <input type="text" name="product_price" class="text form-control " value="<?php echo $product_price ?>">
        </div>
        <div class="form-outline m-auto w-50 my-4">
            <label for="" class="form-label"> product description :</label>
            <input type="text" name="product_description" class="text form-control  " required="required" value="<?php echo $product_description ?>">
        </div>
        <div class="form-outline m-auto w-50 my-4">
            <label for="" class="form-label"> product keyword :</label>
            <input type="text" name="product_keyword" class=" form-control  " value="<?php echo $product_keyword ?>">
        </div>
        <div class="form outline w-50 mb-4 m-auto">
            <label for="" class="form-label"> product category:</label> <br>
            <select name="product_category" id="" class="form-select">
                <option value="">Select category</option>
                <?php
                $select_category_all = "SELECT * FROM catagory ";
                $category_result_all = mysqli_query($con, $select_category_all);

                while ($row_category_all = mysqli_fetch_array($category_result_all)) {
                    $category_title =  $row_category_all['category_title'];
                    $category_id = $row_category_all['category_id'];
                    echo " <option value='$category_id'>$category_title</option>";
                }
                ?>

            </select>
        </div>
        <div class="form-outline m-auto w-50 mb-4">
            <label for="pro" class="form-label"> product brand:</label><br>
            <select name="product_brand" id="pro" class="form-select">
                <option value="">Select brand</option>
                <?php
                $select_brand_all = "SELECT * FROM brand ";
                $brand_result_all = mysqli_query($con, $select_brand_all);
                while ($row_brand_all = mysqli_fetch_array($brand_result_all)) {
                    $brand_title =  $row_brand_all['brand_title'];
                    $brand_id = $row_brand_all['brand_id'];
                    echo " <option value='$brand_id'>$brand_title</option>";
                }
                ?>

            </select>
        </div>
        <!-- <div class="form-outline m-auto w-50 my-4">
            <label for="" class="form-label"> product status :</label>
            <input type="text" name="status" class="text form-control " value="
        </div> -->
        <div class="m-auto w-50 my-4 text-center">
            <input type="submit" class="border-0 my-3 py-2 px-2 bg-warning text-light" name="update_product" style="cursor: pointer;" value="Update">
        </div>

    </form>
</div>