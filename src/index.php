<?php
require_once 'settings.php';
require_once 'manager/views.php';

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
        include 'manager/layouts/404.php';
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
