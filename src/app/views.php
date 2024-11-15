<?php
require_once __DIR__ . '/../base/View.php';
require_once __DIR__ . '/../base/Utils.php';
require_once __DIR__ . '/../app/managers.php';


/**
 * Editar post
 */
class EditPost extends View
{
    public function get($params): void
    {
        if (isset($_GET['id'])) {
            $id = intval(value: $_GET['id']); // Asegurarse de que sea un entero
            $post = PostsManager::getById(id: $id); // asegurarse que le post existe

            Utils::renderTemplate(template: 'views/CreatePost.php', data: [
                'title_value' => $post['title'],
                'entry_value' => $post['content'],
                'user_id' => $post['user_id'],
                'post_id' => $post['id'],
                'form_action' => '/posts/edit'
            ]);
        }
    }


    public function post($params): void
    {
        if (isset($_POST['post_id'], $_POST['title'], $_POST['entry'])) {
            $postId = $_POST['post_id'];
            $name = $_POST['title'];
            $entry = $_POST['entry'];

            // Actualizar solo los campos del post.
            $post_updated = PostsManager::updatePost(postId: $postId, fields: [
                'title' => $name,
                'content' => $entry
            ]);

            if ($post_updated) {
                Utils::redirect('/posts');
            } else {
                echo "Error al actualizar el post.";
            }
        } else {
            echo "Faltan parámetros necesarios.";
        }
    }
}



/**
 * Eliminar post
 */
class DeletePost extends View
{
    public function get($params): void
    {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']); // Asegurarse de que sea un entero

            if (PostsManager::deleteById($id)) {
                Utils::redirect('/posts');
            } else {
                echo "Error";
            }
        }
    }
}


/**
 * Desloggearse del sisitema
 */
class NotFound404 extends View
{
    public function get($params): void
    {
        Utils::renderTemplate(template: 'exeptions/404.php');
    }
}


/**
 * Logout de usuarios
 */
class UserLogout extends View
{
    public function get($params): void
    {
        session_destroy();
        Utils::redirect('/login');
        exit();
    }
}


/**
 * Login de usuario
 */
class UserLogin extends View
{
    public function get($params): void
    {
        Utils::renderTemplate(template: 'views/LoginUser.php');
    }

    public function post($params): void
    {
        // Sanitiza los inputs para evitar problemas de seguridad básicos
        $username = trim(string: $_POST['username']);
        $password = trim(string: $_POST['password']);

        if (UserManager::verifyCredentials(username: $username, password: $password)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;

            header(header: 'Location: /posts');
        } else {
            echo "Nombre de usuario o contraseña incorrectos.";
        }
    }
}


/**
 * Vista con la entrada del blog
 */
class ViewPost extends View
{
    public function get($params): void
    {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']); // Asegurarse de que sea un entero
            $post = PostsManager::getById($id); // Obtener el post por ID

            Utils::renderTemplate(template: 'views/ViewPost.php', data: [
                'title' => $post['title'],
                'content' => $post["content"],
                'created_at' => $post["created_at"],
            ]);
        }
    }
}


/**
 * Vista para ver todos los posts hechos
 */
class MainView extends ProtectedView
{
    public function p_get($params): void
    {
        if (isset($_SESSION['loggedin'])) {
            Utils::renderTemplate(template: 'views/ListPosts.php', data: [
                'posts' => PostsManager::all(),
                'users' => UserManager::all()
            ]);
        }
    }
}


/**
 * Vista para crear Posts
 */
class CreatePost extends View
{
    public function get($params): void
    {
        Utils::renderTemplate(template: 'views/CreatePost.php', data: [
            'title_value' => '',
            'entry_value' => '',
            'form_action' => '/posts/new'
        ]);
    }

    public function post($params): void
    {
        // Datos del post
        $title = $_POST['title'];
        $content = $_POST['entry'];

        // falta validación 
        $user_id = UserManager::getIdByUsername(username: $_SESSION['username']);

        // Intentar crear el post
        if (PostsManager::create(title: $title, content: $content, user_id: $user_id)) {
            header('Location: /posts'); // regirigir al usuario
        } else {
            echo "Error al crear el post.";
        }
    }
}



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
        Utils::redirect('/login');

        /*
        Utils::renderTemplate(template: 'index.php', data: [
            'title' => 'Página de Inicio',
            'header' => 'Bienvenido a Mi Sitio Web',
            'content' => '<p>Este es el contenido dinámico de la página de inicio.</p>'
        ]);
        */

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
        // echo $params['a'];
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

