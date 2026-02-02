<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        <input type="text" >
        <button>search</button>
    </form>
    <?php foreach($todos as $todo):?>
    <div style="display: flex; align-items:center;">
        <p><?= $todo['title'] ?></p>
        <form action="" >
            <button>done</button>
            <button>x</button>
        </form>
    </div>
    <?php endforeach ;?>
</body>
</html>