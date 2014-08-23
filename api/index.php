<?php 
	/***
	* index.php 
	* Entrypointfile for the REST-Service.
	* - Sindre Njøsen
	*/
	//Set the endpoint-filename(Where to parse from):
	DEFINE('NAME_OF_ENDPOINT', '/api');
	//Include the loaders:
	include_once "lib/Loaders.php";
	try{
		//1. Get the correct route and method:
	    $r = new Router( $_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD'], NAME_OF_ENDPOINT );
		//2. Parse the URI to get the requested path to the resource:
		$r->parseRequest();	 
		//3. Create the controller and the model:
		if( $r->getController() != "" ) {
			//4. Create the filepath:
			$controllerName = $r->getController() . "Controller";
			if( class_exists($controllerName) ) {
				//Include the files:	
				$controller = new $controllerName(new User(), $r->getMethod());
				//Give a response:
				echo $controller->response( $r->getArguments() );
			} else {
				echo Response::clientError( 400, "The request cannot be fullfilled. Cannot find the resource: " . $r->getController() );
			}
		} else {
			echo Response::clientError( 400, "Unknown request, no path defined.");
		}
	} catch(Exception $e) {
		echo Response::serverError( 500, $e->getMessage());
	}
		
		
		
		
		
		
		
		
		
		
		
			
	function debug() {
		echo "The controller: <br>";
		echo $route->controller;
	 	echo "<br> Arguments: <br>";
	    var_dump($route->arguments);
		echo "The correct path:<br>";
		var_dump($path);
	}
	
