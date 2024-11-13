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

    <form action="/posts/edit" method="post">
        <input type="hidden" name="user_id" value="<?= $user_id ?>">
        <input type="hidden" name="post_id" value="<?= $post_id ?>">

        <p>
            <label for="nombre">Nombre de la entrada:</label>
            <input type="text" id="nombre" name="name" value="<?= $title ?>" required>
        </p>

        <div>
            <button type="button" id="previewButton" onclick="togglePreview()">Ver Vista Previa</button>
            <button type="button" onclick="window.history.back()">Cancelar</button>
            <button type="submit">Enviar</button>
        </div>

        <p id="textarea-container">
            <textarea placeholder="Escribe el contenido de tu entrada aquí." id="mensaje" name="entry" rows="20" cols="30" required><?= $content ?></textarea>
            <small>Puedes agregar html y ver el resultado con la opción de vista previa</small>
        </p>

        <div id="preview-container" style="padding: 0.5em;">
            <!-- La vista previa se mostrará aquí -->
        </div>


    </form>

    <script>
        function togglePreview() {
            const textareaContainer = document.getElementById('textarea-container');
            const previewContainer = document.getElementById('preview-container');
            const mensaje = document.getElementById('mensaje').value;
            const previewButton = document.getElementById('previewButton');

            if (textareaContainer.style.display !== 'none') {
                // Mostrar vista previa y ocultar textarea
                previewContainer.innerHTML = mensaje;
                previewContainer.style.display = 'block';
                textareaContainer.style.display = 'none';
                previewButton.textContent = 'Editar Entrada';
            } else {
                // Mostrar textarea y ocultar vista previa
                textareaContainer.style.display = 'block';
                previewContainer.style.display = 'none';
                previewButton.textContent = 'Ver Vista Previa';
            }
        }
    </script>
</body>

</html>