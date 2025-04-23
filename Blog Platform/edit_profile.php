<?php
include("conn.php");
session_start();

$msg = "";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['cancel'])){
        header("Location: index.php");
        exit();
    }
    if(isset($_POST['edit'])){
        $u_name = $_POST['username'];
        $u_email = $_POST['email'];
        $u_password = $_POST['password'];
        if(empty($_FILE['image']['name'])){
            $image_path = 'images/image.png';
            $r = mysqli_query($con,"UPDATE users SET username='$u_name', email='$u_email', password='$u_password', image='$image_path' WHERE id='$_SESSION[user_id]'");
                if($r){
                    $msg = "Your account has been updated successfully";
                    $_SESSION['user_name'] = $u_name;
                    $_SESSION['user_email'] = $u_email;
                    $_SESSION['user_password'] = $u_password;
                    header("Location: index.php");
                    exit();
                    
                }else{
                    $msg = "Cant update Your profile";
                }
        }else{
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            
            if (!is_dir("images")) {
                mkdir("images");
            }
            $image_path = "images/" . $image;

            if(move_uploaded_file($image_tmp, $image_path)){
                $r = mysqli_query($con,"UPDATE users SET username='$u_name', email='$u_email', password='$u_password', image='$image_path' WHERE id='$_SESSION[user_id]'");
                if($r){
                    $msg = "Your account has been updated successfully";
                    $_SESSION['user_name'] = $u_name;
                    $_SESSION['user_email'] = $u_email;
                    $_SESSION['user_passwor'] = $u_password;
                    header("Location: index.php");
                    exit();
                    
                }else{
                    $msg = "Cant update Your profile";
                }
            }
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
    <style>
        .imagetext{
            margin-left: 1%;
        }
    </style>
    <title>Edit Your Prile</title>
</head>

<body>
    <h1 class="text-center text-light bg-dark p-5">Edit Your Profile</h1>
    <div class="container">
        <div class="card p-2">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Enter Your email" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : $_SESSION['user_name']; ?>">
                    <label for="floatingInput">username</label>
                </div class="form-floating mt-2">
                <div>
                    <label for="image" class="form-label imagetext">image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>
                <div class="form-floating mt-2">
                    <input type="email" class="form-control" id="floatingPassword" placeholder="Enter Your email" name="email" value="<?php echo isset($_POST['edit']) ? $_POST['email'] : $_SESSION['user_email']; ?>">
                    <label for="floatingPassword">email</label>
                </div>
                <div class="form-floating mt-2">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Enter Your password" name="password" value="<?php echo isset($_POST['edit']) ? $_POST['password'] : $_SESSION['user_password'];?>">
                    <label for="floatingPassword">password</label>
                </div>
                <input type="submit" value="Edit You're Profile" class="btn btn-success mt-2" name="edit">
                <input type="submit" value="Edit You're Profile" class="btn btn-danger mt-2" name="cancel">
            </form>
        </div>
    </div>
</body>

</html>