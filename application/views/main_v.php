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
	<div class="period row">
		<h2>Q1 Listings</h2>
		<span>Displaying</span>
		<ul>
			<li>All</li>
			<li>For Sale</li>
			<li>Wanted</li>
		</ul>
		<span>Hide closed</span>
		<input id = "Checked1" type="checkbox" name="check1" />

		<div class="post">
			<h3>Title1</h3>
			<h4>For Sale</h4>
			<h4>Open</h4>
			<h4>Q1</h4>
			<span>Action</span>
			<ul>
				<li>Details</li>
				<li>Reply</li>
				<li>Close</li>
				<li>Delete</li>
			</ul>

		</div>
	</div>
</div>

