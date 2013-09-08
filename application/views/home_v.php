<form id="login" method="post" action="<?php echo base_url('index.php/login/test'); ?>">
    <h1>Log In</h1>
    <fieldset id="inputs">
 <input id="username" name=" username"type="text" placeholder="Username" autofocus required>   
        <input id="password" name="password" type="password" placeholder="Password" required>
    </fieldset>
    <fieldset id="actions">
        <input type="submit" id="submit" value="Log in"></br>
        <?php
        if($team_count < 12) { echo "<a href=".base_url('index.php/register').">Register</a>"; }?>
    </fieldset>
</form>