<?php

use lib\Route;
use app\Controllers\{HomeController, ContactController};

Route::get('/', [HomeController::class, 'index']);

Route::get('/contacts', [ContactController::class, 'index']);
Route::get('/contacts/create', [ContactController::class, 'create']);
// No entra en conflicto con la 2ª ruta por ser de tipo post
Route::post('/contacts', [ContactController::class, 'store']);
Route::get('/contacts/:id', [ContactController::class, 'show']);
Route::get('/contacts/:id/edit', [ContactController::class, 'edit']);
// No entra en conflicto con la 5ª ruta por ser de tipo post
Route::post('/contacts/:id', [ContactController::class, 'update']);
Route::post('/contacts/:id/delete', [ContactController::class, 'destroy']);

Route::dispatch();

/* Test de funcionamiento del enrutador

Route::get('/contact', function () {
    return 'Hello from the Contact Page!';
});

// Si el callback es una función muy pequeña, en lugar de
// definir un controlador, podemos usar una función callback
// definada al «vuelo»
Route::get('/about', function () {
    return 'Hello from the About Page!';
});

// El orden de colocación de las diferentes rutas
// importa: si colocamos esta ruta después '/courses/:slug'
// será esa la que macheará primero
// https://youtu.be/ALUM0JLcZrU?si=cUjIEMG59d56ebP9&t=2307
// Route::get('/courses/prueba', function () {
//     return "Hello from the Test Courses page";
// });

// En conclusión las rutas con parámetros debe
// ir al final del enrutador
Route::get('/courses/:slug', function ($slug) {
    return "The course is about: $slug";
});

*/
