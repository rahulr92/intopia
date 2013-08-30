<?php
$uname = $this->session->userdata('username');
echo "<h1>Welcome $uname!</h1>";
?>
<ul>
	<li><a href="<?php echo base_url('index.php/main/posting'); ?>">Create New Post</a></li>
	<li>Messages</li>
	<li><a href="<?php echo base_url('index.php/main/logout'); ?>">Logout</a></li>
</ul>

<div id="postings">
 <?php echo $data; ?>
</div>

