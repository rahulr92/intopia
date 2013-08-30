<form id="login"method="post" action="<?php echo base_url('index.php/main/submit_posting'); ?>">
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
		</select>
    </fieldset>
    <fieldset id="actions">
        <input type="submit" id="submit" value="Create Post">
    </fieldset>
</form>