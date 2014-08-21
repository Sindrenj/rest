<?php 
	/***
	* index.php 
	* Entrypointfile for the REST-Service.
	* - Sindre Njøsen
	*/
	DEFINE('NAME_OF_ENDPOINT', "/api");
	
	//Include necessary files:
	include_once "lib/Router.php";
	include_once "lib/Controller.php";
	include_once "lib/Controllers/UsersController.php";
	include_once "lib/Model.php";
	$controller_path = "lib/";

	//1. Get the correct route and method:
    $route = new Router( $_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD'], NAME_OF_ENDPOINT );
	//2. Parse the URI to get the requested resource(s): 
	$route->parseRequest();	 
	
	if( !is_null( $route->controller )) {
		if( class_exists($controller_path . $route->controller . "Controller")) {
			$controller = new $route->controller(null);
		} else {
			header('HTTP/1.0 400 Bad Request');
			echo "The request cannot be fullfilled. Cannot find: " . $this->controller;
		}
	} else {
		header('HTTP/1.0 400 Bad Request');
		echo "Unknown request, no path defined.";
	}
	
	
	//$model = new $route->$model();	
	//4. Load the correct controller which will deliver the resource(s):
	//$controller = new $route->$controller( $method, $model );
	//5.
	//echo $route->controller;
	
	
	
	
	
	
	
		 
	 
	 
	
	function debug() {
		echo $route->controller;
	 	echo "<br> Arguments:";
	    var_dump($route->arguments);
	}
	
