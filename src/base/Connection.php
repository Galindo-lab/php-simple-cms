<?php

/*****************************************************************************
 * Basado en el artículo de 'Refactoring Guru':                              *
 * https://refactoring.guru/es/design-patterns/singleton/php/example         *
 *                                                                           *
 * Connection es un singleton que contiene toda la informacion sobre la base *
 * de datos asi como las credenciales para accesar, ademas permite obtener   *
 * la conexión.                                                              *
 *****************************************************************************/

class Connection
{
    private $host = 'db';
    private $dbname = 'mydb';
    private $user = 'root';
    private $password = 'rootpassword';
    private $conn;
    private static $instance = null;

    private function __construct()
    {
        // Crear una nueva conexión usando mysqli
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);

        // Comprobar si hay errores en la conexión
        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    // Método estático para obtener la única instancia de la clase
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Connection();
        }
        return self::$instance;
    }

    // Método para obtener la conexión a la base de datos
    public function getConnection()
    {
        return $this->conn;
    }
}
