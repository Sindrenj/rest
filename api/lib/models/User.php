<?php

class User extends Model{
	public function __construct() {
		parent::__construct();
	}
	
	public function getAll() {
		$sql = "Select user_id, name, RealName, email From _ttxp_users";
		return $this->db->select($sql, null);
	}
	
	public function get( $user ) {
		$sql = "Select user_id, name, RealName, email from _ttxp_users where user_id = " . $user;
		return $this->db->select($sql, null);
	}
	
	public function create( $user ){
		$sql = "Insert into user";
	}
	
	public function delete( $user ) {
		
	}
	
	public function update( $user, $data ) {
		
	}
	
	public function __toString() {
		return "";
	}
	
}
