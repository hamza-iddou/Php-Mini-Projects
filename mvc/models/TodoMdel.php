<?php 

class TodoModel{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function all(){
        $todos = $this->pdo->query("SELECT * FROM todo")->fetchAll(PDO::FETCH_ASSOC);
        return $todos;
    }
    


}


?>