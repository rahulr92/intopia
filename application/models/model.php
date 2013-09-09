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

	public function get_teams(){
		$this->db->select('teamname,user_id');
		$query = $this->db->order_by('teamno','asc');
		$query = $this->db->get('users');
		if($query->num_rows() > 0)
			return $query->result();
	}

		public function get_post($post_id){
		$this->db->where("post_id",$post_id ); 
		$query = $this->db->get('postings');
		return $query->last_row();
	}

	public function get_post_title($post_id){
		$this->db->where("post_id",$post_id ); 
		$query = $this->db->get('postings');
		return $query->last_row()->title;
	}

	public function get_username($user_id){
		$this->db->where("user_id", $user_id); 
		$query = $this->db->get('users');
		if($query->num_rows() > 0)
			return $query->last_row()->username;
	}

		public function get_teamname($user_id){
		$this->db->where("user_id", $user_id); 
		$query = $this->db->get('users');
		if($query->num_rows() > 0)
			return $query->last_row()->teamname;
	}



	public function change_status($post_id, $status){
		$data = array(
			'status_id' => $status
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

	public function get_team_count(){
		return $this->db->count_all('users');
		
	}

	public function insert_post_visibility($post_id,$user_id){
		$data = array('post_id' => $post_id,
			'user_id' => $user_id);
		$this->db->insert('post_visibility',$data );
}

}
?>