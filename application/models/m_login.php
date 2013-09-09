<?php
class M_login extends CI_Model {
	public function __construct() {
	parent::__construct(); 
	}

	public function login($uname, $pswd){
		$this->db->where('username',$uname);
		$this->db->where('password',$pswd);
		$query = $this->db->get('users');
		 if($query->num_rows() > 0){
			$newdata = array(
                   'username'  => $uname,
                   'user_id' => $query->last_row()->user_id,
                   	'teamname' => $query->last_row()->teamname
               );
			$this->session->set_userdata($newdata);
		 	return 1;
		 }
	return 0;
	}

}

?>