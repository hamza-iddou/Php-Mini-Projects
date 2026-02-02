<?php
require "models\TodoMdel.php";
class TodoController
{
    private $todoModels;
    public function __construct($pdo)
    {
        $this->todoModels = new TodoModel($pdo);
    }

    public function index()
    {
        $todos = $this->todoModels->all();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'], $_POST['done'])) {
            $id = $_POST['id'];
            $this->todoModels->done($id);
            header("Location: index.php");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'], $_POST['delete'])) {
            $id = $_POST['id'];
            $this->todoModels->delete($id);
            header("Location: index.php");
            exit;
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset( $_POST['searchBtn'], $_POST['search'])){
            $value = $_POST['search'];
            $todos = $this->todoModels->search($value);
        }


        require "views/index.php";
    }
}
