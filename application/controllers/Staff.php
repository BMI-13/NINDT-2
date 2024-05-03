<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
        $this->app->is_staff();
        $this->load->model('Staff_model');
    }//end-func

  

    // Add User
    public function add() {
        // Load necessary data and views
        $data['status'] = "Add";

        $this->load->view('staff/add_staff',$data);
    }

    // Edit User
    public function edit($user_id) {
    $this->load->model('Units_model');
    $data['active_units'] = $this->Units_model->get_active_units();
        // Load necessary data and views
        // You may load the user data from the database based on $user_id
        $data['user'] = array(); // Placeholder for user data
        $this->load->view('edit_user', $data);
    }

    public function change_password()
{
    $this->load->helper('form');
    $this->load->library('form_validation');



        $this->form_validation->set_rules('current_password', 'Current Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/head');
            $this->load->view('staff/change_password');
            $this->load->view('templates/footer');

        } else {
            $user_id = $this->session->userdata('user_id');
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');

            // Check if the current password matches the one in the database
            $current_password_db = $this->Staff_model->get_password($user_id);
            if (password_verify($current_password, $current_password_db)) {
                // Update the password
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $this->Staff_model->update_password($user_id, $hashed_password);
                echo "Password changed successfully.";
            } else {
                echo "Incorrect current password.";
            }
        }
    }


    // View User
    public function view($user_id) {

        $this->load->helper('form');

        //var_dump($user_id);

        $data['user']  = $this->Staff_model->get_user_by_id($user_id);

        $this->load->view('templates/head');
        $this->load->view('templates/footer');

        // Load necessary data and views
        // You may load the user data from the database based on $user_id
        $this->load->view('staff/single_view_staff', $data);
    }

    // View User
    public function index($page=0) {

        $this->load->view('templates/head');
        $this->load->view('templates/navbar');

        $data 		= $this->app->set_data();
        $data['page']   =  $page ;
        $criteria       = array();
         
            //searching
            if($this->session->userdata('staff_is_search')) {
                $key   = $this->session->userdata('staff_search_key');
                $value = $this->session->userdata('staff_search_value');

                if($key == 'ma_id') { 		
                    $key =  'staff_id';
                } 
                //var_dump($key);
                $criteria[$key] = $value;
            }


            $data['staff'] = $this->Staff_model->get_staff($criteria,$page);
            //echo $this->db->last_query();

            //pagination
            $total_rows = $this->Staff_model->get_total_staff($criteria) ;
            $this->app->set_pagination($total_rows,site_url('staff/index'));
            $data['pagination_html'] = $this->pagination->create_links();
            $data['total_rows'] = $total_rows;


            if($this->session->flashdata('is_notification')) {
                $data['is_notification']		= $this->session->flashdata('is_notification');
                $data['notification_type']		= $this->session->flashdata('notification_type');
                $data['notification_description']   = $this->session->flashdata('notification_description');
            }



       $this->load->view('staff',$data);
        //var_dump($data);
       $this->load->view('templates/footer');


    }

    // Delete User
    public function delete($user_id) {
        // Delete user from the database based on $user_id
        // Redirect to user list page or any other page as needed
    }

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
}