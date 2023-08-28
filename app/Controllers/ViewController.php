<?php

namespace app\Controllers;

class ViewController
{
    public function view(string $view, array $data = []): string
    {
        // Desestructuramos los posibles datos que nos pueda
        // pasar el controlador
        extract($data);

        // Sobrescribimos la variable $view por si las vistas
        // estuvieran agrupadas en subdirectorios.
        // el patrón es «directory-home.view»
        $view = str_replace('-', '/', $view);

        if (file_exists("../resources/views/$view.php")) {
            ob_start();
            include "../resources/views/$view.php";
            $content = ob_get_clean();

            return $content;
        } else {
            return 'The view does not exist';
        }
    }
}

/* 
https://www.php.net/manual/es/function.ob-start.php
https://www.php.net/manual/es/function.ob-get-clean.php
https://www.php.net/manual/es/function.extract.php
*/
