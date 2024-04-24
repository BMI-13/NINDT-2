<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {


    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
        $this->app->is_staff();
        $this->load->model('Staff_model');
    }//end-func

    public function index($page=0) {
    $data='';
    $this->load->view('templates/head');
    $this->load->view('templates/navbar');

    $this->load->view('staff/index',$data);
    $this->load->view('templates/footer');


    }






















}