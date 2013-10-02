<?php
class Login extends CI_Controller {

	public function __construct() { parent::__construct();}

	public function index()
	{
		$data = array('title' => 'Intopia Listing','main_content' => 'home_v','team_count'=>$this->Model->get_team_count());
		$this->load->view('template',$data);
	}

	public function test()
	{
		$uname= $this->input->post('username');
		$pswd= $this->input->post('password');
		$flag = $this->M_login->login($uname, $pswd);
		if($flag) {
			if($uname=== "admin@intopia.com")
					redirect('/main/admin','location',301);
				else
					redirect('/main/','location',301);
		// $data = array('title' => 'Intopia','main_content' => 'main_v');
		// $this->load->view('template',$data);
		}
		else
			{
				$msg =  "Incorrect username or password! Please try again.";
				$this->session->set_flashdata('alert_msg', $msg );
			redirect('/login/','location',301);
			}

	}


	public function show_thread($user_id,$post_id,$thread_id)
	{
		if($this->session->userdata('user_id')== $user_id){
			redirect("/emails/thread_view/$post_id/$thread_id",'location',301);
		}
		else{
			$this->session->sess_destroy();
		}

		$thread_details = array('user_id' => $user_id,
						'post_id' => $post_id,'thread_id' => $thread_id);
		$data = array('title' => 'Intopia Listing','main_content' => 'home_v',
				'thread_details' => $thread_details, 
				'team_count'=>$this->Model->get_team_count());
		$this->load->view('template',$data);

	}

	public function forgot()
	{
		
		$data = array('title' => 'Intopia Listing','main_content' => 'forgot_pswd_v');
		$this->load->view('template',$data);

	}
	public function mail_pswd()
	{
		$this->M_login->mail_pswd();
		$msg = array('msg' => "Your password has been mailed to given email address.");
		$this->load->view('alert_v',$msg);	
		$data = array('title' => 'Intopia Listing','main_content' => 'home_v');
		$this->load->view('template',$data);

	}

	public function thread_login()
	{
		$uname= $this->input->post('username');
		$pswd= $this->input->post('password');
		$thread_id= $this->input->post('thread_id');
		$post_id= $this->input->post('post_id');
		$user_id= $this->input->post('user_id');
if($uname === $this->Model->get_username($user_id))
{
		$flag = $this->M_login->login($uname, $pswd);
		if($flag) {
			redirect("/emails/thread_view/$post_id/$thread_id",'location',301);
		// $data = array('title' => 'Intopia','main_content' => 'main_v');
		// $this->load->view('template',$data);
		}
}
		else
			{
			redirect("/login/show_thread/$user_id/$post_id/$thread_id",'location',301);
			}

	}

}
?>
