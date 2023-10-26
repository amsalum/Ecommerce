<?php
include('../includes/connect.php');
if(isset($_POST['send_message'])){
$name=$_POST['name'];
$textarea=$_POST['textarea'];
$insert="INSERT into contact(user_name,textarea) values('$name','$textarea')";
$qry=mysqli_query($con,$insert);
if($qry){
    echo " <script> alert('your comment inserted successfully!!!') </script>";
    header('location:contact.php');
    exit();
}
else{
    echo " error to insert";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .btn{
            padding: 5px;
            color: white;
            background-color: grey;
        }
        </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font  awesome  link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>contact</title>
</head>
<body>
    <div class="container ">
        <h3 class="text-center text-primary"> welcome to cliant contact area </h3>
    <div class="row my-5">
        <div class="col-md-6">
            <h3> offline contact</h3>
            <label for="">admin phone</label>
            <input type="button" value="+251922956461"><br>
            <label for="">admin email</label>
            <input type="button" value="awokedejenie@gmail.com">

        </div>
        <div class="col-md-6">
            <h3> online contact</h3>
   <form action="" method="post">
    <input type="text" name="name" placeholder="your name">
    <br><br>
    <textarea name="textarea" id="" cols="30" rows="6"></textarea>
    <br><br>
    <input type="submit" placeholder="your comment" class="btn" name="send_message" value="send_message" >
   </form> 
   </div>
   </div>
   </div>
</body>
</html>