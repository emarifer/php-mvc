<?php

spl_autoload_register(function ($class_name) {
    $path = '../' . str_replace('\\', '/', $class_name) . '.php';

    if (file_exists($path)) {
        require_once $path;
    } else {
        die("Could not load class $class_name");
    }
});

/* 
Explicación del autoload. VER:
https://www.youtube.com/watch?v=lP1hbkNA2uc

IMPORTANTE: EN LINUX HAY QUE TENER CUIDADO CON EL NOMBRE
DE LA CARPETA, YA QUE LINUX ES CASE SENSITIVE
*/
