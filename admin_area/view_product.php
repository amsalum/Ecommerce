<!DOCTYPE html>
<html>
<head>
	<title>All Products</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		.product_image {
			width: 30%;
			height: 30%;
			object-fit: contain;
		}
	</style>
</head>
<body>
	<h1 class="text-center text-success">All Products</h1>
	<table class="table table-bordered bg-info mt-4">
		<thead>
			<tr>
				<th>ID</th>
				<th>Full Name</th>
				<th>Image</th>
				<th>Location</th>
				<th>Subject</th>
			</tr>
		</thead>
		<tbody class="bg-secondary text-light">
			<?php
			include('../includes/connect.php');
			$get_teacher = "SELECT teach_id,name,file_name,location,subject from teacher";
			$teacher_result = mysqli_query($con, $get_teacher);
			$number = 1;
			while ($row = mysqli_fetch_assoc($teacher_result)) {
				$teacher_id = $row['teach_id'];
				$teacher_name = $row['name'];
				$teacher_image = $row['file_name'];
				$teacher_location = $row['location'];
				$teacher_subject= $row['subject'];
			?>
			<tr class="text-center">
				<td><?php echo $teacher_id ?></td>
				<td><?php echo $teacher_name ?></td>
				<td><img src="./upload/<?php echo $teacher_image?>" class="product_image"></td>
				<td><?php echo $teacher_location ?></td>
				<td><?php echo $teacher_subject ?></td>
			</tr>
			<?php
				$number++;
			}
			?>
		</tbody>
	</table>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h3 class="text-danger">Are you sure you want to delete this product?</h3>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
					<a href='index.php?delete_product=<?php echo $teacher_id ?>'><button type="button" class="btn btn-primary">Yes</button></a>
				</div>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>