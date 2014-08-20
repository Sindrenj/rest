<?php
	
class Router{
		
	/**
	 * Property: request
	 * The unparsed request-uri.
	 */
	private $request;
	
	
	/**
	 * Property: resource
	 * The resource the client wants to access.
	 */
	private $controller;	 
	
	/**
	* Property: method 
	* The request method (GET/POST etc..)
	*/
	private $method;
	
	 /**
	 * Property: arguments
	 * Arguments that are necessary to fullfill the request.
	 * (eg.: api/users/{19191})
	 */
	private $arguments;
	
	/**
	 * Constant: root
	 * Where to start parsing the route.
	 */
	const ROOT_POSITION = 4;
		

	public function __construct( $request ) {
		$this->request = $request;
	}
	
	public function __get( $property ) {
		return $this->$property;
	}
	
	public function parseRequest() {
		//Split the request into an array:
		$path = explode('/', $this->request);
		//Get the controller:
		$this->controller = $path[ $this::ROOT_POSITION ];
		//Get arguments:
		$args = array();
		for($i = $this::ROOT_POSITION + 1; $i < sizeof($path); $i++) {
			$args[$i] = $path[$i];
		}
		
		$this->arguments = $args;
	}
	
	public function __toString() {
		echo "The resource:" . $resource; //. ", the arguments" . $arguments . ", the method:" . $method;
	}

}
	