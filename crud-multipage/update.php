<!DOCTYPE html>
<html>
<head>
	<title>crud-multipage-update</title>
	<style type="text/css">
		body{
			margin: 0px;
			padding: 0px;
			font-family: arial;
			text-align: center;
		}
		form{
			margin-top: 130px;
			text-align: center;
		}
		input{
			with:50%;
			padding: 8px;
			border:1px solid #ff9900;
			transition: 0.3s;
			border-radius: 3px;
			margin: 8px;
		}
		input:focus{
			box-shadow: 0 0 12px #ff9900;
		}

	</style>
</head>
<body>

	<?php

		if(isset($_GET['id'])){
			$id = $_GET['id'];
		}else{
			header('location:index.php');
		}

		if(isset($_POST['submit'])){
			$id = $_POST['id'];
			$name = $_POST['name'];
			$c = mysqli_connect('localhost','root','','test');
			$do = "UPDATE `tbl_user` SET name = '$name' WHERE id = $id ";
			$done = mysqli_query($c,$do);
			if($done){
				header('location:index.php');
			}
		}else{


		$c = mysqli_connect('localhost','root','','test');
		$do = "SELECT * FROM `tbl_user` WHERE id= $id";
		$done = mysqli_query($c,$do);
		$show = mysqli_fetch_assoc($done);
			
		
	?>

	<form action="update.php?id=<?php $id;?>" method='post'>
		<input type="name" name="name" value="<?php echo $show['name'];?>"/><br>
		<input type="submit" name="submit" value="submit"/>
		<input type="hidden" name="id" value="<?php echo $id;?>">
	</form>
	<?php
	}
	?>
	</body>
</html>
