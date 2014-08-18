<?php 
	/***
	* index.php 
	* Bootstrapfile for REST-service.
	* - Sindre Njøsen
	*/
	$data = array(
		"Person" => 
			array(
			  "Fornavn" => "Sindre",
			  "Etternavn" => "Njøsen",
			  "Addresse" => "Jenny Lindsvei 1, 5146 Fyllingsdalen",
			  "Telefon"	=> "+47 83 62 11"
			)
		);
	
	//$request = explode('/', $_SERVER['REQUEST_URI']);
	var_dump($_SERVER['REQUEST_URI']);
		
	switch ($_SERVER['REQUEST_METHOD']) {
		case 'GET':
			echo 'GET';
			break;
		case 'PUT':
			echo 'PUT';
			break;
		case 'POST':
			echo 'POST';
			break;
		case 'DELETE':
			echo 'DELETE';
			break;
		default: 
			header('HTTP/1.1 405 Method Not Allowed');
      		header('Allow: GET, PUT, DELETE');
	}
	
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
	
	
