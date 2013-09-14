<?php
class M_forms extends CI_Model {
	public function __construct() {
	parent::__construct(); 
	}

	public function submit_insurance_frm($data){
	 return $this->db->insert('insurance_table',$data);

	
	}

	public function get_insurance_frms($user_id){
	$this->db->where('user_id',$user_id);
	$this->db->order_by('timestamp','desc');
	$query = $this->db->get('insurance_table');
return $query->result();
	
	}

	public function get_all_insurance_frms(){
	$this->db->order_by('timestamp','desc');
	$query = $this->db->get('insurance_table');
	return $query->result();
	
	}


	public function get_insurance_frm($insur_id){
	$this->db->where('insurance_id',$insur_id);
	$query = $this->db->get('insurance_table');
	if($query->num_rows > 0)
	return $query->last_row();
	
	}
}


?>