<?php 

include("conn.php");
session_start();

if(empty($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
$r = mysqli_query($con, "SELECT * FROM posts");
$posts = mysqli_fetch_all($r, MYSQLI_ASSOC);


    if(isset($_POST['creat'])){
        header("Location: creat_post.php");
        exit();
    }elseif(isset($_POST['edit'])){
        header("Location: edit_profile.php");
        exit();
    }elseif(isset($_POST['logout'])){
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
    <link rel="stylesheet" href="style.css">
    <title>Blog</title>
</head>
<body>
    <h1 class="text-center text-light bg-dark p-5">Welcome to our Blog</h1>
    <div class="container mt-4">
  <div class="row">

    
    <div class="col-md-3 mb-4">
      <div class="card p-3 text-center">
        <h1>Profile</h1>
        <img src="./images/image.png" class="rounded-circle mb-2 image" width="80" height="80" alt="User">
        <h5><?= $_SESSION['user_name']?></h5>
        <form action="" method="POST">
        <button class="btn btn-success btn-sm w-100" name="creat">Creat Post</button>
        <button class="btn btn-primary btn-sm w-100 my-1" name="edit">Edit Profile</button>
        <button class="btn btn-danger btn-sm w-100" name="logout">Logout</button>
        </form>
      </div>
    </div>

    
    <div class="col-md-6 mb-4">
      <div class="card p-3">
        <h4 class="mb-3">Post Title</h4>
        <p>Post content goes here. Display your blog content in the center.</p>
      </div>
    </div>

    
    <div class="col-md-3 mb-4">
      <div class="card p-3">
        <h6>Recent Post</h6>
        <p>Another small post preview or recent activity...</p>
      </div>
    </div>

  </div>
</div>    
</body>
</html>