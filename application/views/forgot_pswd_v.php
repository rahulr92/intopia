<form id="register_frm" method="post" action="<?php echo base_url('index.php/login/mail_pswd'); ?>">
    <h1>Find your account</h1>
       <div class="form-group">
        <label for="title">Email Address</label> 
        <input id="username" class="form-control" name=" username" type="email" placeholder="email@address" autofocus >   
    </div>
    <label for="submit">
      Your password will be mailed to the given email address
    </label></br>
    <input type="submit" id="submit" class="btn btn-default" value="Get Password"></br>
</fieldset>
</form></br>