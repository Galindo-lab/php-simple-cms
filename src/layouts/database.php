<h1>Test de Base de datos</h1>

<?php
require_once __DIR__ . '/../app/managers.php';

// imprimir los datos de todos los usuarios
foreach (UserManager::all() as $user) {
    echo $user['username'] . " | " . $user['email'] . "<br>";
}
?>
