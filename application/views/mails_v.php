<h1>Conversation for <?php echo $post->title; ?></h1>
<?php
 $user_id = $this->session->userdata('user_id');
$msg_url = base_url('index.php/main/reply_thread');
$post_id = $post->post_id;
$sender_id= 0;
		foreach ($threads as $thread ) {
			$sender_id = $thread->sender_id;
			$receiver_id = $thread->receiver_id;
			$date = date('D, M j Y g:i A', strtotime($thread->timestamp));
			echo "<span>$users[$sender_id] to $users[$receiver_id]</span>";
			echo "</br><span>$date</span>";
 			echo "<p>$thread->msg</p><hr>";
		}

		//If last mail was send by logged in user, last mail receiver will also be next mail reciever.
		//If  not, last sender(the otehr user) will become next receiver.
		$receiver_id=($user_id==$sender_id) ? $receiver_id: $sender_id;


?>

</br><form  id="thread_reply_frm" method='post' action='<?php echo $msg_url; ?>'/>
		<input type='hidden' name='post_id' value='<?php echo $post_id; ?>'/>
		<input type='hidden' name='thread_id' value='<?php echo $thread_id; ?>'/> 
		<input type='hidden' name='sender_id'  value='<?php echo $user_id; ?>'/> 
		<input type='hidden' name='receiver_id'   value='<?php echo $receiver_id; ?>'/>
		  <div class="form-group">
    <textarea name='msg' class='row' rows='2' cols='100' placeholder="Message"></textarea>

  </div> 
  <?php
  		//option to reply anonymously should be available only till user first reveals
		if($users[$user_id] === "Anonymous"){
			echo "<div class='checkbox'><label><input name='anony_flag' type='checkbox' checked='yes'>Make anonymous</label></div>";
		}
    ?>
			<button type="submit" class="btn btn-default">Reply</button></form>