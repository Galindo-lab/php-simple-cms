<?php
require_once __DIR__ . '/../../base/Config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=delete_forever" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=edit" />

    <title>Document</title>

    <link rel="stylesheet" href="<?= '../' . Config::$STATIC_ROOT . 'Lumpia.css' ?>">


    <style>
        th:nth-child(4),
        td:nth-child(4) {
            text-align: right;
        }
    </style>
</head>

<body>
    <nav style="display: flex; justify-content: space-between; margin: 1rem 0 1rem 0rem;">
        <b>Bienvenido a SCMS</b>
        <a href="logout">Cerrar Sesión</a>
    </nav>
    <hr>


    <div style="margin-top: 5rem;">

        <div style="display: flex; justify-content: space-between; margin: 1rem 0 1rem 0rem;">
            <b>Posts</b>
            <a href="posts/new">
                Crear Post
            </a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($posts as $post) {
                    echo "<tr>";
                    echo "<td>{$post['id']}</td>";
                    echo "<td><a href='/posts/view?id={$post['id']}'>{$post['title']}</a></td>";
                    echo "<td>{$post['created_at']}</td>";
                    echo "<td>";
                    echo "<a href='/posts/delete?id={$post['id']}'>[eliminar]</a>";
                    echo " <a href='/posts/edit?id={$post['id']}'>[editar]</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <br>


        <div style="display: flex; justify-content: space-between; margin: 1rem 0 1rem 0rem;">
            <b>Usuarios</b>
            <a href='/register'>
                Crear Usuario
            </a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($users as $user) {
                    echo "<tr>";
                    echo "<td>{$user['id']}</td>";
                    echo "<td><a href='/posts/view?id={$user['id']}'>{$user['username']}</a></td>";
                    echo "<td>{$user['created_at']}</td>";
                    echo "<td>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

    </div>
</body>

</html>