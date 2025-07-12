<?php
	require ("db-config.php");

	if(isset($_POST['submit'])){
		$name = $_POST['name'];


		// If image file uploded in tmp location then move it to uploads folder.
		if(file_exists($_FILES['pic']['tmp_name'])){
			$file_name = $_FILES['pic']['name'];
			$file_ext = explode('.',$file_name);
			$tmp_file_location = $_FILES['pic']['tmp_name'];
			$move_file_location = 'uploads/'.rand().'.'.$file_ext[1];
			move_uploaded_file($tmp_file_location, $move_file_location);
		}else{
			$move_file_location = 'uploads/default.jpg';
		}
		
		// Update name & image path.
		if(!isset($name) || trim($name) == ''){
			$error = "Input Cannot be empty";
		}else{
			$sql = "INSERT INTO `tbl_user` (`name`,`pic`) VALUES ('$name','$move_file_location')";
			$execute = mysqli_query($dbConnection,$sql);
			if($execute){
				header('location: index.php');
			}
		}
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>crud-multipage-add</title>
	<link rel="stylesheet" href="bootstrap.min.css">
  </head>
  <body>
	  <section class="container py-5">

		<?php if(isset($error)): ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Empty Field.</strong> You cannot leave name empty.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php endif; ?>

		<div class="card">
			<form method="post" enctype="multipart/form-data">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h5>Crud-Multipage-add</h5>
					<a href="index.php" class="btn btn-sm btn-primary">< Home</a>
				</div>
				<div class="card-body">
					<div class="form-floating">
						<input name="name" type="text" class="form-control mb-2 <?php if(isset($error)){echo "is-invalid";} ?>" id="floatingInput" placeholder="">
						<label for="floatingInput">User Name</label>
					</div>
					<div class="mb-3">
						<label for="formFileSm" class="form-label">Upload Pic</label>
						<input class="form-control form-control-sm" id="formFileSm" type="file" name="pic">
					</div>
				</div>
				<div class="card-footer">
					<input class="btn btn-primary mb-2" type="submit" name="submit" value="Save">
				</div>
			</form>
		</div>
    </section>


    <script src="bootstrap.bundle.min.js"></script>
  </body>
</html>