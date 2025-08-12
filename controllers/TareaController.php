<?php
require_once 'models/TareaModel.php';
require_once 'config/Database.php';

class TareaController {
    private $db;
    private $tareaModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->tareaModel = new TareaModel($this->db);
    }

    //mostrar tareas
    public function home() {
        $tareas = $this->tareaModel->leer();
        include 'views/home.php';
    }

}

?>