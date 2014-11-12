<?php

class Model{
	protected $db;
				
	public function __construct() {
		$this->db = new DatabaseMysql();
	}
			
	public function __toString() {
		return "This is the model";
	}
}
