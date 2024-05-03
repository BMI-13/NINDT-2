<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Machines extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
       // $this->output->enable_profiler(TRUE);
        $this->app->is_staff();
        $this->load->model('Machines_model');
    }//end-func

    public function index($page=0) {
        $this->load->view('templates/head');
        $this->load->view('templates/navbar');

        $data 		= $this->app->set_data();
        $data['page']   = $page;
        $criteria       = array();
         
            //searching
            if($this->session->userdata('machine_is_search')) {
                $key   = $this->session->userdata('machines_search_key');
                $value = $this->session->userdata('machines_search_value');

                if($key == 'ma_status') { 				
                    switch (strtolower($value)){
                        case 'a' : $value = true; break;
                        case 'n' : $value = false; break;
                        default  : $key = 'ma_id'; $value = FALSE;
                    }
                } 
                dd($key);
                $criteria[$key] = $value;
            }


            $data['machines'] = $this->Machines_model->get_machines($criteria,$page);
            //echo $this->db->last_query();

            //pagination
            $total_rows = $this->Machines_model->get_total_machines($criteria) ;
            $this->app->set_pagination($total_rows,site_url('machines/index'));
            $data['pagination_html'] = $this->pagination->create_links();
            $data['total_rows'] = $total_rows;

        //var_dump($data);
        
       $this->load->view('machines',$data);
       $this->load->view('templates/footer');
    }//end-function
    
    
    public function add() {
        //add code to add a machines
    }//end-func
    
    
    public function view($ma_id,$page){
        
    }//end-func
    
    public function search() {

        //set search criteria
        $key = $this->input->post('list_key');
        $val = $this->input->post('txt_value');
       
        $this->session->set_userdata('machines_is_search',TRUE);
        $this->session->set_userdata('machines_search_key',$key);
        $this->session->set_userdata('machines_search_value',$val);

        redirect('machines');
    }//end-func

    public function clear_search() {
        $this->session->unset_userdata('machines_is_search');
        $this->session->unset_userdata('machines_search_key');
        $this->session->unset_userdata('machines_search_value');
        redirect('machines');
    }//end-func
    
}//end-class
