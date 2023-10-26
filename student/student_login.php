<?php
include('../includes/connect.php');
//include('../functon/commen_function.php');
// Start session
session_start();
// Process form data when submitted
if (isset($_POST['login_submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Check if email and password match a record in the database
  $sql = "SELECT * FROM student WHERE email='$email' AND password='$password'";
  $result = mysqli_query($con, $sql);

  if (mysqli_num_rows($result) == 1) {
    // Login successful
    $row = mysqli_fetch_assoc($result);

    // Set session variables
    $_SESSION['student_id'] = $row['id'];
    $_SESSION['student_name'] = $row['fullname'];
    $_SESSION['student_image'] = $row['image'];

    header("Location:../index.php");
    exit();
  } else {
    echo "Error: Invalid email or password.";
    exit();
  }
}
mysqli_close($con);

?>
<!DOCTYPE html>
<html>
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <!-- font  awesome  link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <style>
      body {
        background-color: #e6e6e6; /* Modified background color */
      }
      h2 {
        color: #007bff;
        text-align: center;
        margin-top: 50px;
      }
      form {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        margin-top: 30px;
        margin-bottom: 30px;
      }
      label {
        color: #555;
        font-weight: bold;
      }
      input[type="email"],
      input[type="password"] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
      }
      input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      input[type="submit"]:hover {
        background-color: #0069d9;
      }
      p {
        text-align: center;
      }
      a {
        color: #007bff;
      }
    </style>
</head>
<body>
  <div class="container">
    <h2>Student Login Form</h2>
    <form method="post" action="">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>

      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>

      <button type="submit" class="btn btn-primary" name="login_submit">Login</button>
    </form>

    <p>Don't have an account? <a href="register.php">Register here</a>.</p>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>