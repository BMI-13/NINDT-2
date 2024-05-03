<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entries extends CI_Controller {
    public function add_entry() {
        // Load the add_entry view
        $this->load->view('add_entry');
    } //add_entry loading method ends here
}
