<?php
class M_emails extends CI_Model {
	public function __construct() {
	parent::__construct(); 
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

		public function get_mails_by_sender(){
		$user_id = $this->session->userdata('user_id');
		$this->db->where("person1_id", $user_id); 
		$query = $this->db->get('threads');
		if($query->num_rows() > 0){
		foreach($query->result() as $row){
		$this->db->or_where("post_id", $row->post_id); 
		} 
		$this->db->order_by("period", "desc"); 
		$query = $this->db->get('postings');
		return $query->result();
	}
	return 0;
	}
		public function get_mails_by_receiver(){
		$user_id = $this->session->userdata('user_id');
		$this->db->where("person2_id", $user_id); 
		$query = $this->db->get('threads');
		if($query->num_rows() > 0){
		foreach($query->result() as $row){
		$this->db->or_where("post_id", $row->post_id); 
		} 
		$this->db->order_by("period", "desc"); 
		$query = $this->db->get('postings');
		return $query->result();
	}
	return 0;
	}
	public function get_thread_by_sender_post($sender_id,$post_id){
		$this->db->where("person1_id", $sender_id); 
		$this->db->where("post_id", $post_id); 
		$query = $this->db->get('threads');
		if($query->num_rows()>0)
			return $query->last_row()->thread_id;
		else
			return 0;

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

	public function is_anony($thread_id,$sender_id){
		$this->db->where("thread_id", $thread_id); 
		$this->db->where("sender_id", $sender_id); 
		$this->db->where('anony_flag',0);
		$query = $this->db->get('emails');
		if($query->num_rows > 0)
			return 0;
		return 1;
	}

		public function is_posted_anony($post_id){
		$this->db->where("post_id", $post_id); 
		$query = $this->db->get('postings');
		return $query->last_row()->anony_flag;			
	}

		public function is_post_visible($post_id, $user_id){
		$this->db->select('full_visibility');
		$this->db->where("post_id", $post_id); 
		$query = $this->db->get('postings');
		if($query->last_row()->full_visibility)
			return 1;
		$this->db->where("post_id", $post_id); 
		$this->db->where("user_id", $user_id); 
		$query = $this->db->get('post_visibility');
		return $query->num_rows();
	}

public function get_thread_len($thread_id){
		$this->db->where("thread_id", $thread_id); 
		$this->db->from('emails');
		return $this->db->count_all_results();
		}

public function get_latest_mail($thread_id){
		$this->db->where("thread_id", $thread_id); 
		$this->db->select_max('timestamp');
		$query = $this->db->get('emails');
		 $max_time= $query->last_row()->timestamp;

		$this->db->where("thread_id",$thread_id);
		$this->db->where("timestamp",$max_time);
		//$this->db->select('msg');
			$query = $this->db->get('emails');
			return $query->last_row();
		}

public function get_mails_by_thread($thread_id){
		$this->db->where("thread_id", $thread_id); 
		//$this->db->select('msg');

		$query = $this->db->get('emails');
			return $query->result();
		}

	public function get_thread_users($thread_id){
		$this->db->where("thread_id", $thread_id); 
		$query = $this->db->get('threads');
		$users = array();
		if($query->num_rows() > 0)
			{
				$p1 = $query->last_row()->person1_id;
				$p2 = $query->last_row()->person2_id;
				$post_id = $query->last_row()->post_id;
				
				$users[$p1] = ($this->is_anony($thread_id,$p1)==1)?"Anonymous":$this->get_teamname($p1);
				if($this->is_posted_anony($post_id) || !$this->is_post_visible($post_id,$p2))
				{
					$users[$p2] = ($this->is_anony($thread_id,$p2)==1)?"Anonymous":$this->get_teamname($p2);
				}
				else
				{
					$users[$p2] = $this->get_teamname($p2);
				}
				
			}
			return $users;

		}

public function reply(){

$msg = $this->input->post('msg');
$sender= $this->input->post('user_id');
$receiver = $this->input->post('post_user_id');
$post_id= $this->input->post('post_id');
$anony_flag= ($this->input->post('anony_flag'))?1:0;

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
				'msg' => $msg,
				'anony_flag' => $anony_flag );


$this->send_reply($data2);

 
}


public function send_reply($data){

$user_id = $data['receiver_id'];
$post_id = $data['post_id'];
$thread_id = $data['thread_id'];
$this->send_mail($user_id,$post_id,$thread_id);
$this->db->insert('emails',$data);
}
public function send_mail($user_id,$post_id,$thread_id){

$this->load->library('email');

$email_id = "rahulr92@gmail.com";
$url = base_url("index.php/login/show_thread/$user_id/$post_id/$thread_id");
$msg = "You have a new message at Intopia Listing.\r\n 
	Click here to view it: $url";

$this->email->from('admin@intopia.com', 'Admin');
$this->email->to($email_id); 
$this->email->subject('New Message - Intopia Listing');
$this->email->message($msg);	

$this->email->send();

//echo $this->email->print_debugger();

}


public function reply_thread(){

$msg = $this->input->post('msg');
$thread_id= $this->input->post('thread_id');
$post_id= $this->input->post('post_id');
$sender= $this->input->post('sender_id');
$receiver = $this->input->post('receiver_id');
$anony_flag= ($this->input->post('anony_flag'))?1:0;

$data = array(	'sender_id'=>$sender,
				'receiver_id' => $receiver,
				'post_id' => $post_id,
				'thread_id' => $thread_id,
				'msg' => $msg,
				'anony_flag' => $anony_flag );

$this->send_reply($data);

 //echo "Reply sent!";
 
}

public function mark_as_read($thread_id){
$data = array(
               'status' => 1,
            );

$this->db->where('thread_id', $thread_id);
$this->db->update('emails', $data); 
}


public function get_post_rstatus($post_id){

$this->db->where('post_id', $post_id);
$this->db->where('status', 0);
$query = $this->db->get('emails');
if($query->num_rows() > 0) return 0; //there are unread messages for that post
return 1; 
}


}
?>