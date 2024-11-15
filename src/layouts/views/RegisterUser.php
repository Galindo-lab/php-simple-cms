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
        <form action="/register" method="post">

            <!-- Username Field -->
            <p>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" maxlength="50" required>
            </p>

            <!-- Email Field -->
            <p>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" maxlength="100" required>
            </p>

            <!-- Password Field -->
            <p>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </p>

            <!-- Submit Button -->
            <button type="submit">Crear usuario</button>

        </form>
    </dialog>


</body>

</html>