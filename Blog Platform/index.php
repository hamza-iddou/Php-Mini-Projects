<?php 
include("conn.php");
session_start();

if(empty($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}




$post_sql = mysqli_query($con, "SELECT * FROM posts");
$posts = mysqli_fetch_all($post_sql, MYSQLI_ASSOC);

$user_sql = mysqli_query($con,"SELECT * FROM users");
$users = mysqli_fetch_all($user_sql, MYSQLI_ASSOC); 

if (isset($_GET['q'])) {
  $category = mysqli_real_escape_string($con, $_GET['q']);
  $query = mysqli_query($con, "SELECT * FROM posts WHERE category='$category'");
  
  while($post = mysqli_fetch_assoc($query)) {
      echo "<div class='card p-3 m-2'>";
      echo "<h4>" . htmlspecialchars($post['title']) . "</h4>";
      echo "<p>" . substr(htmlspecialchars($post['content']), 0, 200) . "...</p>";
      echo "<img src='" . $post['image'] . "' alt='' style='max-width: 100%; height: auto;'>";
      echo "<a href='post.php?id=" . $post['id'] . "'>View More</a>";
      echo "</div>";
  }
  exit();
}


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

    <!-- Profile Section -->
    <div class="col-md-3 mb-4">
      <div class="card p-3 text-center">
        <h1>Profile</h1>
        <img src="<?= $_SESSION['user_image'] ?>" class="rounded-circle mb-2 image" width="80" height="80" alt="User">
        <h5><?= $_SESSION['user_name'] ?></h5>
        <form action="" method="POST">
          <button class="btn btn-success btn-sm w-100" name="creat">Create Post</button>
          <button class="btn btn-primary btn-sm w-100 my-1" name="edit">Edit Profile</button>
          <button class="btn btn-danger btn-sm w-100" name="logout">Logout</button>
        </form>
      </div>
    </div>

    <!-- Posts Section -->
    <div class="col-md-6 mb-4">
    <div id="posts">
      <?php $posts = array_reverse($posts); ?>
      <?php foreach($posts as $post): ?>
        <div class="card p-3 m-2">
          <h6>Created By <span class="text-info">
            <?php 
            foreach($users as $u){
              if($u['id'] == $post['user_id']){
                echo " " . $u['username'];
                break;
              }
            } 
            ?>
          </span></h6>
          <h4 class="mb-3"><?= $post['title'] ?></h4>
          <p><?= substr($post['content'], 0, 200) ?>...
            <a href="post.php?id=<?= $post['id'] ?>">View More</a>
          </p>
          <img src="<?= $post['image'] ?>" alt="" class="img-fluid">
        </div>
      <?php endforeach; ?>
      </div>
    </div>

    <!-- Recent Posts + Filter Section -->
    <div class="col-md-3 mb-4">
      <div class="card p-3">
        <h6>Recent Posts</h6>
        <p>
          <?php
          $cpt = 0;
          foreach($posts as $post){
            $id_post_link = $post['id'];
            echo "<a href='post.php?id=" . $id_post_link . "'>" . substr($post['title'], 0, 20) . "...</a><br>";
            $cpt++;
            if($cpt == 4){
              break;
            }
          }
          ?>
        </p>
        <div>
          <form action="" method="post">
            <label for="category" class="form-label">Post Category</label>
            <select class="form-select" id="category" name="category" onchange="filterPosts(this.value)">
              <option value="-1">Select category</option>
              <option value="Technology">Technology</option>
              <option value="Health">Health</option>
              <option value="Lifestyle">Lifestyle</option>
              <option value="Travel">Travel</option>
              <option value="Food">Food</option>
            </select>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>


<script src="filter.js"></script>    
</body>
</html>