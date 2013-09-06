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
		
		// if(!isset($user_id))
		// {
		// 	redirect('/login/','location',301);
		// }

}

	public function index()
	{

		if(!$this->session->userdata('user_id'))
		{
			redirect('/login/','location',301);
		}
		else
			$this->get_posts();
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
		$anony_flag = ($this->input->post('anony_flag') == 1)?1:0;
			$user_id = $this->session->userdata('user_id');
		$data = array('title' => $title,'desc' => $desc, 'type_id' => $type, 'period' => $period, 
												'status_id'=>'1','user_id'=>$user_id,'anony_flag' => $anony_flag);
		$this->M_posting->posting($data);
		$this->index();
	}


		public function update_posting()
	{
		$post_id = $this->input->post('post_id');
		$title = $this->input->post('title');
		$desc = $this->input->post('desc');
		$type = $this->input->post('type');
		$period = $this->input->post('period');
		$anony_flag = ($this->input->post('anony_flag') == 1)?1:0;
			$user_id = $this->session->userdata('user_id');
		$data = array('title' => $title,'desc' => $desc, 'type_id' => $type, 'period' => $period, 
												'status_id'=>'1','user_id'=>$user_id,'anony_flag' => $anony_flag);
		$this->M_posting->update_posting($post_id,$data);
		$this->index();
	}

		public function logout()
	{
		$this->session->sess_destroy();
		redirect('/login/','location',301);
	}

	public function change_status()
	{
		$post_id=$this->input->post('post_id');
		$status=$this->input->post('status');
		$this->Model->change_status($post_id,$status);
		$this->get_posts();
		//redirect('/main/','location',301);

	}

	public function delete()
	{
		$post_id=$this->input->post('post_id');
		$this->Model->delete($post_id);
		$this->get_posts();
		//redirect('/main/','location',301);

	}


	public function edit()
	{
		$post_id=$this->input->post('post_id');
		$post = $this->Model->get_post($post_id);
		$data = array('title' => 'Update Post','main_content' => 'edit_v', 'post'=>$post);
		$this->load->view('template',$data);
		//redirect('/main/','location',301);

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
		$msg = array('msg' => "Reply sent successfully!");
$this->load->view('alert_v',$msg);
$this->get_posts(); 
		// echo "<script type='text/javascript'>reply_sent();</script>";
		//redirect('/main/','location',301);
	}
public function reply_test(){

$msg = array('msg' => "Reply sent successfully!");
$this->load->view('alert_v',$msg);
$this->get_posts(); 
}

	 public function reply_thread()
	{
		$this->M_emails->reply_thread();
		//$msg = array('msg' => "Reply sent successfully!");
		//$this->load->view('alert_v',$msg);
		$thread_id= $this->input->post('thread_id');
		$post_id= $this->input->post('post_id');
		redirect("/emails/thread_view/$thread_id/$post_id",'location',301);

	}


	 public function get_user_posts()
	{
		$user_id = $this->session->userdata('user_id');
		$postings = $this->Model->get_posts_by_user($user_id);
		return $postings;
	}

	public function get_posts(){
		$data = array();
		$user_id = $this->session->userdata('user_id');
		$postings = $this->Model->get_posts();
		$data = "";
		$quarter = 0;
		$desc_arr = array();

		foreach ($postings->result() as $row) {
			if($row->period !== $quarter)
			{
				$quarter=$row->period;
			}

			$post_id = $row->post_id;
			$post_user_id = $row->user_id;
			if($row->anony_flag)
					$post_username = "Anonymous";
			else
					$post_username = $this->Model->get_username($post_user_id);

			$data[$quarter][$post_id] = array(
						'post_id' => $row->post_id,
						'post_desc' => $row->desc,
						'post_title' => $row->title,
						'post_user_id' => $row->user_id,
						'post_username' => $post_username,
						'post_type_id' => $row->type_id,
						'post_status_id' => $row->status_id,
						'post_timestamp' => $row->timestamp
					);
			$desc_arr[$post_id] = $row->desc;
		}
		$data_all = array('title' => 'Intopia','main_content' => 'main_v','posts' => $data, 'desc_arr'=>$desc_arr);
		$this->load->view('template',$data_all);
	}


}
?>
