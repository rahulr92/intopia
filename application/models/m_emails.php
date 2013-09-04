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

		public function get_mails_by_user(){
		$user_id = $this->session->userdata('user_id');
		$this->db->where("person1_id", $user_id); 
		$this->db->or_where("person2_id", $user_id); 
		$query = $this->db->get('threads');
		foreach($query->result() as $row){
		$this->db->or_where("post_id", $row->post_id); 
		} 
		$this->db->order_by("period", "desc"); 
		$query = $this->db->get('postings');
		return $query->result();

	}

	public function get_thread_by_sender_post($sender_id,$post_id){
		$this->db->where("person1_id", $sender_id); 
		$this->db->where("post_id", $post_id); 
		$query = $this->db->get('threads');
		return $query->last_row()->thread_id;

	}

	public function get_receiver($thread_id,$post_id){
		$this->db->where("person1_id", $sender_id); 
		$this->db->where("post_id", $post_id); 
		$query = $this->db->get('threads');
		return $query->last_row()->thread_id;

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


public function reply(){

$msg = $this->input->post('msg');
$sender= $this->input->post('user_id');
$receiver = $this->input->post('post_user_id');
$post_id= $this->input->post('post_id');

$data = array('person1_id'=>$sender,
				'person2_id' => $receiver,
				'post_id' => $post_id );


$query = $this->db->get_where('threads',$data);
//echo $query->num_rows();
if($query->num_rows() > 0){
$thread_id = $query->last_row()->thread_id;
}
else
{
	$this->db->insert('threads',$data);
$thread_id = $this->db->insert_id();	
}


$data2 = array('sender_id'=>$sender,
				'receiver_id' => $receiver,
				'post_id' => $post_id,
				'thread_id' => $thread_id,
				'msg' => $msg );

$this->db->insert('emails',$data2);
 echo "Reply sent!";
 
}

public function reply_test(){

$msg = $this->input->post('msg');
$sender= $this->input->post('user_id');
$receiver = $this->input->post('post_user_id');
$post_id= $this->input->post('post_id');
$data = array('person1_id'=>$sender,
				'person2_id' => $receiver,
				'post_id' => $post_id );


print_r($data);
 
}

public function reply_thread(){

$msg = $this->input->post('msg');
$thread_id= $this->input->post('thread_id');
$post_id= $this->input->post('post_id');



$data = array(	'post_id' => $post_id,
				'thread_id' => $thread_id,
				'msg' => $msg );

$this->db->insert('emails',$data);
 echo "Reply sent!";
 
}
}

?>