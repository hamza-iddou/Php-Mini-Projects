<?php 
$hostname = 'localhost';
$username = 'root';
$pass = '';
$dbname = 'login';

$con = mysqli_connect($hostname,$username,$pass,$dbname);

if(!$con){
    echo "Connection faild". mysqli_error($con);
    die();
}
?>