<?php

	/**
	 *	The autoloading-file:
	 *  Consists of methods that will autoload a requested class/file. 
	 *  Temporary solution - should create a class that loads all types of classes.
	 */
	
	function controllerLoader($className) {
		$path = "lib/Controllers/" . $className . ".php";
		
		if( file_exists($path)) {
			include_once $path;
		} else { //The file does not exist:
			return false;
		}
	}
	
	function modelLoader($className) {
		$path = "lib/Models/" . $className . ".php";
		
		if( file_exists($path)) {
			include_once $path;
		} else { //The file does not exist:
			return false;
		}
	}
	
	function libLoader($className) {
		$path = "lib/" . $className . ".php";
		
		if( file_exists($path)) {
			include_once $path;
		} else { //The file does not exist:
			return false;
		}
	}
	
	//Register autoloaders:
	spl_autoload_register("controllerLoader");
	spl_autoload_register("modelLoader");
	spl_autoload_register("libLoader");
