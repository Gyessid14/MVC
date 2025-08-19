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

    //editar tareas
    public function editar() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $tarea = $this->tareaModel->leerUno($id);
            if ($tarea) {
                include 'views/editar.php';
            } else {
                echo "Tarea no encontrada.";
            }
        } else {
            echo "ID de tarea no proporcionado.";
        }
    }

    //actualizar tareas
    public function actualizar() {
        if ($_POST) {
            $id = $_POST['id'];
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];

            if ($this->tareaModel->actualizar($id, $titulo, $descripcion)) {
                header("Location: index.php");
            } else {
                echo "Error al actualizar la tarea.";
            }
        } else {
            echo "ID de tarea no proporcionado.";
        }
    }

    public function eliminar() {
        if ($_GET) {
            $id = $_GET['id'];

            if ($this->tareaModel->eliminar($id)) {
                header("Location: index.php");
            } else {
                echo "Error al eliminar la tarea.";
            }
        } 
    }

}
?>