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
?>

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Blog : <?=$fetchs['title']?></title>
</head>
<body>
    
</body>
</html>