<?php
class Emails extends CI_Controller {

	public function __construct() { 
		parent::__construct();

	}

	public function list_mails(){
		$s_posts = $this->M_emails->get_mails_by_sender();
		$r_posts = $this->M_emails->get_mails_by_receiver();
		$thread_list_url = base_url('index.php/emails/list_threads/'); 
		$thread_detail_url = base_url('index.php/emails/thread_view/'); 
		$user_id = $this->session->userdata('user_id');
			$data = array('title' => 'Intopia Listing','main_content' => 'mail_list_v','s_posts'=>$s_posts,'r_posts'=>$r_posts);
			$this->load->view('template',$data);;
	}

	public function list_threads($post_id){
		$post_title = $this->Model->get_post_title($post_id);
		$threads = $this->M_emails->get_threads_by_post($post_id);
		$thread_url = base_url('index.php/emails/thread_view/'); 
		$hreads_arr = array();
		foreach ($threads as $thread ) {
			$thread_id=$thread->thread_id;
			$mail = $this->M_emails->get_latest_mail($thread_id);
			$sender_id = $this->M_emails->get_thread_sender($thread_id);
			$user =($this->M_emails->is_anony($thread_id,$sender_id)==1)?
									"Anonymous":$this->M_emails->get_teamname($sender_id);
			$thread_len = $this->M_emails->get_thread_len($thread_id);
			$threads_arr[$thread_id] = array(
					'last_msg' => $mail,
					'sender' => $user,
					'thread_len'  => $thread_len
				);
			
		}

			$data = array('title' => 'Intopia Listing','main_content' => 'thread_list_v','data'=>$threads_arr, 'post_title'=>$post_title, 'post_id' =>$post_id);
			 $this->load->view('template',$data);
	}

		public function thread_view($post_id,$thread_id){
		$threads = $this->M_emails->get_mails_by_thread($thread_id);
		$users=$this->M_emails->get_thread_users($thread_id);
				$post = $this->Model->get_post($post_id);
		if($this->M_emails->get_last_sender($post_id,$thread_id) != $this->session->userdata('user_id'))
					$this->M_emails->mark_as_read($thread_id);
			$data = array('title' => 'Intopia Listing','main_content' => 'mails_v','threads'=>$threads, 
						'thread_id' => $thread_id, 'post' => $post, 'users'=>$users);
			 $this->load->view('template',$data);
	}

}