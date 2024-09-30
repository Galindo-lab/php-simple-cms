<?php
// Mostrar errores en PHP para ayudar con la depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Clase base para las vistas
abstract class View {
    public function get() {
        echo "GET request not handled for this view.";
    }

    public function post() {
        echo "POST request not handled for this view.";
    }
}

// Clase HomeView que maneja la página de inicio ("/")
class HomeView extends View {
    public function get() {
        echo "<h1>Home Page (GET)</h1>";
    }
}

// Clase AboutView que maneja la página "/about"
class AboutView extends View {
    public function get() {
        echo "<h1>About Us (GET)</h1>";
    }
}

// Clase ContactView que maneja la página "/contact"
class ContactView extends View {
    public function get() {
        echo '<h1>Contact Us (GET)</h1>';
        echo '<form action="/contact" method="POST">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required>
                <br>
                <label for="message">Mensaje:</label>
                <textarea id="message" name="message" required></textarea>
                <br>
                <input type="submit" value="Enviar">
              </form>';
    }

    public function post() {
        if (isset($_POST['name']) && isset($_POST['message'])) {
            echo "<h1>Gracias, " . htmlspecialchars($_POST['name']) . ". Hemos recibido tu mensaje:</h1>";
            echo "<p>" . htmlspecialchars($_POST['message']) . "</p>";
        } else {
            echo "<h1>Por favor, completa todos los campos del formulario.</h1>";
        }
    }
}


$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

echo "Path: " . $path . "<br>";
echo "Method: " . $method . "<br>";

// Determinar qué vista utilizar basándonos en la ruta
switch ($path) {
    case '/':
        $view = new HomeView();
        break;
    case '/about':
        $view = new AboutView();
        break;
    case '/contact':
        $view = new ContactView();
        break;
    default:
        http_response_code(404);
        echo "<h1>404 Not Found</h1>";
        return;
}

// Llamar al método correcto basado en el método HTTP
if ($method === 'GET') {
    $view->get();
} elseif ($method === 'POST') {
    $view->post();
} else {
    http_response_code(405); // Método no permitido
    echo "<h1>405 Method Not Allowed</h1>";
}
