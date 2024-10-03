<?php
require_once 'settings.php';
require_once 'app/views.php';
require_once 'routes.php';

// Obtener el método de la solicitud HTTP
$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Obtener los parámetros de la URL (query string) para GET requests
$queryParams = $_GET;

// Obtener los datos enviados en el cuerpo de la solicitud para POST requests
$postData = $_POST;


try {
    // Obtener la clase de la vista correspondiente al path utilizando match
    $viewClass = $routes[$path] ?? throw new Exception("404 Not Found");
    // Instanciar la clase correspondiente
    $view = new $viewClass();

    // Llamar al método correcto utilizando handleRequest() y pasando los parámetros según el método HTTP
    match ($method) {
        'GET' => $view->get($queryParams),
        'POST' => $view->post($postData),
        default => throw new Exception("Request method '$method' not supported.")
    };
    
} catch (Exception $e) {
    // Manejar los errores, tanto 404 como 405
    if ($e->getMessage() === "404 Not Found") {
        http_response_code(404); // Código de error 404 - No encontrado
        include_once __DIR__ . '/layouts/exeptions/404.php';
    } elseif ($e->getMessage() === "Request method '$method' not supported.") {
        http_response_code(405); // Código de error 405 - Método no permitido
        include_once __DIR__ . '/layouts/exeptions/405.php';
    } else {
        http_response_code(500); // Código de error 500 - Error interno del servidor
        include_once __DIR__ . '/layouts/exeptions/500.php';
        echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>"; // Mostrar detalles del error
    }
}
