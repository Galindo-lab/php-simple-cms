<?php 
require_once 'base/View.php';

/**
 * Clase HomeView que maneja la página de inicio ("/")
 */
class HomeView extends View {
    public function get() {
        echo "<h1>Home Page (GET)</h1>";
    }
}

/**
 * Clase AboutView que maneja la página "/about"
 */
class AboutView extends View {
    public function get() {
        echo "<h1>About Us (GET)</h1>";
    }
}

/**
 * Clase ContactView que maneja la página "/contact"
 */
class ContactView extends View {
    public function get() {
        // Incluir el archivo de la plantilla
        include 'layouts/contact.php';
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