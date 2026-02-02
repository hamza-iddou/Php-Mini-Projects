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

    public function done($id){
        $stmt = $this->pdo->prepare("UPDATE todo SET done = 1 WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function delete($id){
        $stmt = $this->pdo->prepare("DELETE FROM todo WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function search($value){
        $stmt = $this->pdo->prepare("SELECT * FROM todo WHERE title LIKE ?");
        $stmt->execute(["%".$value."%"]);
        $todos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $todos;
    }
    


}


?>