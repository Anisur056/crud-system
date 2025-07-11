<?php
	require ("db-config.php");

	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		header('location:index.php');
	}

	$sql = "DELETE FROM `tbl_user` WHERE id = $id ";
	$execute = mysqli_query($dbConnection,$sql);

	if($execute){
		header('location:index.php');
	}

?>