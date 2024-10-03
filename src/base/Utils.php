<?php

/******************************************************************************
 * Funciones varias para simplificar la logica del proyecto                   *
 *****************************************************************************/

class Utils {


    /**
     * Renderiza una plantilla de php utilizando los datos especificados.
     * @param string $template
     * @param array $data
     * @return void
     */
    public static function renderTemplate(string $template, array $data = []): void {
        extract(array: $data);
        ob_start();

        include_once __DIR__ . '/../layouts/' . $template;

        $output = ob_get_clean();
        echo $output;
    }
    
}
