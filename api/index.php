<?php 
	/***
	* index.php 
	* Entrypointfile for the REST-Service.
	* - Sindre Njøsen
	*/
	//Set endpoint-file:
	DEFINE('NAME_OF_ENDPOINT', '/api');
	//Set paths to files:
	DEFINE('CONTROLLER_PATH', 'lib/Controllers/');
	DEFINE('MODEL_PATH', 'lib/Models');
	//Include necessary files:
	include_once "lib/Router.php";
	

	//1. Get the correct route and method:
    $route = new Router( $_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD'], NAME_OF_ENDPOINT );
	//2. Parse the URI to get the requested resource(s): 
	$route->parseRequest();	 
	//3. ....:
	//Create the filepath:
	$filePath = CONTROLLER_PATH . $route->getController() . "Controller.php";
	
		
	if( $route->getController() != "" ) {
		if( file_exists( $filePath)) {
			//Include the files:	
			include_once $filePath;
			
		} else {
			header('HTTP/1.0 400 Bad Request');
			echo "The request cannot be fullfilled. Cannot find the resource: " . $route->getController();
		}
	} else {
		header('HTTP/1.0 400 Bad Request');
		echo "Unknown request, no path defined.";
	}
		
			
	function debug() {
		echo "The controller: <br>";
		echo $route->controller;
	 	echo "<br> Arguments: <br>";
	    var_dump($route->arguments);
		echo "The correct path:<br>";
		var_dump($path);
	}
	
