
<?php
if(!isset($_SESSION['admin_name'])){
    header('location:admin_login.php');
}
if(isset($_GET['delete_category'])){
    $category_id = $_GET['delete_category'];
    $delete_category = "DELETE from catagory where category_id=$category_id";
    $result = mysqli_query($con, $delete_category);
    if ($result) {
        echo "<script> alert('category deleted successfully!!!')</script>";
        echo "<script> window.open('./index.php?view_category','_self')</script>";
    }}
?>