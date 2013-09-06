<?php
class M_posting extends CI_Model {
	public function __construct() {
	parent::__construct(); 
	}

	public function posting($data){

	 if($this->db->insert('postings', $data))
	 {
	 	$msg = array('msg' => "Posted successfully!");
		
	 } 
	 else
	 {
	 	$msg = array('msg' => "Posting failed!");
	 } 
	 $this->load->view('alert_v',$msg);
	}

public function update_posting($post_id,$data){

// echo $post_id;
//print_r($data);
$this->db->where('post_id',$post_id);
	 $this->db->update('postings', $data);
	 	$msg = array('msg' => "Post updated successfully!");
	 $this->load->view('alert_v',$msg);


	}
}


?>