<?php

// Definición de la clase Database para manejar la conexión a la base de datos
class Database {
    // Propiedades privadas con los datos de conexión
    private $host = "localhost";      // Dirección del servidor de base de datos
    private $db_name = "mvc";         // Nombre de la base de datos
    private $username = "root";       // Usuario de la base de datos
    private $password = "";           // Contraseña del usuario
    public $conn;                     // Propiedad pública para almacenar la conexión



    // Método para obtener la conexión a la base de datos
    public function getConnection() {
        $this->conn = null;           // Inicializa la conexión como null
        try {
            // Intenta crear una nueva conexión PDO con los datos proporcionados
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            // Establece el conjunto de caracteres a UTF-8
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            // Si ocurre un error, muestra un mensaje con el error
            echo "Error de conexión: " . $exception->getMessage();
        }
        // Devuelve la conexión (puede ser un objeto PDO o null si falló)
        return $this->conn;
    }
}
?>

