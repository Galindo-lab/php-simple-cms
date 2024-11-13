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
    <h1>Posts</h1>

    <p>
        <ul>
            <li><a href="posts/new">Crear Post</a></li>
        </ul>
        <ul>
            <li><a href="logout">Cerrar Sesión</a></li>
        </ul>
    </p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($posts as $post) {
                echo "<td>{$post['id']}</td>";
                echo "<td><a href='/posts/view?id={$post['id']}'>{$post['title']}</a></td>";
                echo "<td>{$post['created_at']}</td>";
                echo "<td>{$post['updated_at']}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>