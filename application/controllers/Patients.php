<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patients extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
        $this->app->is_staff();
        $this->load->model('Patients_model');
    }//end-func

    public function index($page=0) {
        $this->load->view('templates/head');
        $this->load->view('templates/navbar');

        $data 		= $this->app->set_data();
        $data['page']   = $page;
        $criteria       = array();
         
        //searching
        if($this->session->userdata('patients_is_search')) {
            $key   = $this->session->userdata('patients_search_key');
            $value = $this->session->userdata('patients_search_value');

            if($key == 'p_gender') { 				
                switch ($value){
                    case 'm' : $value = false; break;
                    case 'f' : $value = true; break;
                    default  : $key = 'p_id_pk'; $value = FALSE;
                }
            }else if($key == 'p_status') { 				
                switch ($value){
                    case 'c' : $value = 'current'; break;
                    case 'd' : $value = 'dead'; break;
                    case 'l' : $value = 'live'; break;
                    default  : $key = 'p_id_pk'; $value = FALSE;
                }
            } 
            $criteria[$key] = $value;
        }

        
        $data['patients'] = $this->Patients_model->get_patients($criteria,$page);
        //echo $this->db->last_query();

        //pagination
        $total_rows = $this->Patients_model->get_total_patients($criteria) ;
        $this->app->set_pagination($total_rows,site_url('patients/index'));
        $data['pagination_html'] = $this->pagination->create_links();
        $data['total_rows'] = $total_rows;

        //var_dump($data);
        
       $this->load->view('patients',$data);
       $this->load->view('templates/footer');
    }//end-function
    
    
    public function add() {
        //add code to add a patient
    }//end-func
    
    
    public function view($p_id,$page){
        
    }//end-func
    
    public function search() {

        //set search criteria
        $key = $this->input->post('list_key');
        $val = $this->input->post('txt_value');
       
        $this->session->set_userdata('patients_is_search',TRUE);
        $this->session->set_userdata('patients_search_key',$key);
        $this->session->set_userdata('patients_search_value',$val);

        redirect('machines');
    }//end-func

    public function clear_search() {
        $this->session->unset_userdata('patients_is_search');
        $this->session->unset_userdata('patients_search_key');
        $this->session->unset_userdata('patients_search_value');
        redirect('machines');
    }//end-func
    
}//end-class
