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
    public function index() {
        $tareas = $this->tareaModel->leer();
        include 'views/home.php';
    }

    //crear tareas
    public function crear() {
        include 'views/crear.php';
    }

    //guardar tareas
    public function guardar() {
        if ($_POST) {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];

            if ($this->tareaModel->crear($titulo, $descripcion)) {
                header("Location: index.php");
            } else {
                echo "Error al guardar la tarea.";
            }
        }

    }
}

?>