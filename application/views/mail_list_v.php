<h1>Message List</h1>
<h2>Replies to your posts:</h2>
<table class="table table-hover">
	<tbody>
		<?php
		$thread_list_url = base_url('index.php/emails/list_threads/'); 
		$thread_detail_url = base_url('index.php/emails/thread_view/'); 
		$user_id = $this->session->userdata('user_id');

		if(is_array($r_posts)){
		foreach ($r_posts as $post ) {
			$title = $post->title;
			$post_id = $post->post_id;
			$read_status =  $this->M_emails->get_post_rstatus($post_id);
			echo "<tr";
			if($read_status ==0) echo " class='success'";
			echo "><td><a href='$thread_list_url/$post_id'>$title</a></td>";
			echo "</tr>";
		}
	}
	else
		echo "<hr>";
		?>
		</tbody></table>
		<table class="table table-hover">
		<tbody>
		<?php
		echo "<h2>Posts you replied:</h2>";
	if(is_array($s_posts)){
		foreach ($s_posts as $post ) {
			$title = $post->title;
			$post_id = $post->post_id;
			$thread_id = $this->M_emails->get_thread_by_sender_post($user_id, $post_id);
			$mail = $this->M_emails->get_latest_mail($thread_id);
			$read_status = $mail->status;
			//the last sender was the current user. hence read
			if($mail->sender_id == $this->session->userdata('user_id'))
				$read_status = 1;
			echo "<tr";
			if($read_status ==0) echo " class='success'";
			echo "><td><a href='$thread_detail_url/$post_id/$thread_id'>$title</a></td>";
			echo "</tr>";
		}
}
else echo "<hr>";

	?>
</tbody></table>
