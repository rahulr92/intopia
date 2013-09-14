<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$autoload['packages'] = array();




$autoload['libraries'] = array('database', 'session');




$autoload['helper'] = array('url');

$autoload['config'] = array();



$autoload['language'] = array();




$autoload['model'] = array('M_register','M_login', 'M_posting', 'Model','M_emails','M_forms');


/* End of file autoload.php */
/* Location: ./application/config/autoload.php */