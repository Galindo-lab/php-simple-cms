<?php
require_once __DIR__ . '/../../base/Config.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear una entrada</title>

    <link rel="stylesheet" href="<?= '../' . Config::$STATIC_ROOT . 'Lumpia.css' ?>">

</head>

<body>
    <h1>Crear una entrada</h1>

    <form action="/entry/new" method="post">
        <p>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="name" required>
            <small>Introduce el nombre de la entrada.</small>
        </p>

        <p>
            <label for="mensaje">Entrada:</label>
            <textarea id="mensaje" name="entry" rows="20" cols="30" required></textarea>
            <small>Escribe el contenido de tu entrada aquí.</small>
        </p>

        <button type="button"> Cancelar </button>
        <button type="submit">Enviar</button>
    </form>
</body>

</html>