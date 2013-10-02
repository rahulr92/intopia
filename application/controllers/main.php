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

	public function admin(){
		$data_all = array('title' => 'Intopia','main_content' => 'admin_v');
		$this->load->view('template',$data_all);
	//$this->get_posts();
	}

	public function edit_prof()
	{
		$team = $this->Model->get_team($this->session->userdata('user_id'));
		$data = array('title' => 'Create New Post','main_content' => 'edit_prof_v', 'team' => $team);
		$this->load->view('template',$data);
	}
	public function update_prof()
	{
		$user_id= $this->input->post('user_id');
		$uname= $this->input->post('username');
		$pswd= $this->input->post('opassword');
		$npswd= $this->input->post('npassword');
		$cnpswd= $this->input->post('cnpassword');
		$teamname = $this->input->post('teamname');
		if($npswd)
		{
		if($npswd == $cnpswd) $pswd = $npswd;	
		}
		$reg_details = array('username' => $uname,
								'password' => $pswd,
								'teamno' =>$this->input->post('teamno'),
								'teamname' => $teamname);
		$flag = $this->M_register->update($reg_details,$user_id);
		if($flag)
		{
			$msg =  "Profile updated successfully!";
			$this->session->set_userdata("teamname",$teamname);
		}
		else
			$msg =  "Invalid data. Update failed.";
				
		$this->session->set_flashdata('alert_msg', $msg );
		redirect('/main/','location',301);

	}
		



	public function posting()
	{
		$teams = $this->Model->get_teams();
		$data = array('title' => 'Create New Post','main_content' => 'posting_v', 'teams'=> $teams);
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
		$full_visibility = ($this->input->post('full_visibility') == 1)?1:0;
		//print_r($this->input->post());


		$data = array('title' => $title,'desc' => $desc, 'type_id' => $type, 'period' => $period, 
			'status_id'=>'1','user_id'=>$user_id,'anony_flag' => $anony_flag, 'full_visibility' =>$full_visibility);
		$post_id = $this->M_posting->posting($data);

				if(!$anony_flag){
				if(!$full_visibility){
				for($i=1;$i<=12;$i++){
						if($this->input->post("check_team$i"))
							{
								$this->Model->insert_post_visibility($post_id,$this->input->post("check_team$i"));
							}
				}	
			}
		}

		$this->session->set_flashdata('alert_msg', "Posted successfully!" );
		redirect('/main/','location',301);
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
		$full_visibility = ($this->input->post('full_visibility') == 1)?1:0;
		$data = array('title' => $title,'desc' => $desc, 'type_id' => $type, 'period' => $period, 
			'status_id'=>'1','user_id'=>$user_id,'anony_flag' => $anony_flag, 'full_visibility' =>$full_visibility);
		$this->M_posting->update_posting($post_id,$data);

			if(!$anony_flag){
				if(!$full_visibility){
					$this->Model->delete_post_visibility($post_id);
				for($i=1;$i<=12;$i++){
						if($this->input->post("check_team$i"))
							{
								$this->Model->insert_post_visibility($post_id,$this->input->post("check_team$i"));
							}
				}	
			}
		}

		$this->session->set_flashdata('alert_msg', "Post updated successfully!" );
		redirect('/main/','location',301);
		
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
		$teams = $this->Model->get_teams();
		$team_visib = Array();
		foreach ($teams as $team ) {
			if($this->M_emails->is_post_visible($post_id,$team->user_id))
				$team_visib[$team->user_id] = 1;
				else
				$team_visib[$team->user_id] = 0;
			}				
		

		$data = array('title' => 'Update Post','main_content' => 'edit_v', 'post'=>$post,
				 'teams' => $teams, 'team_visib'=>$team_visib);
		$this->load->view('template',$data);
		//redirect('/main/','location',301);

	}

	public function reply()
	{
		$this->M_emails->reply();
		$this->session->set_flashdata('alert_msg', "Reply sent successfully!" );
		redirect('/main/','location',301);
	}

	public function reply_thread()
	{

		$sender= $this->input->post('user_id');
		$sender_email = $this->M_emails->get_username($sender);
		$this->M_emails->reply_thread();
		$thread_id= $this->input->post('thread_id');
		$post_id= $this->input->post('post_id');
		redirect("/emails/thread_view/$post_id/$thread_id",'location',301);

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
			$post_teamname = ($post_user_id==$user_id)? "Anonymously by me":"Anonymous";
			if(!$row->anony_flag)
			{
				if($this->M_emails->is_post_visible($post_id,$user_id))
				{
					$post_teamname = $this->Model->get_teamname($post_user_id);
				}
			}
			
			

			$data[$quarter][$post_id] = array(
				'post_id' => $row->post_id,
				'post_desc' => $row->desc,
				'post_title' => $row->title,
				'post_user_id' => $row->user_id,
				'post_username' => $post_teamname,
				'post_type_id' => $row->type_id,
				'post_status_id' => $row->status_id,
				'post_timestamp' => $row->timestamp
				);
			$desc_arr[$post_id] = $row->desc;
		}
		$data_all = array('title' => 'Intopia','main_content' => 'main_v','all_posts' => $data, 'desc_arr'=>$desc_arr);
		$this->load->view('template',$data_all);
	}


}
?>
