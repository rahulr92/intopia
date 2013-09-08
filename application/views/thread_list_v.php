<h1>Conversations for <?php echo $post_title; ?></h1>
		</tbody></table>
		<table class="table table-hover">
		<tbody>
		<?php
				$thread_detail_url = base_url('index.php/emails/thread_view/'); 
		foreach ($data as $thread_id => $thread ) {
			$last_msg = $thread['last_msg'];
			$sender = $thread['sender'];
			$thread_len = $thread['thread_len'];
			 $last_reply__date = date('D, M j Y g:i A', strtotime($last_msg->timestamp ));
			$snippet = $last_msg->msg;
			echo "<tr>
			<td>$sender</td>
			<td><a href='$thread_detail_url/$post_id/$thread_id'>$snippet ($thread_len)</a></td>
			<td>$last_reply__date</td>
			</tr>";

		}


	?>
</tbody></table>
