<?php
require_once __DIR__ . '/../../base/Config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= '../' . Config::$STATIC_ROOT . 'Lumpia.css' ?>">
</head>

<body>

    <dialog id="dialog" open>
        <b>Iniciar sesión</b>
        <p></p>
        <form action="/login" method="post">
            <p>
                <label for="username">Usuario</label>
                <input type="text" name="username">
            </p>

            <p>
                <label for="password">Contraseña</label>
                <input type="password" name="password">
            </p>

            <input type="submit" value="Aceptar">
        </form>
    </dialog>
</body>

</html>