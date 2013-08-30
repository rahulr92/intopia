<?php
class Main extends CI_Controller {

	public function is_logged_in()
	{
		$user_id = $this->session->userdata('user_id');
		if(!isset($user_id));
	}

	public function __construct() { 
		parent::__construct();

		//Not working!!
		$user_id = $this->session->userdata('user_id');
		if(!isset($user_id))
		{
			redirect('/login/','location',301);
		}

}

	public function index()
	{
		$data = array('title' => 'Intopia','main_content' => 'main_v');
		$this->load->view('template',$data);
	}


	public function posting()
	{
		$data = array('title' => 'Create New Post','main_content' => 'posting_v');
		$this->load->view('template',$data);
	}

		public function submit_posting()
	{
		$title = $this->input->post('user');
		$desc = $this->input->post('desc');
		$type = $this->input->post('type');
		$period = $this->input->post('user');
			$user_id = $this->session->userdata('user_id');
		$data = array('title' => $title,'desc' => $desc, 'type_id' => $type, 'period' => $period, 'status_id'=>'1','user_id'=>$user_id);
		$this->M_posting->posting($data);
		$this->index();
	}

		public function logout()
	{
		$this->session->sess_destroy();
		redirect('/login/','location',301);
	}

	public function display_posts()
	{	
 		$postings = $this->Model->get_posts();
 		print_r($postings);
	}
	


}
?>
