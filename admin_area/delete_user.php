
<?php
if(!isset($_SESSION['admin_name'])){
    header('location:admin_login.php');
}
if(isset($_GET['delete_user'])){
    $user_id = $_GET['delete_user'];
    //echo $payment_id;
    $delete_payment = "DELETE from user_data where user_id=$user_id";
    $result = mysqli_query($con, $delete_payment);
    if ($result) {
        echo "<script> alert('user deleted successfully!!!')</script>";
        echo "<script> window.open('./index.php?list_user','_self')</script>";
    }}
?>