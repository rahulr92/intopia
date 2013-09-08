<h1>Message List</h1>
<h2>Replies to your posts</h2>
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
			echo "<tr>";
			echo "<td><a href='$thread_list_url/$post_id'>$title</a></td>";
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
		echo "<h2>Posts you replied</h2>";
	if(is_array($s_posts)){
		foreach ($s_posts as $post ) {
			$title = $post->title;
			$post_id = $post->post_id;
			$thread_id = $this->M_emails->get_thread_by_sender_post($user_id, $post_id);
			echo "<tr>";
			echo "<td><a href='$thread_detail_url/$post_id/$thread_id'>$title</a></td>";
			echo "</tr>";
		}
}
else echo "<hr>";

	?>
</tbody></table>
