<form id="login"method="post" role="form" action="<?php echo base_url('index.php/main/submit_posting'); ?>">
    <h1>Create New Post</h1>
    <fieldset id="inputs">
        <input id="title" type="text" name="title" placeholder="Title" autofocus required></br>   
        <textarea name="desc" rows="10" cols="50">Description</textarea></br>  
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
        <span>Post anonymously</span>
        <input id = 'Checked1' type='checkbox' value='1' class='hide_closed' name='anony_flag' />
    </fieldset>
    <fieldset id="actions">
        <input type="submit" id="submit" value="Create Post">
    </fieldset>
</form>