<?php 
include("conn.php");
session_start();
$post_sql = mysqli_query($con, "SELECT * FROM posts");
$posts = mysqli_fetch_all($post_sql, MYSQLI_ASSOC);

$user_sql = mysqli_query($con,"SELECT * FROM users");
$users = mysqli_fetch_all($user_sql, MYSQLI_ASSOC); 

if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Hello <?=$_SESSION['user_name']?></title>
</head>
<body>
    
<h1 class="text-center text-light bg-dark p-5">Admin Dashboard</h1>
<div class="container mt-4">
  <div class="row">
        <div class="col-md-3 mb-4">
      <div class="card p-3 text-center">
        <a href="create_post.php" class="btn btn-success w-100 mb-2">Create New Post</a>
        <a href="manage_posts.php" class="btn btn-primary w-100 mb-2">Manage Posts</a>
        <a href="manage_users.php" class="btn btn-warning w-100 mb-2">Manage Users</a>
        <form action="" method="POST">
        <button href="" class="btn btn-danger w-100 mb-2" name="logout">Log out</button>
        </form>
      </div>
    </div>
    
    <div class="col-md-9 mb-4">
      <div class="card p-3">
        <h4>All Posts</h4>
        <table class="table">
          <thead>
            <tr>
              <th>Title</th>
              <th>Author</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($posts as $post): ?>
            <tr>
              <td><?= $post['title'] ?></td>
              <td>
                <?php
                foreach($users as $u){
                  if($u['id'] == $post['user_id']){
                    echo $u['username'];
                    break;
                  }
                }
                ?>
              </td>
              <td>
                <a href="edit_post.php?id=<?= $post['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                <a href="delete_post.php?id=<?= $post['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</body>
</html>
