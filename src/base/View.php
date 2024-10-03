<?php

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