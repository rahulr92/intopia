<?php
class Model extends CI_Model {
	public function __construct() {
	parent::__construct(); 
	}

		public function get_posts(){
			$query = $this->db->get('postings');
			return $query;
	}
}


?>