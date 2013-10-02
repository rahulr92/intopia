
<?php 
if(isset($thread_details)){
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
	echo "<form id='login'  role='form' method='post' action='";
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
          <div class="form-group">
          <input type="submit" id="submit" class="btn btn-primary" value="Log in"></br>
  </div>
        </form>
        <a href="<?php echo base_url('index.php/login/forgot'); ?>">Forgot your password?</a></br>
        <?php
        if(isset($team_count)){if($team_count < $this->config->item('team_no')) { echo "<a href=".base_url('index.php/register').">Register</a>"; }}?></br>
