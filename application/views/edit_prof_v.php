<form id="register_frm" method="post" action="<?php echo base_url('index.php/main/update_prof'); ?>">
    <h1>Update profile</h1>
       <div class="form-group">
        <label for="title">Email Address</label> 
        <input id="userid" class="form-control" name=" user_id" type="hidden" value=<?php echo $team->user_id;?> >   
        <input id="username" class="form-control" name=" username" type="email" value=<?php echo $team->username;?> autofocus >   
    </div>
    <div class="form-group">
        <label for="title">Change Password</label> 
         <input id="opassword" class="form-control" name="opassword" type="hidden" value=<?php echo $team->password;?>  >   
        <input id="npassword" class="form-control"  name="npassword" type="password" placeholder="New Password" > 
        <input id="cnpassword"  class="form-control"  name="cnpassword" type="password" placeholder="Confirm New Password" >
    </div>
    <div class="form-group hide"> 
        <label for="title">Team number</label> 
        <select class="form-control"  name="teamno" >
            <?php
            for($i =0; $i<=12; $i++){
             echo "<option value='$i'";
              if ($i == $team->teamno) echo "selected='selected'";
              echo ">Team $i</option>"; 
          }
         ?>
     </select>   
 </div>
 <div class="form-group">
    <label for="title">Teamname</label> 
    <input id="teamname" class="form-control"  name="teamname" type="text" value="<?php echo $team->teamname;?>"  autofocus >   
</div>


    <input type="submit" id="submit" class="btn btn-default" value="Update"></br>
</fieldset>
</form>