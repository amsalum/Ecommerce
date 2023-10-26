
<?php
if(!isset($_SESSION['admin_name'])){
    header('location:admin_login.php');
}
if(isset($_GET['delete_payment'])){
    $payment_id = $_GET['delete_payment'];
    echo $payment_id;
    $delete_payment = "DELETE from user_payment where payment_id=$payment_id";
    $result = mysqli_query($con, $delete_payment);
    if ($result) {
        echo "<script> alert('payment deleted successfully!!!')</script>";
        echo "<script> window.open('./index.php?all_payment','_self')</script>";
    }}
?>