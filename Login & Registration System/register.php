<?php
include("conn.php");
$message = "";
$erorr = false;
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
function validemail($con,$email ,&$msg){
        $email = mysqli_real_escape_string($con, $email);
        $r = mysqli_query($con,"SELECT * from users WHERE email='$email'");
        if(mysqli_num_rows($r) == 1){
            $msg = "This email has already been used.";
            return false;
        }
        return true;
}
if(isset($_POST['register']) && fieldarefillin($_POST['name'],$_POST['email'],$_POST['password'],$message)){
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $pass = mysqli_real_escape_string($con,$_POST['password']);
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
    if(validemail($con,$email,$message)){
    $r = mysqli_query($con,"INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPass')");
    $erorr = true;
    $message = "You re register has been succesfully";
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    
<form action="" method="post">
<div class="container mt-5">
    <div class="card p-3">
    <h1 class="card-title text-light bg-primary p-3">Register</h1>
    <div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="Enter Your Name" name="name">
  <label for="floatingInput">Name</label>
</div>
<div class="form-floating">
  <input type="email" class="form-control" id="floatingPassword" placeholder="Enter Your Email" name="email">
  <label for="floatingPassword">Email</label>
  </div><br>
<div class="form-floating">
  <input type="text" class="form-control" id="floatingPassword" placeholder="Enter Your Password" name="password">
  <label for="floatingPassword">password</label>
  </div>
  <br>
  <?php if($message != ""){
        if($erorr == false){

            echo "<p class='text-danger '>".$message."</p>";
        }else{
            echo "<p class='text-success '>".$message."</p>";
        }
    }?>
  <input type="submit" name="register" value="Register" class="btn btn-primary">
</div>
</div>
</form>

</body>
</html>