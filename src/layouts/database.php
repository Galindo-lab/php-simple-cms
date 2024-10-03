<h1>Test de Base de datos</h1>

<?php

// imprimir los datos de todos los usuarios
foreach ($users as $user) {
    echo $user['username'] . " | " . $user['email'] . "<br>";
}
?>
