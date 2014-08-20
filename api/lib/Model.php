<?php

class Model{
	protected $db;
	
	private $data = array(
		"SindreN" => array(
			"name" => "Sindre",
			"lastName" => "Njøsen",
			"tlf" => "+47836211"	
		),
		"VegarN" => array(
			"name" => "Vegar",
			"lastname" => "Njøsen",
			"tlf" => "+55162906"
		) 
	);
			
	public function __construct($database = null) {
		if($database) $this->db = $database;
	}
			
	public function __toString() {
		return $this->db;
	}
}
