<?php
class Register extends CI_Controller {

	public function __construct() { 
		parent::__construct();
	}

	public function index()
	{
		$data = array('title' => 'Register','main_content' => 'register_v');
		$this->load->view('template',$data);
	}

	public function submit()
	{
		$uname= $this->input->post('username');
		$pswd= $this->input->post('password');
		$reg_details = array('username' => $uname,
								'password' => $pswd);
		$flag = $this->M_register->register($reg_details);
		if($flag)
		{
			echo "Registered successfully!";
		}
		else
			echo "Username already exists!";
		$data = array('title' => 'Intopia','main_content' => 'home_v');
		$this->load->view('template',$data);
	}
}
?>

