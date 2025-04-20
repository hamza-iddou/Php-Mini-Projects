<?php 
include("conn.php");
$code = "";
$message = "";
$err = false;
if(isset($_GET['code'])){
$code = mysqli_real_escape_string($con,$_GET['code']);
}
session_start();

if($code != ""){
$r = mysqli_query($con,"SELECT * FROM users where security_code = '$code'");
$user = mysqli_fetch_assoc($r);

if($user){
    $up = mysqli_query($con,"UPDATE users SET is_active = 1 where id =".(int)$user['id']);
    if($up){
        $message = "Account has been Activated";
        $err = true;
    }
}else{
    $message = "Invalid security code or expierd security code";
}
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $email = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, $password);

    $r =mysqli_query($con,"SELECT * FROM users WHERE email = '$email'");
    $user = mysqli_fetch_assoc($r);

    if($user && password_verify($password, $user['password'])){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_password'] = $user['password'];
        $err = false;
        $message = "Login hass benn succes fully";
        header("Location: main.php");
        exit();
    }else{
        $message = "Invalid password or email";
    }
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
    <?php include("header.php")?>
    <div class="container">
    <h1 class="text-center mt-3">Welcome To Our Website</h1>

    <form action="" method="POST">
    <div class="container mt-5">
    <div class="card p-3">

    <h1 class="card-title text-light bg-primary p-3">Log in</h1>
    <div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="Enter Your email" name="email" value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email'])?>">
  <label for="floatingInput">Email</label>
</div>
<div class="form-floating">
  <input type="password" class="form-control" id="floatingPassword" placeholder="Enter Your password" name="password" value="<?php if(isset($_POST['password'])) echo htmlspecialchars($_POST['password'])?>">
  <label for="floatingPassword">Password</label>
  </div><br>
  <input type="submit" value="Log in" class="text-center btn btn-primary" name="login" >
  <?php echo "<p>".$message."</p>";?>
    </form>
    </div>

</body>
</html>