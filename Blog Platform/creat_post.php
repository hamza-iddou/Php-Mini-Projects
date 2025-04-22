<?php 
include "conn.php";

session_start();

$message = "";

if(empty($_SESSION)){
    header("location:login.php");
    exit();
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){

if($_POST['cancel']){
    header("location: post.php");
}
if($_POST['cratepost']){
    $tile = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $status = $_POST['status'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    
    if(!is_dir("images")){
        mkdir("images");
    }
    
    $image_path = "images/".$image;

    move_uploaded_file($image, $image_path);

    $r = mysqli_query($con,"INSERT INTO posts(title, content, image, category, status), VALUES ('$tile', '$content', '$image_path', '$category','$status')");

    if($r){
        header("Location: index.php");
        exit();
    }else{
        $message = "post won't create";
    }
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title> Create a Post</title>
</head>
<body>
    <h1 class="text-center text-light bg-dark p-5">Create a Post</h1>
    <div class="container">
    <div class="card">
        <div class="card-body">

            <form action="" method="POST">
                <div class="mb-3">
                    <label for="title" class="form-label">Post Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div>
                    <label for="image" class="form-label">Post Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Post Content</label>
                    <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                </div>
                <div>
                    <label for="category" class="form-label">Post Category</label>
                    <select class="form-select" id="category" name="category" required>
                        <option value="" disabled selected>Select a category</option>
                        <option value="Technology">Technology</option>
                        <option value="Health">Health</option>
                        <option value="Lifestyle">Lifestyle</option>
                        <option value="Travel">Travel</option>
                        <option value="Food">Food</option>
                        <option value="Tech">Technology</option>
                    </select>
                </div>
                <div>
                    <select name="status" id="" class="form-select mt-2">
                        <option value="draft">Draft</option>
                        <option value="publish">Publish</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-2" name="cratepost">Create Post</button>
                </form>
                <form action="" method="post">
                <button type="submit" class="btn btn-danger mt-2" name="cancel">Cancel</button>
            </form>
        </div>
    </div>

    </div>
</body>
</html>