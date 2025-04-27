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
<h1 class="text-center text-light bg-dark p-5">Welcome to Our Blog</h1>
<div class="container text-center my-5">
    <h2 class="mb-4"><?= htmlspecialchars($fetchs['title']) ?></h2>
    <img src="<?= htmlspecialchars($fetchs['image']) ?>" class="postimage d-block mx-auto mb-4" alt="Post Image">
    <p class="lead" style="text-align: justify;"><?= htmlspecialchars($fetchs['content']) ?></p>
    <h6 class="mt-4">Created by 
        <span class="text-primary"><?= htmlspecialchars($fetchs_user['username']) ?></span>
    </h6>
    <h6>At 
        <span class="text-primary"><?= date('Y-m-d', strtotime($fetchs['created_at'])) ?></span>
    </h6>
    <a href="index.php" class="btn btn-danger mt-4">Back</a>
</div>

</body>
</html>