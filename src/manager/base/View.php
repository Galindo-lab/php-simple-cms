<?php

// Clase base para las vistas
abstract class View {
    public function get() {
        echo "GET request not handled for this view.";
    }

    public function post() {
        echo "POST request not handled for this view.";
    }
}
