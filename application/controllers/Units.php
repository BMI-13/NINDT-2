<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Units extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Units_model');
    }

    // Function to display all units

    public function index($page=0) {
        $this->load->view('templates/head');
        $this->load->view('templates/navbar');

        $data 		= $this->app->set_data();
        $data['page']   = $page;
        $criteria       = array();
         
            //searching
            if($this->session->userdata('units_is_search')) {
                $key   = $this->session->userdata('units_search_key');
                $value = $this->session->userdata('units_search_value');

                if($key == 'un_name') { 		
                    $key =  'unit_name';
                } if($key == 'un_hospital') { 		
                    $key =  'unit_hospital';
                } 
                //var_dump($key);
                $criteria[$key] = $value;
            }


            $data['units'] = $this->Units_model->get_units($criteria,$page);
            //echo $this->db->last_query();

            //pagination
            $total_rows = $this->Units_model->get_total_units($criteria) ;
            $this->app->set_pagination($total_rows,site_url('units/index'));
            $data['pagination_html'] = $this->pagination->create_links();
            $data['total_rows'] = $total_rows;


            if($this->session->flashdata('is_notification')!= null) {
                $data['is_notification']		= $this->session->flashdata('is_notification');
                $data['notification_type']		= $this->session->flashdata('notification_type');
                $data['notification_description']   = $this->session->flashdata('notification_description');
            }



       $this->load->view('units/units',$data);
        //var_dump($data);
       $this->load->view('templates/footer');
    }//end-function
    
    // Function to add a new unit
    public function add() {
        // Handle form submission
        if ($_POST &&  $this->input->post('unit_id') == "add") {
            $unit_data = array(
                'unit_name' => $this->input->post('unit_name'),
                'u_public_name' => $this->input->post('u_public_name'),
                'unit_hospital' => $this->input->post('unit_hospital')
            );
            $this->Units_model->add_unit($unit_data);
            redirect('units');
        } else {
            $data['status'] = "add";
            $this->load->view('units/add_unit',$data);
        }
    }

    // Function to edit a unit
    public function edit($unit_id) {
  
        // Handle form submission
        if ($_POST) {
            var_dump($_POST);
            $unit_data = array(
                'unit_name' => $this->input->post('unit_name'),
                'u_public_name' => $this->input->post('u_public_name'),
                'unit_hospital' => $this->input->post('unit_hospital')
            );
            $this->Units_model->update_unit($unit_id, $unit_data);
            redirect('unit4');
        } else {
            $data['unit'] = $this->Units_model->get_punit_from_pkid($unit_id);
            $data['status'] = $unit_id;
      $this->load->view('templates/head');
        $this->load->view('templates/navbar');
            $this->load->view('units/add_unit', $data);
            $this->load->view('templates/footer');

        }


    }

    // Function to delete a unit
    public function delete($unit_id) {
        $this->Units_model->delete_unit($unit_id);
        redirect('units');
    }

    //search unit
    public function search() {

        //set search criteria
        $key = $this->input->post('list_key');
        $val = $this->input->post('txt_value');
       
        $this->session->set_userdata('units_is_search',TRUE);
        $this->session->set_userdata('units_search_key',$key);
        $this->session->set_userdata('units_search_value',$val);

        redirect('units');
    }//end-function


    public function enabledisable_unit() {

                   

            
        // Assuming you're passing unit ID via POST
        $unit_id = $this->input->post('unit_id');
        $changestatusto = ($this->input->post('status')=='disable')? false : true;

        
        // Perform any necessary validation
        //var_dump($changestatusto);
        // Call the model to update the unit status
        $result = $this->Units_model->enabledisable_unit($unit_id,$changestatusto);
       //var_dump($changestatusto );
        if ($result) {
            // Unit successfully disabled
            $response = array(
                'status' => 'success',
                'message' => 'Unit Status changed successfully!'
            );
        } else {
            // Failed to disable unit
            $response = array(
                'status' => 'error',
                'message' => 'Failed to change status of the unit. Please try again.'
            );
        }
        
        // Send response as JSON
        echo json_encode($response);

        

    }//end-function


}
?>
