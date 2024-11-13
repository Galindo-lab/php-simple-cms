<?php

/******************************************************************************
 *                                                                            *
 * Funciones varias para simplificar la lógica del proyecto                   *
 *                                                                            *
 *****************************************************************************/

class Utils {


    /**
     * Muestra una plantilla de php utilizando los datos especificados.
     * basado en: https://ryangjchandler.co.uk/posts/build-your-own-template-engine-in-php-rendering-echo
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
