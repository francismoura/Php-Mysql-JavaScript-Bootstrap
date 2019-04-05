<?php 

class Route {

	public static $validRoutes = array();

	public static function set($route, $function) {

		self::$validRoutes[] = $route;

		//print_r($_GET['url']);
		//
		// echo "<pre>";
		// print_r($_REQUEST);
		// echo "</pre>";
		// 
		// 

		switch ($route) {
			case 'home':
				$function->__invoke();
				break;
			case 'cadastro':
				$function->__invoke();
				break;
			case 'index':
				$function->__invoke();
				break;
			default:
				echo "ERROOOOOOOOO";
				break;
		}
		
	}
	
}
?>