<?php
class M_posting extends CI_Model {
	public function __construct() {
	parent::__construct(); 
	}

	public function posting($data){

	 if($this->db->insert('postings', $data))
	 {
	 	echo "Posted successfully!";
	 } 
	 else
	 {
	 	echo "Posting failed!";
	 } 

	}
}


?>