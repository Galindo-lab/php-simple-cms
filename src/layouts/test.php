<?php

if (function_exists('mysqli_connect')) {
    echo "La extensión mysqli está instalada correctamente.";
} else {
    echo "La extensión mysqli NO está instalada.";
}

class UserPage {
    private $host = 'db'; // Nombre del servicio de MySQL en Docker
    private $dbname = 'mydb';
    private $user = 'root';
    private $password = 'rootpassword';
    private $conn;

    // Constructor: Establece la conexión a la base de datos
    public function __construct() {
        $this->connectDB();
    }

    // Conexión a la base de datos usando mysqli
    private function connectDB() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    // Método para obtener todos los usuarios
    public function getUsers() {
        $sql = "SELECT * FROM Users";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            // Mostrar los resultados
            $this->printTable($result);
        } else {
            echo "<p>No se encontraron usuarios.</p>";
        }
    }

    // Método para imprimir la tabla HTML con los usuarios
    private function printTable($result) {
        echo "<table border='1' cellpadding='10' cellspacing='0' style='width: 50%; margin: 50px auto; border-collapse: collapse;'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nombre</th>";
        echo "<th>Email</th>";
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }

    // Destructor: Cierra la conexión a la base de datos
    public function __destruct() {
        $this->conn->close();
    }
}

// Crear la página y cargar los usuarios
$page = new UserPage();
$page->getUsers();

?>
