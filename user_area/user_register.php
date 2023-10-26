<?php
include('../includes/connect.php');
include('../functon/commen_function.php');
 if (isset($_POST['submit'])) {
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $location = mysqli_real_escape_string($con, $_POST['location']);
  $phone = mysqli_real_escape_string($con, $_POST['phone']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $description = mysqli_real_escape_string($con, $_POST['description']);
  $subject = mysqli_real_escape_string($con, $_POST['subject']);
  $level = mysqli_real_escape_string($con, $_POST['level']);
  $budget = mysqli_real_escape_string($con, $_POST['budget']);
  $gender = mysqli_real_escape_string($con, $_POST['gender']);
  

  // File upload
  $target_dir = "user_image/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      $uploadOk = 0;
    }
  }
  // Check file size
  if ($_FILES["file"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "png" && $imageFileType != "jpg" && $imageFileType != "gif" ) {
    echo "Sorry, only png,jpg,gif  files are allowed.";
    $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
     
      echo "Sorry, there was an error uploading your file.";
    
  }

  // Insert data into the database
  $query = "INSERT INTO teacher (name, email, location, phone,password, description, subject, level, budget, gender, file_name) 
            VALUES('$name', '$email', '$location', '$phone','$password', '$description', '$subject', '$level', '$budget', '$gender', '$target_file')";
  $res=mysqli_query($con, $query);
   if($res){
    echo "data inserted successfully";
    header("location:user_login.php");
   }
 
}
?>

<form method="post" action="" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  <div class="form-group">
    <label for="location">Location:</label>
    <input type="text" class="form-control" id="location" name="location" required>
  </div>
  <div class="form-group">
    <label for="phone">Phone:</label>
    <input type="tel" class="form-control" id="phone" name="phone" required>
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  <div class="form-group">
    <label for="description">Description:</label>
    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
  </div>
  <div class="form-group">
    <label for="subject">Subject:</label>
    <input type="text" class="form-control" id="subject" name="subject" required>
  </div>
  <div class="form-group">
    <label for="level">Level of Grade:</label>
    <select class="form-control" id="level" name="level" required>
      <option value="">--Select--</option>
      <option value="Elementary">Elementary</option>
      <option value="Middle School">Middle School</option>
      <option value="High School">High School</option>
    </select>
  </div>
  <div class="form-group">
    <label for="budget">Budget:</label>
    <input type="number" class="form-control" id="budget" name="budget" required>
  </div>
  <div class="form-group">
    <label for="gender">Gender:</label><br>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="gender" id="gender-female" value="female" required>
      <label class="form-check-label" for="gender-female">Female</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="gender" id="gender-male" value="male" required>
      <label class="form-check-label" for="gender-male">Male</label>
    </div>
  </div>
  <div class="form-group">
    <label for="file">File upload:</label>
    <input type="file" class="form-control-file" id="file" name="file">
  </div>
  <button type="submit" name="submit"class="btn btn-primary">Submit</button>
</form>