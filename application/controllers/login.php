<?php
class Login extends CI_Controller {

	public function __construct() { parent::__construct();}

	public function index()
	{
		$data = array('title' => 'Intopia Listing','main_content' => 'home_v');
		$this->load->view('template',$data);
	}

	public function test()
	{
		$uname= $this->input->post('username');
		$pswd= $this->input->post('password');
		$flag = $this->M_login->login($uname, $pswd);
		if($flag) {
			redirect('/main/','location',301);
		// $data = array('title' => 'Intopia','main_content' => 'main_v');
		// $this->load->view('template',$data);
		}
		else
			{
			redirect('/login/','location',301);
			}

	}

}
?>
