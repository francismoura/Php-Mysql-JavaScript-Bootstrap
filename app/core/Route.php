<?php

include_once '../config/config.php';

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