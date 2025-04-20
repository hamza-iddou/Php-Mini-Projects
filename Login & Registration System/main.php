<?php 
include("conn.php");
session_start();

if(empty($_SESSION)){
    header("Location: login.php");
    exit();
}



if($_SERVER['REQUEST_METHOD'] == 'POST'){
    session_unset();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Main</title>
</head>
<body>
    <H1 class="text-center mt-2">Welcome <?= $_SESSION['user_name']?></H1>
    <div class="container">
    <div class="card p-2" style="width: 18rem;">
  <img src="./images/image.png" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">HI! <?= $_SESSION['user_name']?> id#<?= $_SESSION['user_id']?></h5>
    <p class="card-text">email : <?= $_SESSION['user_email']?></p>
  </div>
  <form action="" method="POST">
<input type="submit" value="log out" name="logout" class="btn btn-danger mt-2 text-center">
  </form>
</div>
    </div>

</body>
</html>