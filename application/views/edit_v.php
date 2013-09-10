<form id="posting_frm" method="post" role="form"  action="<?php echo base_url('index.php/main/update_posting'); ?>">
    <h1>Edit Post</h1>
    <fieldset id="inputs">
                <input type='hidden' name='post_id' value='<?php echo $post->post_id; ?>'/>
        <div class="form-group">
            <label for="title">Title</label> 
            <input id="title" class="form-control"  type="text" name="title" placeholder="Title" value="<?php echo $post->title; ?>"  autofocus required>
        </div>
        <div class="form-group">
            <label for="desc">Description</label> 
            <textarea name="desc" id="desc" class="form-control"  rows="10" placeholder="Description" cols="50"><?php echo $post->desc; ?></textarea>
        </div>
        <div class="form-group">
            <label for="type">Type</label> 
            <select class="form-control"  id="post_type" name="type">
            <option value="1" <?php if($post->type_id==1) echo "selected='selected'"; ?>>For Sale</option> 
            <option value="2" <?php if($post->type_id==2) echo "selected='selected'"; ?>>Wanted</option>
         </select>    </div>
         <div class="form-group">
            <label for="period">Quarter</label> 
            <select class="form-control" id="post_period" name="period">
              <?php 
              for($i =1; $i<=12; $i++)
               echo "<option value='$i'";
           if($post->period==$i) echo "selected='selected'"; 
           echo ">Q$i</option>"; 
           ?>
       </select></div>
       <div id="post_visib">
        <div class="col-lg-offset4">
            <label for="full_visibility" >Choose which teams can view your post</label>
        </div>
        <div class="form-group col-lg-4">
            <div class='checkbox'><label class='checkbox-inline'>
                <input type='checkbox' class='checkbox' id='inlineCheckbox'   
                <?php  if($post->full_visibility==1) echo "checked='checked'";  ?>
                name='full_visibility' value='1'>
                Visible to all</label></div>
                <?php 
                foreach($teams as $team){
                    echo "<div class='checkbox'><label class='checkbox-inline'>
                    <input type='checkbox' class='checkbox team_check' name='check_team$team->user_id' value='$team->user_id'";
                    if($team_visib[$team->user_id] && $post->full_visibility==0 && $post->anony_flag==0) echo "checked='checked'";  
                    echo "/>$team->teamname </label></div>"; 
                }
                ?>
            </div>
            <div class="col-lg-3 ">
                <label for="full_visibility" >OR</label>
            </div>
            <div class='checkbox col-lg-5'><label class='checkbox-inline'>
                <input id = 'anony_flag' type='checkbox' value='1' <?php  if($post->anony_flag) echo "checked='yes'"; ?>   class='hide_closed' name='anony_flag' />
                Post anonymously</label></div>

            </div>

        </fieldset>
        <fieldset id="actions">
            <input type="submit" id="submit" class="btn btn-default" value="Update Post">
        </fieldset>
    </form>