<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$CI =& get_instance();
$base_url = $CI->config->item('base_url');

/*
|--------------------------------------------------------------------------
|	Application Settings
|--------------------------------------------------------------------------
*/
$config = array();


//------------ settings for the folder paths for Style sheets, Javascripts & System Images ------
$config['css']            = $base_url . 'assets/css/';
$config['js']             = $base_url . 'assets/js/';
$config['sys_imgs']       = $base_url . 'assets/sys_imgs/';


//------- Pagination settings: for data grids ------------------------
$config['rows_per_page']  = 1;

//-------- Email settings ------------------------------------
$config['email']      = '';
$config["host"]       = "smtp.gmail.com";      
$config["port"]       = 465;     //or 587 for tls              
$config["user_name"]  = "";  
$config["password"]   = "";           
$config['email_footer'] = " Best Wishes,<br/>
                            System - NINDT";

//-------------- application settings -----------------

$config['psw_default']    = 'user@nindt';




//end-file
