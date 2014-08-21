<?php 

class Controller{
	
	/**
	 * Property: $model
	 * The model with the data.
	 */
	protected $model;
	
	/**
	 * Property: $method
	 * The way the client is interacting with the service.
	 */
	protected $method;
	
		
	public function __construct( $model, $method ) {
		$this->model = $model;
		$this->method = $method;
	}
	
	public function response() {
		$name = $this->method();
		return call_user_func(self, $name);
	}
	
		
	public function GET() {
		header('Content-Type: application/json');
		return json_encode($this->model->data);
		
	}
	
	public function POST( $data ) {
		
	}
	
	public function PUT( $data ) {
		
	}
	
	public function DELETE() {
		
	}
	
	public function JSONResponse( $data ) {
		//Set MIME-Type:
		header('Content-Type: application/json');
		return json_encode($this->model->data); 
	}
	
	public function XMLResponse() {
		//Set MIMIE-Type:
		header("Content-Type: application/xml");
		$xml = new SimpleXMLElement("<" . get_class( $this ) . "/>");
		//Make the structure ready for xml:
		array_walk_recursive( $this->model->data, array ($xml, 'addChild') );
		
		return $xml->asXML();
	}
	
	public function __toString() {
		return "The method: " . $this->method . ", the model: " . $this->model;
	}
}
