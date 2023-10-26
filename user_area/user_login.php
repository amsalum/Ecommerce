<?php
include('../includes/connect.php');
include('../functon/commen_function.php');
@session_start();
 if (isset($_POST['login'])) {
    // $username = $_POST['user_name'];
    // $password = $_POST['use_password'];
    
    $username=mysqli_real_escape_string($con,$_POST['user_name']);
    $password=mysqli_real_escape_string($con,$_POST['use_password']);
    //$user_ip = getIPAddress();
    echo $username;
    $select_quary = "SELECT * from teacher where name='$username' and password='$password'";
    $sel_result = mysqli_query($con, $select_quary);
    $row_data = mysqli_fetch_assoc($sel_result);
    $count = mysqli_num_rows($sel_result);
    //cart fetch
    // $select_cart = "SELECT * from cart_detail where ip_address='$user_ip' ";
    // $cart_result = mysqli_query($con, $select_cart);
    // $order_count = mysqli_num_rows($cart_result);
    // $row_dat = mysqli_fetch_assoc($cart_result);
    if ($count > 0) {
        // $_SESSION['username']=$username;
        //     if ($count == 1 ) {
                echo "<script> alert ('login successfully!!')</script>";
                header('location:profile.php');
           // } else {
                //$_SESSION['username']=$username;
               // echo "<script> alert ('login successfully!!')</script>";
               // header('location:payment.php');
           // }
    } else {
        echo "<script> alert ('Invalid credentials')</script>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User login page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <!-- font  awesome  link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
</head>

<body>
    <div class="container-fluid my-3">
        <div class="text-center  mt-2">

            <h1 class="text-primary"> User LogIn </h1>
        </div>
        <!-- form -->
        <div class="row">
            <div class="col-lg-12 col-xl-6 ">
                <form action="" method="post" class=" w-50 mx-auto my-5">
                    <div class="form outline mb-4 m-auto">
                        <label for="user_name" class="form label">UserName:</label>
                        <input type="text" class="form-control " name="user_name" id="user_name" placeholder="Enter your username" autocomplete="off" required="required">
                    </div>

                    <!-- password -->
                    <div class="form outline w-56 mb-4 m-auto">
                        <label for="password" class="form label">Password:</label>
                        <input type="password" class="form-control " name="use_password" id="password" placeholder="Enter your password" autocomplete="off" required="required">
                    </div>
                    <a href="" class="mx-5"> Forgot Password</a>
                    <div class="my-1 mx-5 pt-3">
                        <input type="submit" name="login " style="cursor: pointer;" value="LogIn" class="bg-info px-3 py-2 border-0">
                        <p class="small fw-bold mt-2 pt-1"> Don't have an account ? <a href="user_register.php" class="text-waring">Register</a></p>
                    </div>
                    <br>

                </form>
            </div>
        </div>
    </div>
</body>

</html>