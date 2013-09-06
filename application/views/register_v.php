<form id="register_frm" method="post" action="<?php echo base_url('index.php/register/submit'); ?>">
    <h1>Log In</h1>
    <fieldset id="inputs">
        <input id="username" name=" username"type="text" placeholder="Username" autofocus required>   
        <input id="password" name="password" type="password" placeholder="Password" required>
        <input id="cpassword" type="password" placeholder="Confirm Password" required>
    </fieldset>
    <fieldset id="actions">
        <input type="submit" id="submit" value="Register"></br>
    </fieldset>
</form>