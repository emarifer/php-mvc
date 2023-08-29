<?php

namespace lib;

class Route
{
    private static array $routes;

    public static function get(string $uri, callable | array $callback): void
    {
        $uri = trim($uri, '/');
        self::$routes['GET'][$uri] = $callback;
    }

    public static function post(string $uri, callable | array $callback): void
    {
        $uri = trim($uri, '/');
        self::$routes['POST'][$uri] = $callback;
    }

    public static function dispatch(): void
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = trim($uri, '/');

        // Verificación de queries de paginación
        if (strpos($uri, '?') !== false) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }

        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes[$method] as $route => $callback) {
            // Advertencia sobre el uso strpos:
            // https://www.php.net/manual/es/function.strpos.php#refsect1-function.strpos-returnvalues

            // Motivo por el que sobrescribimos el valor $route:
            // https://youtu.be/ALUM0JLcZrU?si=iO4-Yz8_l8yVLB2S&t=872
            if (strpos($route, ':') !== false) {
                $route = preg_replace('#:[a-zA-Z]+#', '([a-zA-Z0-9-]+)', $route);
                // Se trata de que $route tenga en lugar de ':slug' una
                // expresión regular que machee con la parte de la $uri que
                // venga detrás del slash ('/'). Esta regex macheará con
                // cualquier cadena alfanumérica ('[a-zA-Z0-9-]+') que
                // además pueda contener guiones ('-'). Este valor lo guardamos
                // en un grupo o subpatrón

                /* echo $route;

                return; */
            }


            // En $matches podemos recuperar la coincidencia
            // del grupo o subpatrón
            if (preg_match("#^$route$#", $uri, $matches)) {
                // El primer valor del string[] que es $matches
                // es la cadena completa; apartir del segundo (índice [1])
                // es el valor o valores que buscamos

                // print_r("<br>{$matches[1]}");
                // Con array_slice podemos un recuperar un array
                // de coincidencias apatir del índice [1]
                // si la ruta en cuestión lo necesita
                $params = array_slice($matches, 1);

                // echo json_encode($params);

                // Esparcimos con el spread operator el array $params
                // para pasárselo al callback como variables separadas
                /* $response = $callback(...$params); */

                if (is_callable($callback)) {
                    $response = $callback(...$params);
                }

                if (is_array($callback)) {
                    $controller = new $callback[0];

                    $response = $controller->{$callback[1]}(...$params);
                }

                if (is_array($response) || is_object($response)) {
                    header('Content-Type: application/json');

                    echo json_encode($response);
                } else {
                    echo $response;
                }

                return;
            }
        }

        echo '404 Not Found';
    }
}
