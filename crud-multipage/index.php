<!DOCTYPE html>
<html>
<head>
	<title>add data to mysqli</title>
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

<a href="add.php">add new</a>
	<?php
				$c = mysqli_connect('localhost','root','','adif_broadband_db');

				$do = "SELECT *
				FROM client_list";

				$done = mysqli_query($c,$do);

				while($show = mysqli_fetch_assoc($done)){
					echo $show['name'];
					echo "<a href='update.php?id=".$show['id']."'>Edit</a> ";
					echo "<a href='delete.php?id=".$show['id']."'>Delete</a><br>";
				}
	?>


</body>
</html>

<!-- database name: adif_broadband_db -->
<!-- table name: client_list -->
<!-- table colmn: id,name -->