<?php

class User extends Model{
	public function __construct() {
		parent::__construct();
	}
	
	public function getAll() {
		$sql = "Select user_id, name, RealName, email From _t1txp_users";
		return $this->db->select($sql, null);
	}
	
	public function get( $user ) {
		$sql = "Select user_id, name, RealName, email from _t1txp_users where user_id = " . $user;
		return $this->db->select($sql, null);
	}
	
	public function delete( $user ) {
		
	}
	
	public function update( $user, $data ) {
		
	}
	
	public function __toString() {
		return "";
	}
	
}
