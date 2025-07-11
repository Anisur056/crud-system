<?php
	require ("db-config.php");

	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		header('location:index.php');
	}

	$sql = "SELECT * FROM `tbl_user` WHERE id= $id";
	$execute = mysqli_query($dbConnection,$sql);
	$data = mysqli_fetch_assoc($execute);


	if(isset($_POST['submit'])){
		$name = $_POST['name'];

		if(!isset($name) || trim($name) == ''){
			$error = "Input Cannot be empty";
		}else{
			$update_id = $_POST['id'];
			$update_name = $_POST['name'];
			$sql = "UPDATE `tbl_user` SET name = '$update_name' WHERE id = $update_id ";
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
			<form method="post">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h5>Crud-Multipage-update</h5>
					<a href="index.php" class="btn btn-sm btn-primary">< Home</a>
				</div>
				<div class="card-body">
						<div class="form-floating">
							<input name="name" type="text" class="form-control mb-2 <?php if(isset($error)){echo "is-invalid";} ?>" id="floatingInput" placeholder="" value="<?= $data['name'] ?>">
							<label for="floatingInput">User Name</label>
						</div>
						<input type="hidden" name="id" value="<?= $data['id'] ?>">
					</div>
				<div class="card-footer">
					<input class="btn btn-primary mb-2" type="submit" name="submit" value="Update">
				</div>
			</form>
		</div>
    </section>


    <script src="bootstrap.bundle.min.js"></script>
  </body>
</html>