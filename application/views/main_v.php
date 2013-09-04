<?php
$user_id = $this->session->userdata('user_id');
//echo "<h1>Welcome $uname!</h1>";
?>

  <!-- Button trigger modal -->
  <a data-toggle="modal" href="#myModal" >Launch demo modal</a>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Modal title</h4>
        </div>
        <div class="modal-body">
          <p id="modal-desc">In arcu in enim ut porttitor magnis ultricies velit auctor cras tortor ac lorem proin turpis lorem odio enim natoque! Tincidunt? Enim. Mid nisi dis, porttitor. Tortor cras pid integer urna tincidunt! Augue mid magna, sagittis lorem pellentesque enim arcu, nascetur ut in dignissim, dolor ac et platea, sed ac lundium tincidunt? Enim? Ut augue placerat, in sed ultricies! Ultrices? Nisi! Diam? Sagittis! Rhoncus, dignissim tincidunt. Scelerisque ut et ut amet, porttitor ac pellentesque cum, mus rhoncus turpis? Aliquet dolor. Vut mattis, diam nunc aenean lundium, montes amet! Cum ut! Pellentesque odio amet duis in vel, pulvinar scelerisque, eu, pid nunc dis et pid aliquet pulvinar tempor quis, mattis ac mid scelerisque! Dis et ac phasellus velit aliquet! In integer</p>
        <hr>
        <div class="non_owner hide">
        <h3>Reply</h3>
        <form class='' method='post' action='$msg_url'/>
		<input type='hidden' name='post_id' value='$post_id'/>
		<input type='hidden' name='post_user_id' value='$post_user_id'/> 
		<input type='hidden' name='user_id' value='$user_id'/>
		<textarea name='msg' class='' rows='2' cols='60'>Message</textarea></br>
		<span>Make anonymous</span>
		<input id = 'Checked1' type='checkbox' class='hide_closed' name='check1' /></br>
		<input type='submit' class='btn btn-success' value='Send' $close_btn>
		</form>
	</div>
	 <div class="owner">
        <h3>Options</h3>
        <form class='owner_btn' method='post' action='$msg_url'/>
		<input type='submit' class='btn btn-success' value='Edit' $close_btn>
		</form>
		 <form class='owner_btn' method='post' action='$msg_url'/>
		<input type='submit' class='btn btn-warning' value='Mark as closed' $close_btn>
		</form>
		 <form class='owner_btn' method='post' action='$msg_url'/>
		<input type='submit' class='btn btn-danger' value='Delete' $close_btn>
		</form>
	</div>

	</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="quarter" id="q1">
	<h2>Quarter1</h2>
<table class="table">
              <thead>
                <tr>
                  <th>Offer type</th>
                  <th>Title</th>
                  <th>Posted By</th>
                  <th>Status </br> <select><option>All</option><option>Open</option><option>Closed</option></select></th>
                  <th>Time Posted</th>
                </tr>
              </thead>
              <tbody>
                <tr class='post_row' id='p5' data-postid='5' data-postuserid='2'>
                  <td>1</td>
                  <td><a data-toggle="modal" href='#myModal'>Mark</a></td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Larry</td>
                  <td>the Bird</td>
                  <td>@twitter</td>
                  <td>@mdo</td>
                </tr>
              </tbody>
            </table>

  <p>End of Quarter1</p>
    <hr>
</div>


<div class="quarter" id="q2">
<h2>Quarter2</h2>
<table class="table">
              <thead>
                <tr>
                  <th>Offer type</th>
                  <th>Title</th>
                  <th>Posted By</th>
                  <th>Status</th>
                  <th>Time Posted</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td><a data-toggle="modal" href='#myModal'>Mark</a></td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <td>@mdo</td>
                </tr>
              </tbody>
            </table>
  <hr>
  <p>End of Quarter2</p>
</div>
<script type="text/javascript">
 window.user_id = <?php echo $user_id; ?>;
</script>
 <?php //echo $data; ?>

