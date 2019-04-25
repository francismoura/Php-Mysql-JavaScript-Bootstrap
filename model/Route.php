<?php

$root = $_SERVER['DOCUMENT_ROOT'];
include_once ($root . '/config/config.php');

class Route
{
    //verificar se a rota existe
    public static function isRouteValid()
    {
        global $Routes;
        $uri = $_SERVER['REQUEST_URI'];

        if (!in_array(explode('?', $uri)[0], $Routes)) {
            return 0;
        } else {
            return 1;
        }
    }

    // This method creates dynamic routes.
    public static function dyn($dyn_routes) {
        // Split the route on '/', i.e user/<1>
        $route_components = explode('/', $dyn_routes);
        // Split the URI on '/', i.e user/francis
        $uri_components = explode('/', substr($_SERVER['REQUEST_URI'], strlen(BASE_PATH)-1));
        // Loop through $route_components, this allows infinite dynamic parameters in the future.
        for ($i = 0; $i < count($route_components); $i++) {
            // Ensure we don't go out of range by enclosing in an if statement.
            if ($i+1 <= count($uri_components)-1) {
                // Replace every occurrence of <n> with a parameter.
                $route_components[$i] = str_replace("<$i>", $uri_components[$i+1], $route_components[$i]);
            }
        }
        // Join the array back into a string.
        $route = implode($route_components, '/');
        // Return the route.
        return $route;
    }

    // Insere a rota dentro do array $Routes
    private static function registerRoute($route)
    {
        global $Routes;
        $Routes[] = BASE_PATH . $route;
    }

    // Registra a rota e utiliza __invoke() para executar a função "anônima"
    public static function set($route, $closure)
    {
        if ($_SERVER['REQUEST_URI'] == BASE_PATH . $route) {
            self::registerRoute($route);
            $closure->__invoke();
        } else if (explode('?', $_SERVER['REQUEST_URI'])[0] == BASE_PATH . $route) {
            self::registerRoute($route);
            $closure->__invoke();
        }
    }
}