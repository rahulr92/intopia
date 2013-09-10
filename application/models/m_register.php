<?php
class M_register extends CI_Model {
	public function __construct() {
	parent::__construct(); 
	}

	public function register($data){
	return $this->db->insert('users', $data); 
	}

	public function update($data, $user_id){
		$this->db->where('user_id', $user_id);
	return $this->db->update('users', $data); 
	}
}


?>