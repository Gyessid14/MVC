<?php
class TareaModel {           // Definición de la clase TareaModel
    private $conn;           // Propiedad privada para la conexión a la base de datos
    private $table_name = "tareas";                   // Nombre de la tabla en la base de datos

    public function __construct($db) {              // Constructor que recibe la conexión a la base de datos
        $this->conn = $db;                          // Asigna la conexión a la propiedad de la clase
    }

    //consultar tareas
    public function leer() {                        // Método para leer todas las tareas
        $query = "SELECT id, titulo, descripcion, fecha_creacion FROM " . $this->table_name . " ORDER BY fecha_creacion DESC"; // Consulta SQL para obtener las tareas ordenadas por fecha de creación descendente

        $stmt = $this->conn->prepare($query);   // Prepara la consulta SQL
        $stmt->execute();                      // Ejecuta la consulta

        return $stmt;                         // Retorna el resultado de la consulta
    }

    public function crear($titulo, $descripcion) {      // Método para crear una nueva tarea
        $query = "INSERT INTO ". $this -> table_name . " SET titulo=:titulo, descripcion=:descripcion";  // Consulta SQL para insertar una nueva tarea

        $stmt = $this->conn->prepare($query);        // Prepara la consulta SQL

        $titulo = htmlspecialchars(strip_tags($_POST['titulo']));       // Limpia y protege el título recibido por POST
        $descripcion = htmlspecialchars(strip_tags($_POST['descripcion']));            // Limpia y protege la descripción recibida por POST

        $stmt->bindParam(":titulo", $titulo);       // Asocia el parámetro :titulo con la variable $titulo
        $stmt->bindParam(":descripcion", $descripcion);         // Asocia el parámetro :descripcion con la variable $descripcion

        if ($stmt->execute()) {              // Ejecuta la consulta y verifica si fue exitosa
            return true;                       // Si fue exitosa, retorna true
        }
        return false;                          // Si no fue exitosa, retorna false
    }
}