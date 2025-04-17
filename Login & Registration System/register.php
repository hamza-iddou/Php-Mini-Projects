<?php
include("conn.php");

$message = "";
function fieldarefillin($name,$email,$pass, &$msg){
    if(empty($name)||empty($email)||empty($pass)){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)){
            $msg = "Enter a Valid Email";
            return false;
        }
        $msg = "All field are required";
        return false;
    }else{
    $msg = "";
    return true;
    }
}

if(isset($_POST['register']) && fieldarefillin($_POST['name'],$_POST['email'],$_POST['password'],$message)){
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $pass = mysqli_real_escape_string($con,$_POST['password']);
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

    $r = mysqli_query($con,"INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPass')");
    
    if($r){
        $message = "You re register has been succesfully";
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name"><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email"><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password"><br><br>
        <input type="submit" name="register" value="Login">
    </form>
    <?php echo $message;?>
</body>
</html>