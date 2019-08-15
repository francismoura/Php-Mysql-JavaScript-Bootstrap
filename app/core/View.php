<?php

class View
{

	public static function CreateView($viewName)
	{
		if (Route::isRouteValid()) {
			if (file_exists('../app/view/pages/' . $viewName . '/' . $viewName . '.php')) {
				require_once '../app/view/pages/' . $viewName . '/' . $viewName . '.php';
			}
		}
	}
}