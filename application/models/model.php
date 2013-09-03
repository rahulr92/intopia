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

}
?>