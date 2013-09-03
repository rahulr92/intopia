<?php
class M_emails extends CI_Model {
	public function __construct() {
	parent::__construct(); 
	}

	public function get_emails(){
		$user_id = $this->session->userdata('user_id');
		$this->db->where('receiver_id',$user_id);
		$query = $this->db->get('emails')->order_by('post_id')->order_by('timestamp');
		return $query->results();

	}

		public function get_posts_by_user(){
		$user_id = $this->session->userdata('user_id');
		$this->db->where("user_id", $user_id); 
		$this->db->order_by("period", "desc"); 
		$query = $this->db->get('postings');
		return $query->result();
	}


public function get_threads_by_post($post_id){
		$this->db->where("post_id", $post_id); 
		$this->db->select('thread_id');
		$query = $this->db->get('threads');
		return $query->result();
	}


public function get_latest_mail($thread_id){
		$this->db->where("thread_id", $thread_id); 
		$this->db->select_max('timestamp');
		$query = $this->db->get('emails');
		 $max_time= $query->last_row()->timestamp;

		$this->db->where("thread_id",$thread_id);
		$this->db->where("timestamp",$max_time);
		$this->db->select('msg');
			$query = $this->db->get('emails');
			return $query->last_row()->msg;
		}


public function get_mails_by_thread($thread_id){
		$this->db->where("thread_id", $thread_id); 
		$this->db->select('msg');

		$query = $this->db->get('emails');
			return $query->result();
		}
}

?>