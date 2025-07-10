<?php

	if(isset($_GET['id'])){

			$id = $_GET['id'];
		}else{
			header('location:index.php');
		}


$c = mysqli_connect('localhost','root','','adif_broadband_db');

$do = "DELETE FROM client_list WHERE id = $id ";

$done = mysqli_query($c,$do);

if($done){
header('location:index.php');
}

?>