<?php 
$username = "root";
$password = "";
$host = "localhost";
$dbname = "blog";
$con = mysqli_connect($host, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>