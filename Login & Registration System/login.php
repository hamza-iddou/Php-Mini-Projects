

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
    <?php include("header.php")?>
    <div class="container">
    <h1 class="text-center mt-3">Welcome To Our Website</h1>
    <form action="" method="POST">
    <div class="container mt-5">
    <div class="card p-3">
    <h1 class="card-title text-light bg-primary p-3">Log in</h1>
    <div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="Enter Your Name" name="name" value="<?php if(isset($_POST['name'])) echo htmlspecialchars($_POST['name'])?>">
  <label for="floatingInput">Name</label>
</div>
<div class="form-floating">
  <input type="password" class="form-control" id="floatingPassword" placeholder="Enter Your Email" name="password" value="<?php if(isset($_POST['password'])) echo htmlspecialchars($_POST['email'])?>">
  <label for="floatingPassword">Password</label>
  </div><br>
    </form>
    </div>

</body>
</html>