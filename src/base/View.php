<?php

// Clase base para las vistas
abstract class View {
    // Método para manejar la solicitud según el tipo de request (GET o POST)
    public function handleRequest($requestMethod) {
        match ($requestMethod) {
            'GET' => $this->get(),
            'POST' => $this->post(),
            default => throw new Exception("Request method '$requestMethod' not supported."),
        };
    }

    // Método GET por defecto
    public function get() {
        throw new Exception("GET request not handled for this view.");
    }

    // Método POST por defecto
    public function post() {
        throw new Exception("POST request not handled for this view.");
    }
}