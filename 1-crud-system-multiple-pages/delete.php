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

	// Delete old image, Except default image.
	if($data['pic'] === 'uploads/default.jpg'){
		// Do nothing.
	}else{
		unlink($data['pic']);
	}

	$sql = "DELETE FROM `tbl_user` WHERE id = $id ";
	$execute = mysqli_query($dbConnection,$sql);

	if($execute){
		header('location:index.php');
	}

?>