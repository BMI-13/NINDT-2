<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Patients extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        //$this->output->enable_profiler(TRUE);
        $this->app->is_staff();
        $this->load->model('Patients_model');
    }//end-function

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
            //var_dump($key);

            if($key == 'p_nindt_id') { 
            
            $key = 'p_nindt_id'; 

            }elseif($key == 'p_gender') { 				
                switch ($value){
                    case 'm' : $value = false; break;
                    case 'f' : $value = true; break;
                    default  : $key = 'p_id_pk'; $value = FALSE;
                }
            }elseif($key == 'p_status') { 				
                switch ($value){
                    case 'c' : $value = 'current'; break;
                    case 'd' : $value = 'dead'; break;
                    case 'l' : $value = 'live'; break;
                    default  : $key = 'p_id_pk'; $value = FALSE;
                }
            } 
            $criteria[$key] = $value;
            //var_dump($criteria);
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
    }//end-functiontion
    
    
    public function add() {
        $this->load->view('templates/head');
        $this->load->view('templates/navbar');
        $this->load->view('templates/footer');

            if ($_POST) {
                $patient_data = array(
                    'p_nindt_id' => $this->input->post('p_nindt_id'),
                    'p_old_nindt_id' => $this->input->post('p_old_nindt_id'),
                    'p_name' => $this->input->post('p_name'),
                    'p_gender' => $this->input->post('p_gender'),
                    'p_status' => $this->input->post('p_status'),
                    'p_nic' => $this->input->post('p_nic'),
                    'p_bht' => $this->input->post('p_bht'),
                    'p_tpnumber' => $this->input->post('p_tpnumber'),
                    'p_email' => $this->input->post('p_email'),
                    'p_birthDate' => $this->input->post('p_birthDate'),
                    'p_address' => $this->input->post('p_address'),
                    'p_assignedcategory' => $this->input->post('p_assignedcategory')
                );
                $this->Patients_model->add_patient($patient_data);
                redirect('patient');
            } else {

        



                $data['status'] = "Add";
                $this->load->view('patients/add_patient',$data);

            }    
    }//end-function
    
    
    public function view($p_id){

        // Call the get_machine_by_id method to fetch the machine data
        $data['patient']  = $this->Patients_model->get_patient_by_id($p_id);


        $this->load->view('templates/head');
        $data['age'] = date_diff(date_create(), date_create($data['patient']->p_birthDate));



      $this->load->view('patients/single_view_patient',$data);
      $this->load->view('templates/footer');



        
    }//end-function

    public function edit($p_id){

        // if($this->session->flashdata('is_notification')) {
        //     $data['is_notification']		= $this->session->flashdata('is_notification');
        //     $data['notification_type']		= $this->session->flashdata('notification_type');
        //     $data['notification_description']   = $this->session->flashdata('notification_description');
        // }
        
        // Call the get_machine_by_id method to fetch the machine data
        $data['patient']  = $this->Patients_model->get_patient_by_id($p_id);


        $this->load->view('templates/head');

        $data['status'] = $p_id;
$this->load->model('Units_model');
$data['active_units'] = $this->Units_model->get_active_units();

      // var_dump($machine_data);

      $this->load->view('patients/add_patient',$data);
      $this->load->view('templates/footer');



        
    }


    
    // Function to handle adding and editing patients
    public function manage() {

        $p_id_pk = $this->input->post('p_id_pk');
            // Form submission
            $patient_data = array(
                'p_nindt_id' => $this->input->post('p_nindt_id'),
                'p_old_nindt_id' => $this->input->post('p_old_nindt_id'),
                'p_name' => $this->input->post('p_name'),
                'p_gender' => ($this->input->post('p_gender')=="Male")?0:1,
                'p_status' => $this->input->post('p_status'),
                'p_nic' => $this->input->post('p_nic'),
                'p_tpnumber' => $this->input->post('p_tpnumber'),
                'p_email' => $this->input->post('p_email'),
                'p_birthDate' => $this->input->post('p_birthDate'),
                'p_address' => $this->input->post('p_address'),
                'p_assignedcategory' => $this->input->post('p_assignedcategory')
            );
            $result = '';
            if ($p_id_pk!="Add") {
                // Editing existing patient
               $result =  $this->Patients_model->update_patient($p_id_pk, $patient_data);
            } else {
                // Adding new patient
                $result =   $this->Patients_model->add_patient($patient_data);
            }
            //var_dump($result);
             redirect('patients');
    }



    
    public function search() {

        //set search criteria
        $key = $this->input->post('list_key');
        $val = $this->input->post('txt_value');
       
        $this->session->set_userdata('patients_is_search',TRUE);
        $this->session->set_userdata('patients_search_key',$key);
        $this->session->set_userdata('patients_search_value',$val);

        redirect('patients');
    }//end-function

    public function clear_search() {
        $this->session->unset_userdata('patients_is_search');
        $this->session->unset_userdata('patients_search_key');
        $this->session->unset_userdata('patients_search_value');
        redirect('patients');
    }//end-function
    
}//end-class
