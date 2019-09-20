<?php

function myAutoload($className)
{
	if (is_file(__DIR__.'/app/model/' . $className . '.php')) {
		include_once __DIR__.'/app/model/' . $className . '.php';
	} else if ((is_file(__DIR__.'/app/core/' . $className . '.php'))) {
		include_once __DIR__.'/app/core/' . $className . '.php';
	} else if (is_file('../app/controller/' . $className . '.php')) {
		include_once __DIR__.'/app/controller/' . $className . '.php';
	}
}

spl_autoload_register('myAutoload');

