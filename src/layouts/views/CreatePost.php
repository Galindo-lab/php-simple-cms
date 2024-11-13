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

    <form action="/posts/new" method="post">
        <p>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="name" required>
            <small>Introduce el nombre de la entrada.</small>
        </p>


        <button type="button" id="previewButton" onclick="togglePreview()">Ver Vista Previa</button>
        <button type="submit">Enviar</button>
        <button type="button" onclick="cancel()">Cancelar</button>

        <p id="textarea-container">
            <textarea id="mensaje" name="entry" rows="20" cols="30" required></textarea>
            <small>Escribe el contenido de tu entrada aquí.</small>
        </p>

        <div id="preview-container">
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

        function cancel() {
            document.getElementById('mensaje').value = '';
            document.getElementById('preview-container').innerHTML = '';
            document.getElementById('preview-container').style.display = 'none';
            document.getElementById('textarea-container').style.display = 'block';
            document.getElementById('previewButton').textContent = 'Ver Vista Previa';
        }
    </script>
</body>

</html>