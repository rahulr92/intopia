<?php
class Emails extends CI_Controller {

	public function __construct() { 
		parent::__construct();

	}

	public function list_mails(){
		$posts = $this->M_emails->get_mails_by_user();
		$thread_list_url = base_url('index.php/emails/list_threads/'); 
		$thread_detail_url = base_url('index.php/emails/thread_view/'); 
		$user_id = $this->session->userdata('user_id');
		$reply_list = "Replies to";
		foreach ($posts as $post ) {
			$title = $post->title;
			$post_id = $post->post_id;
			if($user_id === $post->user_id){
							$reply_list .= "<h3><a href='$thread_list_url/$post_id'>$title</a></h3>";
			} else {
				$thread_id = $this->M_emails->get_thread_by_sender_post($user_id, $post_id);
				$reply_list .= "<h3><a href='$thread_detail_url/$thread_id/$post_id'>$title</a></h3>";
			}
			
		}

			$data = array('title' => 'Intopia','main_content' => 'mails_v','data'=>$reply_list);
			$this->load->view('template',$data);
	}

	public function list_threads($post_id){
		$threads = $this->M_emails->get_threads_by_post($post_id);
		$thread_url = base_url('index.php/emails/thread_view/'); 
		$reply_list = "Replies";
		foreach ($threads as $thread ) {
			$snippet = $this->M_emails->get_latest_mail($thread->thread_id);
			//print_r($snippet);
			//echo $thread->thread_id;
			$reply_list .= "<h3><a href='$thread_url/$thread->thread_id/$post_id'>$snippet</a></h3>";
			
		}

			$data = array('title' => 'Intopia','main_content' => 'mails_v','data'=>$reply_list);
			 $this->load->view('template',$data);
	}

		public function thread_view($thread_id,$post_id){
		$threads = $this->M_emails->get_mails_by_thread($thread_id);
		$reply_list = "<h1>Conversation</h1>";
		foreach ($threads as $thread ) {

			$reply_list .= "<p>$thread->msg</p><hr>";
			//print_r($thread);
			//echo $thread->msg;
		}
		$msg_url = base_url('index.php/main/reply_thread');
		$sender= $this->session->userdata('user_id');
		$receiver_id=0;
		$reply_list .= "</br><form  method='post' action='$msg_url'/>
		<input type='hidden' name='post_id' value='$post_id'/>
		<input type='hidden' name='thread_id' value='$thread_id'/> 
		<textarea name='msg' class='row' rows='2' cols='100'>message</textarea></br><input type='submit' value='Reply'/></form>";

			$data = array('title' => 'Intopia','main_content' => 'mails_v','data'=>$reply_list);
			 $this->load->view('template',$data);
	}

}