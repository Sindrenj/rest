<?php
	
class Router{
		
	/**
	 * Property: request
	 * The unparsed request-uri.
	 */
	protected $request;
	
	
	/**
	 * Property: resource
	 * The resource the client wants to access.
	 */
	protected $controller;	 
	
	/**
	* Property: method 
	* The request method (GET/POST etc..)
	*/
	protected $method;
	
	 /**
	 * Property: arguments
	 * Arguments that are necessary to fullfill the request.
	 * (eg.: api/users/{19191})
	 */
	 protected $arguments = array();
	
	/**
	 * Property: name_of_endpoint
	 * Where to start parsing the route.
	 */
	 protected $name_of_endpoint;
		

	public function __construct( $request, $method, $name_of_endpoint) {
		$this->request = $request;
		$this->method = $method;
		$this->name_of_endpoint = $name_of_endpoint;
	}
	
	public function getController() {
		return $this->controller;
	}
	
	public function getMethod() {
		return $this->method;
	}
	
	public function getArguments() {
		return $this->arguments;
	}
	
	public function parseRequest() {
		//Get the length of NAME_OF_ENDPOINT:
		$pathLength = strlen( $this->name_of_endpoint ) + 1;
		//Strip the request for information we dont need:
		$parsedRequest = substr( $this->request, strpos( $this->request, $this->name_of_endpoint ) + $pathLength );
		//Split the $request into an array for easier use:	    
	    $path = explode( '/', $parsedRequest );
		//Get the controller:
		$this->controller = $path[0];
		//Get the arguments:
		if( !empty($path[1]) ) {
			array_shift($path);
			$this->arguments = $path;
		}
	}
	
	public function __toString() {
		echo "The resource:" . $resource; //. ", the arguments" . $arguments . ", the method:" . $method;
	}

}
	