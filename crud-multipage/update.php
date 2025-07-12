<?php
	require ("db-config.php");

	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		header('location:index.php');
	}

	// Select data base on id and select image path to delete image.
	$sql = "SELECT * FROM `tbl_user` WHERE id= $id";
	$execute = mysqli_query($dbConnection,$sql);
	$data = mysqli_fetch_assoc($execute);


	if(isset($_POST['update'])){
		$name = $_POST['name'];

		// Update image file uploded in tmp location then move it to uploads folder. 
		// Also delete old image file.
		if(file_exists($_FILES['pic']['tmp_name'])){
			$file_name = $_FILES['pic']['name'];
			$file_ext = explode('.',$file_name);
			$tmp_file_location = $_FILES['pic']['tmp_name'];
			$move_file_location = 'uploads/'.rand().'.'.$file_ext[1];
			move_uploaded_file($tmp_file_location, $move_file_location);
			
			// Delete old image, Except default image.
			if($data['pic'] === 'uploads/default.jpg'){
				// Do nothing.
			}else{
				unlink($data['pic']);
			}
		}else{
			$move_file_location = $data['pic'];
		}


		// Update Content & image path
		if(!isset($name) || trim($name) == ''){
			$error = "Input Cannot be empty";
		}else{
			$update_id = $_POST['id'];
			$update_name = $_POST['name'];
			$sql = "UPDATE `tbl_user` SET name = '$update_name', pic = '$move_file_location' WHERE id = $update_id ";
			$execute = mysqli_query($dbConnection,$sql);
			if($execute){
				header('location:index.php');
			}
		}
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>crud-multipage-update</title>
	<link rel="stylesheet" href="bootstrap.min.css">
	<style>
      .img-responsive{
        width: 200px;
        height: 200px;
      }
    </style>
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
					<h5>Crud-Multipage-update</h5>
					<a href="index.php" class="btn btn-sm btn-primary">< Home</a>
				</div>
				<div class="card-body">
						<div class="form-floating">
							<input name="name" type="text" class="form-control mb-2 <?php if(isset($error)){echo "is-invalid";} ?>" id="floatingInput" placeholder="" value="<?= $data['name'] ?>">
							<label for="floatingInput">User Name</label>
						</div>
						<img class="rounded-circle img-responsive" src="<?= $data['pic'] ?>">
						<div class="mb-3">
							<label for="formFileSm" class="form-label">Update Pic</label>
							<input class="form-control form-control-sm" id="formFileSm" type="file" name="pic">
						</div>
						<input type="hidden" name="id" value="<?= $data['id'] ?>">
					</div>
				<div class="card-footer">
					<input class="btn btn-primary mb-2" type="submit" name="update" value="Update">
				</div>
			</form>
		</div>
    </section>


    <script src="bootstrap.bundle.min.js"></script>
  </body>
</html>