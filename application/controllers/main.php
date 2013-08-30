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
		$data = array('title' => 'Intopia','main_content' => 'main_v','data'=>$this->get_posts());
		$this->load->view('template',$data);
	}


	public function posting()
	{
		$data = array('title' => 'Create New Post','main_content' => 'posting_v');
		$this->load->view('template',$data);
	}

		public function submit_posting()
	{
		$title = $this->input->post('title');
		$desc = $this->input->post('desc');
		$type = $this->input->post('type');
		$period = $this->input->post('period');
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

	public function get_posts()
	{	
		$period = array();
		$user_id = $this->session->userdata('user_id');
		$postings = $this->Model->get_posts();
		$data = "";
		$last_period = 0;

		$admin_options = "<div class='col-md-2'>Close</div>
		<div class='col-md-2'>Delete</div>";
		foreach ($postings->result() as $row) {
			$post_id = $row->post_id;
			$post_desc = $row->desc;
			$post_title = $row->title;
			if($row->period !== $last_period)
			{
				if($last_period !== 0)
					$data .= "<p>End of Q$last_period</p><hr></div>";
				$last_period = $row->period;
				$data .= "<div class='period row'>";
				$data .= "<h2>Q$last_period Listings</h2>";
				$data .= "<div class= 'row'>
				<div class='col-md-2'>Displaying</div>
				<div class='col-md-2'>All</div>
				<div class='col-md-2'>For Sale</div>
				<div class='col-md-2'>Wanted</div>
				<div class='col-md-4'>
				<span>Hide closed</span>
				<input id = 'Checked1' type='checkbox' name='check1' />
				</div>
				</div>";
			}

			$data .= "<div class='post row'>
			<h3>$post_title</h3>
			<div class='col-md-2'>For Sale</div>
			<div class='col-md-1'>Open</div>
			<div class='col-md-1'>Q1</div>
			<div class='col-md-8'>
			<div class='col-md-2'>Details</div>
			<div class='col-md-2'>Reply</div>";
			if($user_id === $row->user_id)
				$data .= $admin_options;
			$data .="</div><div class='row desc $post_id'><p>$post_desc</p>
					</div>
			</div>";
		}

		return $data;
	}
	

}
?>
