<?php 
require "models\TodoMdel.php";
class TodoController{
    private $todoModels ;
    public function __construct($pdo)
    {
        $this->todoModels = new TodoModel($pdo);  
    }

    public function index(){
        $todos = $this->todoModels->all();

        if(){
            
        }
        require "views/index.php";
    }


}

?>