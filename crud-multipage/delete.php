<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		header('location:index.php');
	}

	$c = mysqli_connect('localhost','root','','test');
	$do = "DELETE FROM `tbl_user` WHERE id = $id ";
	$done = mysqli_query($c,$do);

	if($done){
		header('location:index.php');
	}

?>