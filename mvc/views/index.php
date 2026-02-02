<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="search">
        <button name="searchBtn">search</button>
    </form>
    <?php foreach ($todos as $todo): ?>
        <div style="display: flex; align-items:center; background:<?= $todo['done'] == 0 ? 'red' : 'green' ?>" >
            <p><?= $todo['title'] ?></p>

            <form action="" method="post">
                 <input type="hidden" name="id" value="<?= $todo['id']?>">   
                <button name="done">done</button>
                </form>
            <form action="" method="post">
                 <input type="hidden" name="id" value="<?= $todo['id']?>">   
                <button name="delete" onclick="confirm('do you want really delete this todo ?')">x</button>
                </form>
            
        </div>
    <?php endforeach; ?>
</body>

</html>