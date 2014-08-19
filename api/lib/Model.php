<?php

class Model{
	private $db;
		
	public function __construct($database = null) {
		if($database) $this->db = $database;
	}
	
	public function __toString() {
		return $this->db;
	}
}
