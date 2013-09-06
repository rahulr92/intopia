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

		public function get_post($post_id){
		$this->db->where("post_id",$post_id ); 
		$query = $this->db->get('postings');
		return $query->last_row();
	}

	public function get_username($user_id){
		$this->db->where("user_id", $user_id); 
		$query = $this->db->get('users');
		if($query->num_rows() > 0)
			return $query->last_row()->username;
	}

	public function get_thread_users($thread_id){
		$this->db->where("thread_id", $thread_id); 
		$query = $this->db->get('threads');
		if($query->num_rows() > 0)
			{
				$p1 = $query->last_row()->person1_id;
				$p2 = $query->last_row()->person2_id;
				$users[$p1] = $this->get_username($p1);
				$users[$p2] = $this->get_username($p2);
			}
			return $users;

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



}
?>