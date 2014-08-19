<?php
	
class FrontController{
		
	/**
	 * Property: request
	 * The unparsed request-uri.
	 */
	private $request;
	
	
	/**
	 * Property: resource
	 * The resource the client wants to access.
	 */
	 private $resource;	 
	
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
		

	public function __construct( $request ) {
		$this->request = $request;
	}
	
	public function parseRequest() {
		$path = explode("/", $this->request);
		//Må dynamisk endre seg etter hvor stor 
		//$this->resource = $path[''];
		//echo $this->resource;
		var_dump($path);
	}
	
	public function __toString() {
		echo "The resource:" . $resource; //. ", the arguments" . $arguments . ", the method:" . $method;
	}

}
	