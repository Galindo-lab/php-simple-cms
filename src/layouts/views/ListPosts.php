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
        [ <a href="entries/new">Crear Post</a> ]
    </p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Title</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($posts as $post) {
                echo "<tr>";
                echo "<td>{$post['id']}</td>";
                echo "<td>{$post['user_id']}</td>";
                echo "<td>{$post['title']}</td>";
                echo "<td>{$post['updated_at']}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>