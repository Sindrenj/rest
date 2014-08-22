<?php 

abstract class Controller{	
	/**
	* Property: $method
	* The way the client is interacting with the service.
	*/
	protected $action;
		
	public function __construct( $action ) {
		$this->action = $action;
	}
	
	public function response($data = null) {
		$action = $this->action;
		if( method_exists($this, $action)) {
			//Call the correct action/method (with data):			
			if( empty($data) OR is_null($data) ) { //No arguments supplied
				return $this->$action();
			} else { //Arguments supplied
				return $this->$action($data);
			}	
		} else {
			echo Response::ClientError(405, "The request cannot be fullfilled. The method is not allowed in this context.");
		}
		
	}
	
		
	public function GET() {
		return Response::JSON($this->model->getData());
	}
	
	public function POST( $data = null ) {
		echo "Kom til post";
	}
	
	public function PUT( $data = null ) {
		echo "Kom til put.";
	}
	
	public function DELETE( $data = null ) {
		echo "Kom til delete";
	}
		
	public function __toString() {
		return "The method: " . $this->method . ", the model: " . $this->model;
	}
}
