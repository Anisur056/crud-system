<!DOCTYPE html>
<html>
<head>
	<title>crud-multipage-add</title>
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
			width:50%;
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
		if(isset($_POST['submit'])){

			$name = $_POST['name'];

			$c = mysqli_connect('localhost','root','','test');


			$do = "INSERT INTO `tbl_user` (name) VALUES ('$name')";

			$done = mysqli_query($c, $do);

			if($done){
				echo "successfully added";
				echo " <a href='add.php'>Add Another</a><br> ";
				echo " <a href='index.php'>view all</a><br> ";
			}else{
				echo "no";
			}

		}else{
	?>

	<form action="add.php" method='post'>
		
			<input type="name" name="name" placeholder="Enter Your Name"><br>
			<input type="submit" name="submit" value="submit">

	</form>

	<?php
		}
	?>

</body>
</html>