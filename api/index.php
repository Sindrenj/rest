<?php 
	/***
	* index.php 
	* Entrypointfile for REST-Service.
	* - Sindre Njøsen
	*/

	//Include necessary files:
	include_once "lib/FrontController.php";
	
	//Parse the request:
	$front = new FrontController($_SERVER['REQUEST_URI']);
	
	$front->parseRequest();
	
		
	
	function JSONResponse( $data ) {
		//Set header to json:
		header('Content-Type: application/json');
		echo json_encode($data); 
	}
	
	function XMLResponse( $data ) {
		//Set header to xml:
		header("Content-Type: application/xml");
		echo $data;
	}
	
	
