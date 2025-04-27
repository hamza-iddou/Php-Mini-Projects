<?php 
include("conn.php");
session_start();
if (empty($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$post = (int)$_GET['id']; // secure the id a little bit
$r_post = mysqli_query($con, "SELECT * FROM posts WHERE id = $post");
$fetchs = mysqli_fetch_assoc($r_post); 
$user_id = $fetchs['user_id'];
$r_user = mysqli_query($con,'SELECT * FROM users WHERE id = '.$user_id);
$fetchs_user = mysqli_fetch_assoc($r_user); 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="poststyle.css">
    <title>Blog : <?=$fetchs['title']?></title>
</head>
<body>
<h1 class="text-center text-light bg-dark p-5">Welcome to our Blog</h1>
    <div class="container">
    <h6 class=""><?=$fetchs['title'] ?></h6>
    </div>
    <div class="container">
        <img src="<?= $fetchs['image']?>" class="postimage">
        <p><?= $fetchs['content']?></p>
        <h6>created by <span class="text-primary"><?=$fetchs_user['username']?></span></h6>
        <h6>at <span class="text-primary">
    <?= date('Y-m-d', strtotime($fetchs['created_at'])) ?>
</span></h6>
    <a href="index.php" class="btn btn-danger">Back</a>
    </div>    
</body>
</html>