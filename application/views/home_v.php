<form id="login" method="post" action="<?php echo base_url('index.php/login/test'); ?>">
    <h1>Log In</h1>
    <fieldset id="inputs">
 <input id="username" name=" username"type="text" placeholder="Username" autofocus required>   
        <input id="password" name="password" type="password" placeholder="Password" required>
    </fieldset>
    <fieldset id="actions">
        <input type="submit" id="submit" value="Log in"></br>
        <a href="">Forgot your password?</a></br><a href="<?php echo base_url('index.php/register'); ?>">Register</a>
    </fieldset>
</form>