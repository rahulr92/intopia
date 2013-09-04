<?php
class Model extends CI_Model {
	public function __construct() {
		parent::__construct(); 
	}

	public function get_posts(){
		$this->db->order_by("period", "desc"); 
		$query = $this->db->get('postings');
		return $query;
	}
	public function get_username($user_id){
		$this->db->where("user_id", $user_id); 
		$query = $this->db->get('users');
		if($query->num_rows() > 0)
			return $query->last_row()->username;
	}


	public function close($post_id){
		$data = array(
			'status_id' => 0,
			);

		$this->db->where('post_id', $post_id);
		$this->db->update('postings', $data); 

	}


	public function delete($post_id){
		$this->db->where('post_id', $post_id);
		$query = $this->db->get('postings'); 
		$this->db->where('post_id', $post_id);
		$this->db->delete('postings'); 
		$this->db->insert('recyclebin',$query->last_row() );
		//print_r($query->last_row());
	}



}
?>