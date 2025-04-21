<?php 
include("conn.php");
session_start();
if(empty($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
if(isset($_GET['logout'])){
    session_destroy();
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>