<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Machines extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
       // $this->output->enable_profiler(TRUE);
        $this->app->is_staff();
        $this->load->model('Machines_model');
    }//end-function

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

                if($key == 'ma_id') { 		
                    $key =  'machine_public_id';
                } 
                //var_dump($key);
                $criteria[$key] = $value;
            }


            $data['machines'] = $this->Machines_model->get_machines($criteria,$page);
            //echo $this->db->last_query();

            //pagination
            $total_rows = $this->Machines_model->get_total_machines($criteria) ;
            $this->app->set_pagination($total_rows,site_url('machines/index'));
            $data['pagination_html'] = $this->pagination->create_links();
            $data['total_rows'] = $total_rows;


            if($this->session->flashdata('is_notification')) {
                $data['is_notification']		= $this->session->flashdata('is_notification');
                $data['notification_type']		= $this->session->flashdata('notification_type');
                $data['notification_description']   = $this->session->flashdata('notification_description');
            }



       $this->load->view('machines',$data);
        //var_dump($data);
       $this->load->view('templates/footer');
    }//end-function
    
    
    public function add() {

        $this->load->view('templates/head');
        $this->load->view('templates/footer');

        $data['status'] = "Add";

        if($this->session->flashdata('is_notification')) {
            $data['is_notification']		= $this->session->flashdata('is_notification');
            $data['notification_type']		= $this->session->flashdata('notification_type');
            $data['notification_description']   = $this->session->flashdata('notification_description');
        }

       $this->load->view('machines/add_machines',$data);
    }//end-function

    public function submitform(){

       // var_dump($_POST); // Dump POST data

if($this->input->post('machine_id')=='Add'){   
// Load the Machine_model
$this->load->model('Machines_model');
        
// Data from the submitted form
$data = array(
    'machine_public_id' => $this->input->post('machine_public_id'),
    'machine_unit' => $this->input->post('machine_unit'),
    'machine_serial' => $this->input->post('machine_serial'),
    'machine_manufacturer' => $this->input->post('machine_manufacturer'),
    'machine_model' => $this->input->post('machine_model'),
    'machine_active' => $this->input->post('machine_active') ? 1 : 0,
    'machine_starting_date' => $this->input->post('machine_starting_date'),
    'machine_cautions' => $this->input->post('machine_cautions'),
    'machine_notes' => $this->input->post('machine_notes')
);

// Call the add_new_machine method to add the new machine
$new_machine_id = $this->Machines_model->add_new_machine($data);
//$key   = $this->session->userdata('patients_search_key');

if ($new_machine_id) {

$is_notification = array(
    'is_notification'		=> TRUE,
    'notification_type'		=> 'success',
    'notification_description'      => 'A machine added successfully',
);

$this->session->set_flashdata($is_notification);

redirect('machines');

}



}else{
//else update values

    $machine_id = $this->input->post('machine_id');
    $machine_data = array(
        'machine_public_id' => $this->input->post('machine_public_id'),
        'machine_unit' => $this->input->post('machine_unit'),
        'machine_serial' => $this->input->post('machine_serial'),
        'machine_manufacturer' => $this->input->post('machine_manufacturer'),
        'machine_model' => $this->input->post('machine_model'),
        'machine_active' => $this->input->post('machine_active') ? 1 : 0,
        'machine_starting_date' => $this->input->post('machine_starting_date'),
        'machine_cautions' => $this->input->post('machine_cautions'),
        'machine_notes' => $this->input->post('machine_notes')
    );

    // Update the machine in the database
    $result = $this->Machines_model->update_machine($machine_id, $machine_data);

    if ($result) {

        $is_notification = array(
            'is_notification'		=> TRUE,
            'notification_type'		=> 'success',
            'notification_description'      => 'The machine updated successfully',
        );
        
        $this->session->set_flashdata($is_notification);
        
        redirect('machines/view/'.$machine_id);


    } else {
        // If update fails, show an error message
        $is_notification = array(
            'is_notification'		=> TRUE,
            'notification_type'		=> 'success',
            'notification_description'      => 'The machine updated successfully',
        );
        
        $this->session->set_flashdata($is_notification);


        



        redirect('machines/edit/'.$machine_id);

    }



} //end addnew/update selection function

    }//end-function



    public function edit($machine_id) {
    
        // Retrieve machine data based on $machine_id
        $machine_data = $this->Machines_model->get_machine_by_id($machine_id);
    
        // Pass the machine data to the view for editing
        $data['machine'] = $machine_data;
        $data['status'] = $machine_id;

        if($this->session->flashdata('is_notification')) {
            $data['is_notification']		= $this->session->flashdata('is_notification');
            $data['notification_type']		= $this->session->flashdata('notification_type');
            $data['notification_description']   = $this->session->flashdata('notification_description');
        }


        $this->load->view('templates/head');

       $this->load->view('machines/add_machines',$data);

             // var_dump($machine_id);


       $this->load->view('templates/footer');
    }



    public function view($ma_id){

        if($this->session->flashdata('is_notification')) {
            $data['is_notification']		= $this->session->flashdata('is_notification');
            $data['notification_type']		= $this->session->flashdata('notification_type');
            $data['notification_description']   = $this->session->flashdata('notification_description');
        }
        
        // Call the get_machine_by_id method to fetch the machine data
        $data['machine_data']  = $this->Machines_model->get_machine_by_id($ma_id);


        $this->load->view('templates/head');


      // var_dump($machine_data);

       $this->load->view('machines/single_view_machines',$data);
       $this->load->view('templates/footer');

        
    }//end-function
    
        public function enabledisable_machine() {            
                       
            // Assuming you're passing machine ID via POST
            $machine_id = $this->input->post('machine_id');
            $changestatusto = ($this->input->post('status')=='disable')? false : true;

            
            // Perform any necessary validation
            //var_dump($changestatusto);
            // Call the model to update the machine status
            $result = $this->Machines_model->enabledisable_machine($machine_id,$changestatusto);
           //var_dump($changestatusto );
            if ($result) {
                // Machine successfully disabled
                $response = array(
                    'status' => 'success',
                    'message' => 'Machine Status changed successfully!'
                );
            } else {
                // Failed to disable machine
                $response = array(
                    'status' => 'error',
                    'message' => 'Failed to change status of the machine. Please try again.'
                );
            }
            
            // Send response as JSON
            echo json_encode($response);

    }//end-function



    public function search() {

        //set search criteria
        $key = $this->input->post('list_key');
        $val = $this->input->post('txt_value');
       
        $this->session->set_userdata('machines_is_search',TRUE);
        $this->session->set_userdata('machines_search_key',$key);
        $this->session->set_userdata('machines_search_value',$val);

        redirect('machines');
    }//end-function

    public function clear_search() {
        $this->session->unset_userdata('machines_is_search');
        $this->session->unset_userdata('machines_search_key');
        $this->session->unset_userdata('machines_search_value');
        redirect('machines');
    }//end-function
    
}//end-class
