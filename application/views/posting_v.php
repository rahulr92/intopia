<form id="login"method="post" role="form" action="<?php echo base_url('index.php/main/submit_posting'); ?>">
    <h1>Create New Post</h1>
    <fieldset id="inputs">
        <input id="title" type="text" name="title" placeholder="Title" autofocus required></br>   
        <textarea name="desc" rows="10" placeholder="Description" cols="50"></textarea></br>  
        <select name="type">
 		 	<option value="1">For Sale</option> 
  			<option value="2">Wanted</option>
		</select></br>  
	        <select name="period">
	        	<?php 
	        	for($i =1; $i<=12; $i++)
	      	           echo "<option value='$i'>Q$i</option>"; 
	        	?>
		</select></br>
        <label >
            <div class='checkbox'><label>
                        <input type='checkbox' class='checkbox' id='inlineCheckbox' name='check_all' value='1'>
                        All</label></div>
            <?php 
                 foreach($teams as $team){
                        echo "<div class='checkbox'><label>
                        <input type='checkbox' class='checkbox' id='inlineCheckbox' name='check_team$team->user_id' value='$team->user_id'>
                        $team->teamname </label></div>"; 
                    }
                ?>
        
        </label></br>
        
        <input id = 'Checked1' type='checkbox' value='1' class='hide_closed' name='anony_flag' /><span>Post anonymously</span>
    </fieldset>
    <fieldset id="actions">
        <input type="submit" id="submit" value="Create Post">
    </fieldset>
</form>