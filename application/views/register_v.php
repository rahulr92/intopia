<form id="register_frm" method="post" action="<?php echo base_url('index.php/register/submit'); ?>">
    <h1>Register</h1>
    <fieldset id="inputs">
        <input id="username" name=" username" type="email" placeholder="Username" autofocus required>   
        <input id="password" name="password" type="password" placeholder="Password" required>
         <input id="cpassword" type="password" placeholder="Confirm Password" required>
           </br>  
	        <select name="teamno">
        <?php
	        	for($i =1; $i<=12; $i++)
	      	           echo "<option value='$i'>Team$i</option>"; 
	      ?>
		</select>  </br>  
		  <input id="teamname" name="teamname" type="text" placeholder="Teamname" autofocus required>   
       
    </fieldset>
    <fieldset id="actions">
        <input type="submit" id="submit" value="Register"></br>
    </fieldset>
</form>