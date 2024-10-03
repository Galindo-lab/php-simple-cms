<?php
// https://refactoring.guru/design-patterns/singleton/php/example#:~:text=Singleton%20is%20a%20creational%20design,the%20modularity%20of%20your%20code.

class Connection {
    // Datos de conexión a la base de datos
    private $host = 'db'; // Nombre del servicio de MySQL en Docker
    private $dbname = 'mydb';
    private $user = 'root';
    private $password = 'rootpassword';
    private $conn;
    private static $instance = null;

    private function __construct() {
        // Crear una nueva conexión usando mysqli
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);

        // Comprobar si hay errores en la conexión
        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    // Método estático para obtener la única instancia de la clase
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Connection();
        }
        return self::$instance;
    }

    // Método para obtener la conexión a la base de datos
    public function getConnection() {
        return $this->conn;
    }
}

?>
