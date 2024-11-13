<?php
session_start(); // Asegurarse de que las sesiones estén activas


// Clase base para las vistas
abstract class View {
    // Método GET por defecto
    public function get($params) {
        throw new Exception("GET request not handled for this view.");
    }

    // Método POST por defecto
    public function post($data) {
        throw new Exception("POST request not handled for this view.");
    }
}


abstract class ProtectedView extends View{

    public function get($params) {
        if (isset($_SESSION['loggedin'])) {
            $this->p_get($params);
        } else {
            http_response_code(response_code: 404);
            header('Location: /NotFound');
        }
    }

    public function post($params) {
        if (isset($_SESSION['loggedin'])) {
            $this->p_post($params);
        } else {
            http_response_code(response_code: 404);
            header('Location: /NotFound');
        }
    }


    public function p_get($params) {
        throw new Exception("GET request not handled for this view.");
    }

    // Método POST por defecto
    public function p_post($data) {
        throw new Exception("POST request not handled for this view.");
    }

}