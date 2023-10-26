<!DOCTYPE html>
<html>
<head>
	<title>Student Registration</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		body {
			background-color: #f2f2f2;
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
			box-shadow: 0 0 10px rgba(0,0,0,0.3);
			margin-top: 30px;
			margin-bottom: 30px;
		}
		label {
			color: #555;
			font-weight: bold;
		}
		.btn-primary {
			background-color: #007bff;
			border-color: #007bff;
		}
		.btn-primary:hover {
			background-color: #0069d9;
			border-color: #0062cc;
		}
	</style>
</head>
<body>
	<div class="container">
		<h2>Student Registration Form</h2>
			<form method="post" action="" enctype="multipart/form-data">
				<div class="form-group">
					<label for="fullname">Full Name:</label>
					<input type="text" class="form-control" id="fullname" name="fullname" required>
				</div>

				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" class="form-control" id="email" name="email" required>
				</div>

				<div class="form-group">
					<label for="image">Profile Image:</label>
					<input type="file" class="form-control-file" id="image" name="image" required>
				</div>

				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" class="form-control" id="password" name="password" required>
				</div>

				<div class="form-group">
					<label for="confirm_password">Confirm Password:</label>
					<input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
				</div>

				<div class="form-group">
					<label for="address">Address:</label>
					<textarea class="form-control" id="address" name="address" required></textarea>
				</div>

				<div class="form-group">
					<label for="phone_number">Phone Number:</label>
					<input type="tel" class="form-control" id="phone_number" name="phone_number" required>
				</div>

				<button type="submit" class="btn btn-primary" name="register_submit">Register</button>
			</form>

			<p>Already have an account? <a href="student_login.php">Login here</a>.</p>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>