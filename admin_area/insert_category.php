<h2 class="text-center">Insert Category</h2>
<?php
if(!isset($_SESSION['admin_name'])){
    header('location:admin_login.php');
}
include('../includes/connect.php');
if (isset($_POST['cat_name'])) {
    $cat_title = $_POST['cat_title'];
    if (empty($cat_title)) {
        echo '<script>
        alert("Category can not be empty")
        // window.location="index.php";
        </script>
        ';
       // include('insert_category.php');
    }
    $select = "SELECT * FROM catagory where category_title='$cat_title'";
    $resu = mysqli_query($con, $select);
    if (mysqli_num_rows($resu) > 0) {
        echo '<script>
        alert("Category already  exist in database store")
        // window.location="index.php";
        </script>
        ';
    } else {
        $insert_query = "INSERT into catagory (category_title) values ('$cat_title')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo '<script>
        alert("Category have been inserted successfully!!!")
        window.location="index.php?view_category";
        </script>

        ';
        }
    }
}
?>

<form action="" method="post" class="mb-2">
    <div class="input-group w-50 m-auto mb-3 ">
        <span class="input-group-text text-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i> </span>
        <input type="text" class="form-control  " name="cat_title" placeholder="Insert category" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-2 w-50 m-auto">
        <button type="submit " class="bg-info p-2 my-2 border-0" name="cat_name">Insert category</button>
        <!-- <button class="form-control bg-info p-2 m-3 w-10 border-0">Insert cat</button> -->
    </div>

</form>