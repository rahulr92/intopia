
<?php 
if(is_array($thread_details)){
	$user_id= $thread_details['user_id'];
	$post_id= $thread_details['post_id'];
	$thread_id= $thread_details['thread_id'];
	echo     "<h1>Log in to see the conversation</h1>";
	echo "<form id='login'  role='form' method='post' action='";
		echo base_url('index.php/login/thread_login')."'>";
	echo "<input type='hidden' name='user_id' value=$user_id>";
	echo "<input type='hidden' name='post_id' value=$post_id>";
	echo "<input type='hidden' name='thread_id' value=$thread_id>";
}
	else
	{
		echo     "<h1>Log In</h1>";
	echo base_url('index.php/login/test')."'>";
}

?>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control"  name="username" id="username" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
  </div>
        <input type="submit" id="submit" class="btn btn-primary" value="Log in"></br>
        <?php
        if($team_count < 12) { echo "<a href=".base_url('index.php/register').">Register</a>"; }?></br>
</form>