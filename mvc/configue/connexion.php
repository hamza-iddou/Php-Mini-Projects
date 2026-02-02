<?php 
$host = 'localhost';
$username = 'root';
$password = "";
$dbname = "todolist";


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname",
            $username , $password    
    );
}
catch(PDOException $p){
    die("error : ".$p->getMessage());
    exit;
}
?>