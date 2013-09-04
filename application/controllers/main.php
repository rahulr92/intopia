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

	public function close()
	{
		$post_id=$this->input->post('post_id');
		$this->Model->close($post_id);
		redirect('/main/','location',301);

	}

	public function delete()
	{
		$post_id=$this->input->post('post_id');
		$this->Model->delete($post_id);
		redirect('/main/','location',301);

	}

	// 	public function reply()
	// {
	// 	$Details  = array('post_id' =>$this->input->post('post_id') ,'post_user_id' =$this->input->post('post_user_id'));
	// 	$data = array('title' => 'Register','main_content' => 'register_v', 'details' => $Details);
	// 	$this->load->view('template',$data);

	// }

	 	public function reply()
	{
		$this->M_emails->reply();
		// echo "<script type='text/javascript'>reply_sent();</script>";
		//redirect('/main/','location',301);
	}


	 public function reply_thread()
	{
		$this->M_emails->reply_thread();
		// echo "<script type='text/javascript'>reply_sent();</script>";
		//redirect('/main/','location',301);
	}


	 public function get_user_posts()
	{
		$user_id = $this->session->userdata('user_id');
		$postings = $this->Model->get_posts_by_user($user_id);
		return $postings;
	}

	public function get_posts()
	{	
		$period = array();
		$user_id = $this->session->userdata('user_id');
		$postings = $this->Model->get_posts();
		$data = "";
		$last_period = 0;
		$close_url = base_url('index.php/main/close');
		$delete_url = base_url('index.php/main/delete');
		$msg_url = base_url('index.php/main/reply');


		foreach ($postings->result() as $row) {
			$post_id = $row->post_id;
			$post_desc = $row->desc;
			$post_title = $row->title;
			$post_user_id = $row->user_id;
			$post_type = $row->type_id;

			$post_status = ($row->status_id === '1' ? 'Open' : 'Closed');
			$close_btn =($row->status_id === '1' ? '' : 'disabled');
			if($row->period !== $last_period)
			{
				if($last_period !== 0)
					$data .= "<p>End of Q$last_period</p><hr></div>";
				$last_period = $row->period;
				$data .= "<div class='period row'>";
				$data .= "<h2>Q$last_period Listings</h2>";
				$data .= "
				<div class='col-md-2'>Displaying</div>
				<a href='#' class='col-md-2  all_btn'>All</a>
				<a href='#'  class='col-md-2  for_sale'>For Sale</a>
				<a href='#'  class='col-md-2 wanted'>Wanted</a>
				<div class='col-md-4'>
				<span>Hide closed</span>
				<input id = 'Checked1' type='checkbox' class='hide_closed' name='check1' />
				</div>";
			}

			$data .= "<div class='post row type$post_type $post_status'>
			<h3>$post_title</h3>
			<div class='col-md-2'>For Sale</div>
			<div class='col-md-1'>$post_status</div>
			<div class='col-md-1'>Q1</div>
			
			<button class='desc_btn btn btn-primary col-md-2' id=''>Details</button>
			<div class='col-md-2'>
		<button class='reply_btn btn btn-primary' id=''>Reply</button>
		<form class='reply_frm' method='post' action='$msg_url'/>
		<input type='hidden' name='post_id' value='$post_id'/>
		<input type='hidden' name='post_user_id' value='$post_user_id'/> 
		<input type='hidden' name='user_id' value='$user_id'/>
		<textarea name='msg' class='row' rows='2' cols='100'>message</textarea></br>
		<input type='submit' class='btn btn-success' value='Send' $close_btn>
		</form></div>";
			if($user_id === $row->user_id)
			{

		$admin_options = "<div class='col-md-2'>
		<form method='post' action='$close_url'/>
		<input type='hidden' name='post_id' value='$post_id'/>
		<input type='submit' value='Close' class='btn-warning' $close_btn>
		</form></div>
		<div class='col-md-2'>
		<form method='post' action='$delete_url'/>
		<input type='hidden' name='post_id' value='$post_id'/>
		<input type='submit' class='btn-danger' value='Delete'>
		</form></div>";
				$data .= $admin_options;
			}
			$data .="<div class='row desc $post_id'></br><p>$post_desc</p>
					</div>
			</div>";
		}

		return $data;
	}
	

}
?>
