    <!DOCTYPE html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <title><?php echo $title ?></title>
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width">

            <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
            <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>"/>
            <style>
                body {
                    padding-top: 50px;
                    padding-bottom: 20px;
                }
            </style>
            <link rel="stylesheet" href="<?php echo base_url('css/bootstrap-theme.min.css'); ?>"/>
            <link rel="stylesheet" href="<?php echo base_url('css/normalize.css'); ?>">
            <link rel="stylesheet" href="<?php echo base_url('css/main.css'); ?>">
            <script src="<?php echo base_url('js/vendor/modernizr-2.6.2.min.js'); ?>"></script>
        </head>
        <body>
            <!--[if lt IE 7]>
                <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
            <![endif]-->

            <!-- Add your site or application content here -->
        <div class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php echo base_url('index.php/main'); ?>">Intopia</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                    <li><?php if($this->session->userdata('user_id')) {echo "<a href='".base_url('index.php/main/posting')."'>New Post</a>"; } ?></li>
                     <li><?php if($this->session->userdata('user_id')) {echo "<a href='".base_url('index.php/emails/list_mails')."'>Messages</a>"; } ?></li>
                         <li><?php if($this->session->userdata('user_id')) {echo "<a href='".base_url('index.php/main/logout')."'>Logout</a>"; } ?></li>
              </ul>
            </div><!--/.navbar-collapse -->
          </div>
        </div>

            <div id="container" class="container">
                    <?php 
                       
                        $this->load->view($main_content); ?>
                 <footer>
                    <?php $this->load->view('includes/footer'); ?>
                </footer>
            </div>
     

            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script>window.jQuery || document.write('<script src="<?php echo base_url('js/vendor/jquery-1.9.1.min.js'); ?>"><\/script>')</script>
            <script src="<?php echo base_url('js/plugins.js'); ?>"></script>
            <script src="<?php echo base_url('js/main.js'); ?>"></script>
            <script src="<?php echo base_url('js/vendor/bootstrap.min.js'); ?>"></script>


            <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
            <script>
                var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
                (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
                g.src='//www.google-analytics.com/ga.js';
                s.parentNode.insertBefore(g,s)}(document,'script'));
            </script>
        </body>
    </html>
