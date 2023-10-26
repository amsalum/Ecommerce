
<?php
if(!isset($_SESSION['admin_name'])){
    header('location:admin_login.php');
}
if(isset($_GET['delete_order'])){
    $order_id = $_GET['delete_order'];
    $delete_order = "DELETE from user_order where order_id=$order_id";
    $result = mysqli_query($con, $delete_order);
    if ($result) {
        echo "<script> alert('order deleted successfully!!!')</script>";
        echo "<script> window.open('./index.php?all_order','_self')</script>";
    }}
?>