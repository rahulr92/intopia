<?php
$user_id = $this->session->userdata('user_id');
//echo "<h1>Welcome $uname!</h1>";
$msg_url = base_url('index.php/main/reply');
   $edit_url = base_url('index.php/main/edit');
    $close_url = base_url('index.php/main/change_status');
    $delete_url = base_url('index.php/main/delete');
?>

  
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="modal-title">Modal title</h4>
        </div>
        <div class="modal-body">
          <p id="modal-desc">In arcu in enim ut porttitor magnis ultricies velit auctor cras tortor ac lorem proin turpis lorem odio enim natoque! Tincidunt? Enim. Mid nisi dis, porttitor. Tortor cras pid integer urna tincidunt! Augue mid magna, sagittis lorem pellentesque enim arcu, nascetur ut in dignissim, dolor ac et platea, sed ac lundium tincidunt? Enim? Ut augue placerat, in sed ultricies! Ultrices? Nisi! Diam? Sagittis! Rhoncus, dignissim tincidunt. Scelerisque ut et ut amet, porttitor ac pellentesque cum, mus rhoncus turpis? Aliquet dolor. Vut mattis, diam nunc aenean lundium, montes amet! Cum ut! Pellentesque odio amet duis in vel, pulvinar scelerisque, eu, pid nunc dis et pid aliquet pulvinar tempor quis, mattis ac mid scelerisque! Dis et ac phasellus velit aliquet! In integer</p>
        <hr>
        <div class="non_owner">
        <h3>Reply</h3>
        <form class='' method='post' action='<?php echo $msg_url; ?>'/>
		<input type='hidden' name='post_id' class='post_id' value=''/>
		<input type='hidden' name='post_user_id' id='post_user_id' value=''/> 
		<input type='hidden' name='user_id' id='user_id'  value=''/>
		<textarea name='msg' class='' rows='2' cols='60' placeholder="Message"></textarea></br>
		<span>Make anonymous</span>
		<input id = 'Checked1' type='checkbox' class='hide_closed' value='1' name='anony_flag' /></br>
		<input type='submit' class='btn btn-success' id='submit_reply' value='Send' >
		</form>
	</div>
	 <div class="owner">
        <h3>Options</h3>
        <form class='owner_btn' method='post' action='<?php echo $edit_url; ?>'/>
              <input type='hidden' name='post_id' class='post_id' value=''/>

		<input type='submit' class='btn btn-success' value='Edit'>
		</form>
		 <form class='owner_btn' id='status_frm' method='post' action='<?php echo $close_url; ?>'/>
      <input type='hidden' name='post_id' class='post_id' value=''/>
        <input type='hidden' name='status' id='status_toggle_flag'  value='0'/>
		<input type='submit' id='status_btn' class='btn btn-warning' value='Mark as closed'>
		</form>
		 <form class='owner_btn' id='delete_post_frm' method='post' action='<?php echo $delete_url; ?>'/>
    <input type='hidden' name='post_id' class='post_id' value=''/>
		<input type='submit' class='btn btn-danger' value='Delete'>
		</form>
	</div>

	</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<?php //print_r($posts);
if(is_array($all_posts)){
  foreach ($all_posts as $quarter => $posts) {
    echo "<h2>Quarter$quarter</h2>";
    ?>
    <table class="table table-hover">
              <thead>
                <tr>
                  <th class='post_type_th'>Offer type</br><select class="type-select" data-quarter="q<?php echo $quarter; ?>"><option>All</option><option>For Sale</option><option>Wanted</option></select></th>
                  <th  class='post_title_th'>Title</th>
                  <th>Posted By</th>
                  <th class='post_status_th'>Status </br> <select class="status-select" data-quarter="q<?php echo $quarter; ?>"><option>All</option><option>Open</option><option>Closed</option></select></th>
                  <th>Time Posted</th>
                </tr>
              </thead>
              <tbody>
                <?php
    foreach ($posts as $post) {
      //print_r($post);
       
       $post_id = $post['post_id'];
      $post_desc = $post['post_desc'];
      $post_title = $post['post_title'];
      $post_user_id = $post['post_user_id'];
      $post_username = $post['post_username'];
      $post_timestamp = $post['post_timestamp'];
      $post_date = date('D, M j Y g:i A', strtotime($post_timestamp ));
      $post_type = (($post['post_type_id'] == 1)? "For Sale": "Wanted");
       $post_status = $post['post_status_id']?'Open':'Closed';
      echo "<tr class='post_row' data-title='$post_title' data-quarter='q$quarter'  data-status='$post_status' data-type='$post_type'>
                  <td>$post_type</td>
                  <td><a class='post_title' data-postid='$post_id' data-postuserid='$post_user_id' data-status='$post_status' data-toggle='modal' href='#myModal'>$post_title</a></td>
                  <td>$post_username</td>
                  <td>$post_status</td>
                  <td>$post_date</td>
                </tr>";
    }
    echo   "</tbody></table>";
  }
}
 ?>


<script type="text/javascript">
window.desc = [];
 window.user_id = <?php echo $user_id.";";
 //print_r($desc_arr);
  foreach ($desc_arr as $post_id => $post_desc) {
 echo "window.desc['$post_id'] = '$post_desc';";
  }
 ?>
</script>

