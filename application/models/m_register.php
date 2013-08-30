<?php
class M_register extends CI_Model {
	public function __construct() {
	parent::__construct(); 
	}

	public function register($data){
	return $this->db->insert('users', $data); 
	}
}


?>