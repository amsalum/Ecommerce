
<?php
if(!isset($_SESSION['admin_name'])){
    header('location:admin_login.php');
}
if(isset($_GET['delete_product'])){
    $product_id=$_GET['delete_product'];
    $delete="DELETE FROM product where product_id=$product_id";
    $delete_result=mysqli_query($con,$delete);
    if($delete_result){
        echo "<script> alert('Product deleted successfully!!!')</script>";
        echo "<script> window.open('./index.php?view_product','_self')</script>";
    }
}

?>