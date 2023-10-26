<?php
include('../includes/connect.php');
include('../functon/commen_function.php');
session_start();
if(!isset($_SESSION['admin_name'])){
    header('location:admin_login.php');
}
$admin_name = $_SESSION['admin_name'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font  awesome  link-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .admin {
            width: 100px;
            height: 150px;
            /* object-fit: contain; */
        }

        /* .footer {
            position: absolute;
            bottom: 0;
            height: 45px;
        } */
        body {
            overflow-x: hidden;
        }

        button {
            border-radius: 3px;
            cursor: pointer;
        }

        .edit_image {
            width: 100px;
            height: 90px;
        }
    </style>
</head>

<body>
    <!-- navigation -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/awoke.png" class="log" alt="">
                <nav class="navbar navbar-expand-lg">
                    <ul class="nav-bar" style="list-style: none;">

                        <li class="nav-item">
                            <a href="" class="nav-link text-light"><?php
                                                                    if (isset($_SESSION['admin_name'])) {
                                                                        echo "Welcome  " . $_SESSION['admin_name'];
                                                                    } else {
                                                                        echo "Welcome Guest";
                                                                    }
                                                                    ?></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-3"> Manage details</h3>
        </div>
        <!-- third child -->
        <div class="row ">
            <div class="col-md-12 bg-secondary d-flex align-items-center">
                <div class="p-3">
                    <?php
                    
                   // $admin_name = $_SESSION['admin_name'];
                    $select = "SELECT * from admin_data where admin_name='$admin_name'";
                    $result = mysqli_query($con, $select);
                    $row = mysqli_fetch_assoc($result);
                    $admin_image = $row['admin_image'];
                    ?>
                    <p> <img  src='./admin_image/<?php echo $admin_image ?>'  class='admin'> </p>

                    <p class="text-center text-light"><?php
                                                        if (isset($_SESSION['admin_name'])) {
                                                            echo  $_SESSION['admin_name'];
                                                        } else {
                                                            echo "Guest";
                                                        }
                                                        ?></p>
                </div>
                <div class="btn text-center">
                    <button class="my-2"><a href="index.php?insert_product" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                    <button><a href="index.php?view_product" class="nav-link text-light bg-info my-1">View Products</a></button>
                    <button><a href="index.php? insert_category" class="nav-link text-light bg-info my-1">Insert category</a></button>
                    <button><a href="index.php? view_category  " class="nav-link text-light bg-info my-1">View category</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                    <button><a href="index.php?view_brand" class="nav-link text-light bg-info my-1">View Brands</a></button><br>
                    <button><a href="index.php? all_order" class="nav-link text-light bg-info my-1">All Orders </a></button> 
                    <button><a href="index.php? all_payment" class="nav-link text-light bg-info my-1"> All Payments</a></button>
                    <button><a href="index.php?list_user" class="nav-link text-light bg-info my-1">List Users</a></button>
                    <button><a href="admin_logout.php" class="nav-link text-light bg-info my-1">LogOut</a></button>

                </div>
            </div>
        </div>
       <button type="button" class="p-3  mx-3 bg-success " > <a href="comment.php" class="text-light"> user comment </a>  </button>
    
    
        
        <!-- fourth child -->
        <div class="container">
            <?php
            if (isset($_GET['insert_product'])) {
                include('insert_product.php');
            }
            if (isset($_GET['insert_category'])) {
                include('insert_category.php');
            }
            if (isset($_GET['insert_brand'])) {
                include('insert_brand.php');
            }
            if (isset($_GET['view_product'])) {
                include('view_product.php');
            }
            if (isset($_GET['edit_product'])) {
                include('edit_product.php');
            }
            if (isset($_GET['delete_product'])) {
                include('delete_product.php');
            }
            if (isset($_GET['view_category'])) {
                include('view_category.php');
            }
            if (isset($_GET['view_brand'])) {
                include('view_brand.php');
            }
            if (isset($_GET['all_order'])) {
                include('all_order.php');
            }
            if (isset($_GET['all_payment'])) {
                include('all_payment.php');
            }
            if (isset($_GET['list_user'])) {
                include('list_user.php');
            }
            if (isset($_GET['delete_user'])) {
                include('delete_user.php');
            }
            if (isset($_GET['edit_category'])) {
                include('edit_category.php');
            }
            if (isset($_GET['edit_brand'])) {
                include('edit_brand.php');
            }
            if (isset($_GET['delete_category'])) {
                include('delete_category.php');
            }
            if (isset($_GET['delete_brand'])) {
                include('delete_brand.php');
            }
            if (isset($_GET['delete_order'])) {
                include('delete_order.php');
            }
            if (isset($_GET['delete_payment'])) {
                include('delete_payment.php');
            }
            ?>
        </div>
        <!-- footer -->
        <?php
        include('../includes/footer.php');
        ?>
    </div>
    </div>


    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>