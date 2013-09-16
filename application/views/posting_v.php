<?php
        $user_id = $this->session->userdata('user_id');
?>
<form id="posting_frm" method="post" role="form"  action="<?php echo base_url('index.php/main/submit_posting'); ?>">
    <h1>Create New Post</h1>
    <fieldset id="inputs">
        <div class="form-group">
            <label for="title">Title</label> 
            <input id="title" class="form-control"  type="text" name="title" placeholder="Title" autofocus required>
        </div>
        <div class="form-group">
            <label for="desc">Description</label> 
            <textarea name="desc" id="desc" class="form-control"  rows="10" placeholder="Description" cols="50"></textarea>
        </div>
        <div class="form-group">
            <label for="type">Type</label> 
            <select class="form-control"  id="post_type" name="type">
               <option value="1">For Sale</option> 
               <option value="2">Wanted</option>
           </select>    </div>
           <div class="form-group">
            <label for="period">Quarter</label> 
            <select class="form-control" id="post_period" name="period">
              <?php 
              for($i =1; $i<=12; $i++)
                 echo "<option value='$i'>Q$i</option>"; 
             ?>
         </select></div>
         <div id="post_visib">
            <div class="col-lg-offset4">
                <label for="full_visibility" >Choose which teams can view your post</label>
            </div>
            <div class="form-group col-lg-4">
                <div class='checkbox'><label class='checkbox-inline'>
                    <input type='checkbox' class='checkbox' id='inlineCheckbox' checked="checked" name='full_visibility' value='1'>
                    Visible to all</label></div>
                    <?php 
                    foreach($teams as $team){
                        echo "<div class='checkbox'><label class='checkbox-inline'>
                        <input type='checkbox' class='checkbox team_check' id='' name='check_team$team->user_id' value='$team->user_id'>
                        $team->teamname </label></div>"; 
                    }
                    ?>
                </div>
                <div class="col-lg-3 ">
                    <label for="full_visibility" >OR</label>
                </div>
                <div class='checkbox col-lg-5'><label class='checkbox-inline'>
                    <input id = 'anony_flag' type='checkbox' value='1' class='hide_closed' name='anony_flag' />
                    Post anonymously</label></div>

                </div>

            </fieldset>
            <fieldset id="actions">
                <input type="submit" id="submit" class="btn btn-default" value="Create Post">
            </fieldset>
        </form>