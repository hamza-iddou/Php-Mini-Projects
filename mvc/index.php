<?php 

require "configue\connexion.php";
require "controller\TodoController.php";

$controller = new TodoController($pdo);
$controller->index();


?>