<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This is the beginning of the controller that holds the functions related to HD Prescriptions inside this site.
class HDPrescription extends CI_Controller {

    // Loading the basics
    public function __construct() {
        parent::__construct();
        // $this->output->enable_profiler(TRUE);
        $this->app->is_staff();
        $this->load->model('HDPrescription_model');
    }//end-func


    // This will start the function that loads by default when HD Prescription controller is called
    public function index($page=0) {
        $this->load->view('templates/head');
        $this->load->view('templates/navbar');
    }
}
// Controller that holds the functions related to HD Prescriptions ends here!
