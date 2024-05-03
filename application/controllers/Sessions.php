<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sessions extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
       // $this->output->enable_profiler(TRUE);
        $this->app->is_staff();
        $this->load->model('Sessions_model');
        date_default_timezone_set('Asia/Colombo');

    }//end-function

    public function index($page=0) {
        $this->load->view('templates/head');
        $this->load->view('templates/navbar');

        $data 		= $this->app->set_data();
        $data['page']   = $page;
        $criteria       = array();
         
            //searching
            if($this->session->userdata('prescription_is_search')) {
                $key   = $this->session->userdata('sessions_search_key');
                $value = $this->session->userdata('sessions_search_value');

                if($key == 'ma_id') { 		
                    $key =  'prescription_public_id';
                } 
                //var_dump($key);
                $criteria[$key] = $value;
            }


            $data['sessions'] = $this->Sessions_model->get_sessions($criteria,$page);
            //echo $this->db->last_query();

            //pagination
            $total_rows = $this->Sessions_model->get_total_sessions($criteria) ;
            $this->app->set_pagination($total_rows,site_url('sessions/index'));
            $data['pagination_html'] = $this->pagination->create_links();
            $data['total_rows'] = $total_rows;


            if($this->session->flashdata('is_notification')) {
                $data['is_notification']		= $this->session->flashdata('is_notification');
                $data['notification_type']		= $this->session->flashdata('notification_type');
                $data['notification_description']   = $this->session->flashdata('notification_description');
            }



       $this->load->view('sessions',$data);
        //var_dump($data);
       $this->load->view('templates/footer');
    }//end-function
    
    
    public function step_01() {
        if ($_POST) {

            $this->load->model('Patients_model');


            $ptdata = $this->Patients_model->get_patient($this->input->post('p_id_pk'));
            //var_dump($ptdata);

            $dtage = date_diff(date_create(), date_create($ptdata['p_birthDate']));

            $data = array(
                'hds_patientid' => $ptdata['p_nindt_id'],
                'hds_age' =>  $dtage->format(" %Y "),
                //'hds_type' => $this->input->post('prescription_manufacturer'),
                'hds_startdt' => date('m/d/Y h:i:s a', time()),
                'hds_ward_startdt' => $ptdata['p_unit'] ,
                //'prescription_cautions' => $this->input->post('prescription_cautions'),
            );

            var_dump($data);

            $this->Sessions_model-->start_session($data);


//`hds_id_pk`, ``, ``, ``, ``, ``, ``, ``, `hds_bednumber`, `hds_useridstart`, `hds_machine_id`, `hds_prehdweight`, `hds_prehdbp`, `hds_heparinloading`,

          //  $this->db->insert($this->tbl, $data);


            //array(8) { ["p_id_pk"]=> string(1) "1" [""]=> string(8) "UN1-0001" ["p_old_nindt_id"]=> string(4) "A-25" ["p_unit"]=> string(8) "Unit 001" ["p_name"]=> string(7) "ABC DEF" ["p_gender"]=> string(1) "0" ["p_assignedcategory"]=> string(1) "0" ["p_nic"]=> string(10) "154545789v" }





    }}
    public function new() {
        if ($_POST) {

            $this->load->model('Patients_model');

            // Get the values to match against columns
            $value1 =  $this->input->post('search');
            $data['search'] =  $this->input->post('search');
    
            // Call the model method to filter data
            $data['filtered_data'] = $this->Patients_model->filter_data_sessions($value1);

           // var_dump($value1);
            $this->load->view('templates/head');

            $this->load->view('sessions/session_step_0',$data);
            $this->load->view('templates/footer');


        }else{
        $this->load->view('templates/head');
       
        if($this->session->flashdata('is_notification')) {
            $data['is_notification']		= $this->session->flashdata('is_notification');
            $data['notification_type']		= $this->session->flashdata('notification_type');
            $data['notification_description']   = $this->session->flashdata('notification_description');
        }
        $data['search'] =  "";

       $this->load->view('sessions/session_step_0',$data); 
       $this->load->view('templates/footer');
    }
    
    }//end-function

    public function submitform(){

       // var_dump($_POST); // Dump POST data

if($this->input->post('prescription_id')=='Add'){   
        
// Data from the submitted form
$data = array(
    'prescription_public_id' => $this->input->post('prescription_public_id'),
    'prescription_unit' => $this->input->post('prescription_unit'),
    'prescription_serial' => $this->input->post('prescription_serial'),
    'prescription_manufacturer' => $this->input->post('prescription_manufacturer'),
    'prescription_model' => $this->input->post('prescription_model'),
    'prescription_active' => $this->input->post('prescription_active') ? 1 : 0,
    'prescription_starting_date' => $this->input->post('prescription_starting_date'),
    'prescription_cautions' => $this->input->post('prescription_cautions'),
    'prescription_notes' => $this->input->post('prescription_notes')
);

// Call the add_new_prescription method to add the new prescription
$new_prescription_id = $this->Sessions_model->add_new_prescription($data);
//$key   = $this->session->userdata('patients_search_key');

if ($new_prescription_id) {

$is_notification = array(
    'is_notification'		=> TRUE,
    'notification_type'		=> 'success',
    'notification_description'      => 'A prescription added successfully',
);

$this->session->set_flashdata($is_notification);

redirect('sessions');

}



}else{
//else update values

    $prescription_id = $this->input->post('prescription_id');
    $prescription_data = array(
        'prescription_public_id' => $this->input->post('prescription_public_id'),
        'prescription_unit' => $this->input->post('prescription_unit'),
        'prescription_serial' => $this->input->post('prescription_serial'),
        'prescription_manufacturer' => $this->input->post('prescription_manufacturer'),
        'prescription_model' => $this->input->post('prescription_model'),
        'prescription_active' => $this->input->post('prescription_active') ? 1 : 0,
        'prescription_starting_date' => $this->input->post('prescription_starting_date'),
        'prescription_cautions' => $this->input->post('prescription_cautions'),
        'prescription_notes' => $this->input->post('prescription_notes')
    );

    // Update the prescription in the database
    $result = $this->Sessions_model->update_prescription($prescription_id, $prescription_data);

    if ($result) {

        $is_notification = array(
            'is_notification'		=> TRUE,
            'notification_type'		=> 'success',
            'notification_description'      => 'The prescription updated successfully',
        );
        
        $this->session->set_flashdata($is_notification);
        
        redirect('sessions/view/'.$prescription_id);


    } else {
        // If update fails, show an error message
        $is_notification = array(
            'is_notification'		=> TRUE,
            'notification_type'		=> 'success',
            'notification_description'      => 'The prescription updated successfully',
        );
        
        $this->session->set_flashdata($is_notification);


        



        redirect('sessions/edit/'.$prescription_id);

    }



} //end addnew/update selection function

    }//end-function



    public function edit($prescription_id) {
    
        // Retrieve prescription data based on $prescription_id
        $prescription_data = $this->Sessions_model->get_prescription_by_id($prescription_id);
    
        // Pass the prescription data to the view for editing
        $data['prescription'] = $prescription_data;
        $data['status'] = $prescription_id;

        if($this->session->flashdata('is_notification')) {
            $data['is_notification']		= $this->session->flashdata('is_notification');
            $data['notification_type']		= $this->session->flashdata('notification_type');
            $data['notification_description']   = $this->session->flashdata('notification_description');
        }


        $this->load->view('templates/head');

       $this->load->view('sessions/add_sessions',$data);

             // var_dump($prescription_id);


       $this->load->view('templates/footer');
    }



    public function view($ma_id){

        if($this->session->flashdata('is_notification')) {
            $data['is_notification']		= $this->session->flashdata('is_notification');
            $data['notification_type']		= $this->session->flashdata('notification_type');
            $data['notification_description']   = $this->session->flashdata('notification_description');
        }
        
        // Call the get_prescription_by_id method to fetch the prescription data
        $data['prescription_data']  = $this->Sessions_model->get_prescription_by_id($ma_id);


        $this->load->view('templates/head');


      // var_dump($prescription_data);

       $this->load->view('sessions/single_view_sessions',$data);
       $this->load->view('templates/footer');

        
    }//end-function
    
        public function enabledisable_prescription() {            
                       
            // Assuming you're passing prescription ID via POST
            $prescription_id = $this->input->post('prescription_id');
            $changestatusto = ($this->input->post('status')=='disable')? false : true;

            
            // Perform any necessary validation
            //var_dump($changestatusto);
            // Call the model to update the prescription status
            $result = $this->Sessions_model->enabledisable_prescription($prescription_id,$changestatusto);
           //var_dump($changestatusto );
            if ($result) {
                // Prescription successfully disabled
                $response = array(
                    'status' => 'success',
                    'message' => 'Prescription Status changed successfully!'
                );
            } else {
                // Failed to disable prescription
                $response = array(
                    'status' => 'error',
                    'message' => 'Failed to change status of the prescription. Please try again.'
                );
            }
            
            // Send response as JSON
            echo json_encode($response);

    }//end-function



    public function search() {

        //set search criteria
        $key = $this->input->post('list_key');
        $val = $this->input->post('txt_value');
       
        $this->session->set_userdata('sessions_is_search',TRUE);
        $this->session->set_userdata('sessions_search_key',$key);
        $this->session->set_userdata('sessions_search_value',$val);

        redirect('sessions');
    }//end-function

    public function clear_search() {
        $this->session->unset_userdata('sessions_is_search');
        $this->session->unset_userdata('sessions_search_key');
        $this->session->unset_userdata('sessions_search_value');
        redirect('sessions');
    }//end-function
    
}//end-class
