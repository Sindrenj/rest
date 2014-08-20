<?php 
	/***
	* index.php 
	* Entrypointfile for the REST-Service.
	* - Sindre Njøsen
	*/

	//Include necessary files:
	include_once "lib/Router.php";
	include_once "lib/Controller.php";
	include_once "lib/Controller/UsersController.php";
	include_once "lib/Model.php";
	
	//1. Get the URI and method:
	$route = new Router( $_SERVER['REQUEST_URI'] );
	$method = $_SERVER['REQUEST_METHOD'];
	//2. Parse the URI to get the requested resource(s): 
	$route->parseRequest();
	//3. Load the correct model that represents the resource(s):
	$model = new $route->$model();	
	//4. Load the correct controller which will deliver the resource(s):
	$controller = new $route->$controller( $method, $model );
	//5.
	
	
	
	
	
	//echo $front->controller;
	
	
	
	
	
	
	
	
	
	

	 
	 
	 
	 
	//Create the correct controller:
	// $controller = new UsersController( $_SERVER['REQUEST_METHOD'], $model );
	//Send a response:
	// echo $controller->JSONResponse();
	
	
	
