<?php
class M_login extends CI_Model {
	public function __construct() {
	parent::__construct(); 
	}

	public function login($uname, $pswd){
		$this->db->where('username',$uname);
		$this->db->where('password',$pswd);
		$query = $this->db->get('users');
		 if($query->num_rows() > 0){
			$newdata = array(
                   'username'  => $uname,
                   'user_id' => $query->last_row()->user_id,
                   	'teamname' => $query->last_row()->teamname,
                   	'teamno' => $query->last_row()->teamno
               );
			$this->session->set_userdata($newdata);
		 	return 1;
		 }
	return 0;
	}

		public function mail_pswd(){
			$uname = $this->input->post('username');
		$this->db->where('username',$uname);
		$this->db->select('password');
		$pswd = "";
		$query = $this->db->get('users');
		 if($query->num_rows() > 0){
                   	$pswd = $query->last_row()->password;

$this->load->library('email');

$email_id =  $uname;
$url = base_url("index.php/login/");
$msg = "Your account password is $pswd.\r\n 
	Click here to login: $url";

$this->email->from('admin@intopia.com', 'Admin');
$this->email->to($email_id); 
$this->email->subject('Account Password- Intopia Listing');
$this->email->message($msg);	

$this->email->send();


		 	return 1;
		 }
	return 0;
	}


}

?>