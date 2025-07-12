<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "test";

    $dbConnection = mysqli_connect($host,$user,$pass,$db);


    if(isset($_GET['install'])){

        $sql = "CREATE TABLE `tbl_user`( 
        `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
        `name` text NOT NULL, 
        `pic` text NOT NULL)";

        if(mysqli_query($dbConnection,$sql)){
            echo "Database Installed  successfully.<br>";
            echo "<a href='index.php'>Home</a>";
        }
    }