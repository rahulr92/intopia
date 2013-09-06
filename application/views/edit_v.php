<form id="login"method="post" role="form" action="<?php echo base_url('index.php/main/update_posting'); ?>">
    <h1>Edit Post</h1>
    <fieldset id="inputs">
        <input type='hidden' name='post_id' value='<?php echo $post->post_id; ?>'/>
        <input id="title" type="text" name="title" placeholder="" value="<?php echo $post->title; ?>" autofocus required></br>   
        <textarea name="desc" rows="10" cols="50"><?php echo $post->desc; ?></textarea></br>  
        <select name="type">
 		 	<option value="1" <?php if($post->type_id==1) echo "selected='selected'"; ?>>For Sale</option> 
  			<option value="2" <?php if($post->type_id==2) echo "selected='selected'"; ?>>Wanted</option>
		</select></br>  
	        <select name="period">
	        	<?php 
	        	for($i =1; $i<=12; $i++)
                {
	      	           echo "<option value='$i'"; 
                        if($post->period==$i) echo "selected='selected'"; 
                        echo ">Q$i</option>"; 
                    }
	        	?>
		</select></br>
        <span>Post anonymously</span>
        <input id = 'Checked1' type='checkbox' value="1" <?php  if($post->anony_flag) echo "checked='yes'"; ?>  class='hide_closed' name='anony_flag' />
    </fieldset>
    <fieldset id="actions">
        <input type="submit" id="submit" value="Update Post">
    </fieldset>
</form>