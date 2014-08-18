<?php 
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
			echo "Requestmethod not allowed.";
	}
	
	function printData( $method ) {
		
	}
