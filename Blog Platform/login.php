<?php 
include("conn.php");

$message = "";
$err = false;
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $email = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, $password);

    $r =mysqli_query($con,"SELECT * FROM users WHERE email = '$email'");
    $user = mysqli_fetch_assoc($r);

    if($user && $user['password'] == $password){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_password'] = $user['password'];
        $_SESSION['user_name'] = $user['username'];
        $_SESSION['user_image'] = $user['image'];
        $_SESSION['is_admin'] = $user['is_admin'];
        $err = false;
        $message = "Login has been successful";
        if($_SESSION['is_admin']){
            header("Location: admindashborad.php");
            exit();
        }else{

        
        header("Location: index.php");
        exit();
    }
        }
    }else{
        $message = "Invalid password or email";
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
    <div class="container">
    <h1 class="text-center mt-3">Welcome To My Blog</h1>
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
  <?php
  if(isset($_POST['login'])){
      if($err){
          echo "<p class='mt-2 text-danger'>".$message."</p>";
      }else{
          echo "<p class='mt-2 text-success'>".$message."</p>";
      }
  }
  ?>
    </form>
    </div>

</body>
</html>