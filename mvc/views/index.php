<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-4">

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Search Todos</h5>
                <form action="" method="post" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Search todos...">
                    <button name="searchBtn" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>


        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Add New Todo</h5>
                <form action="" method="post" class="d-flex">
                    <input type="text" name="title" class="form-control me-2" placeholder="Enter todo title...">
                    <button name="add" class="btn btn-success">Add</button>
                </form>
            </div>
        </div>


        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">Todo List</h5>
                <?php foreach ($todos as $todo): ?>
                    <div class="d-flex align-items-center justify-content-between p-3 mb-2 rounded 
                                <?= $todo['done'] == 0 ? 'bg-danger-subtle' : 'bg-success-subtle' ?>">
                        <p class="mb-0 fw-medium <?= $todo['done'] == 1 ? 'text-decoration-line-through text-muted' : '' ?>">
                            <?= htmlspecialchars($todo['title']) ?>
                        </p>

                        <div class="d-flex gap-2">

                            <?php if ($todo['done'] == 0): ?>
                                <form action="" method="post" class="mb-0">
                                    <input type="hidden" name="id" value="<?= $todo['id'] ?>">
                                    <button name="done" class="btn btn-sm btn-success">Mark Done</button>
                                </form>
                            <?php endif; ?>


                            <form action="" method="post" class="mb-0"
                                onsubmit="return confirm('Do you really want to delete this todo?')">
                                <input type="hidden" name="id" value="<?= $todo['id'] ?>">
                                <button name="delete" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>