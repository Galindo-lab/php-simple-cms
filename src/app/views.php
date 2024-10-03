<?php
require_once __DIR__ . '/../base/View.php';
require_once __DIR__ . '/../base/Utils.php';


require_once __DIR__ . '/../app/managers.php';



/**
 * Vista para probar la base de datos, con ejemplos de Managers
 */
class DataBaseTestView extends View
{
    public function get($params): void
    {
        Utils::renderTemplate(template: 'database.php', data: [
            'users' => UserManager::all()
        ]);
    }
}




class UploadFiles extends View
{
    public function get($params): void
    {
        // nada que decir
    }

    public function post($data): void
    {
        $target_dir = "uploads/";
        // Construir la ruta completa del archivo a subir
        $target_file = $target_dir . basename(path: $_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;

        // Verificar si el archivo ya existe
        if (file_exists(filename: $target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Verificar si hubo algún error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.<br>";
        } else {
            if (move_uploaded_file(from: $_FILES["fileToUpload"]["tmp_name"], to: $target_file)) {
                echo "The file " . basename(path: $_FILES["fileToUpload"]["name"]) . " has been uploaded.<br>";
                echo "<img src='$target_file' alt='Uploaded Image' style='max-width: 500px;'><br>";
                echo "<a href='index.php'>Upload another file</a>";
            } else {
                echo "Sorry, there was an error uploading your file.<br>";
            }
        }
    }
}


/**
 * Clase HomeView que maneja la página de inicio ("/")
 */
class HomeView extends View
{
    public function get($params): void
    {
        Utils::renderTemplate(template: 'index.php', data: [
            'title' => 'Página de Inicio',
            'header' => 'Bienvenido a Mi Sitio Web',
            'content' => '<p>Este es el contenido dinámico de la página de inicio.</p>'
        ]);
    }
}

/**
 * Clase AboutView que maneja la página "/about"
 */
class AboutView extends View
{
    public function get($params): void
    {
        echo "<h1>About Us (GET)</h1>";
    }
}

/**
 * Clase ContactView que maneja la página "/contact"
 */
class ContactView extends View
{
    public function get($params): void
    {
        echo $params['a'];
        // Incluir el archivo de la plantilla
        include_once __DIR__ . '/../layouts/archivo.php';
    }

    public function post($data): void
    {
        if (isset($_POST['name']) && isset($_POST['message'])) {
            echo "<h1>Gracias, " . htmlspecialchars(string: $_POST['name']) . ". Hemos recibido tu mensaje:</h1>";
            echo "<p>" . htmlspecialchars(string: $_POST['message']) . "</p>";
        } else {
            echo "<h1>Por favor, completa todos los campos del formulario.</h1>";
        }
    }
}
