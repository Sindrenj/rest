<?php

class Response {	
	private static function clientErrorType() {
		return array(
			400 => "HTTP/1.0 400 Bad Request",
			401 => "",
			402 => "",
			403 => "",
			404 => "",
			405 => "405 Method Not Allowed"
		);
	}
	
	private static function serverErrorType() {
		return array(
			500 => "HTTP/1.0 500 Internal Server Error",
			501 => "",
			502 => "",
			503 => ""
		);
	}
	
	public static function JSON($data) {
		//Set MIME-Type:
		header('Content-Type: application/json');
		return json_encode($data); 
	}
	
	public static function XML($data) {
		//Set MIME-Type:
		header("Content-Type: application/xml");
		$xml = new SimpleXMLElement("<" . get_class( $this ) . "/>");
		//Make the structure ready for xml:
		array_walk_recursive( $this->model->data, array ($xml, 'addChild') );
		
		return $xml->asXML();
	}
	
	public static function ServerOk( $type, $message) {
		
	}
	
	public static function ServerError( $errorType, $message ) {
		//Set header to 5xx error:
		header(self::serverErrorType()[$erroType]);
		return $message;
	}	
	
	public static function ClientError( $errorType, $message ) {
		//Set header to 4xx error:
		header(self::clientErrorType()[$errorType]);
		return $message;
	}
}
