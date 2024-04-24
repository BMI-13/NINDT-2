<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        $data = $this->app->set_data();
        
        //set notification if any
        if($this->session->flashdata('is_notification')) {
            $data['is_notification']		= $this->session->flashdata('is_notification');
            $data['notification_type']		= $this->session->flashdata('notification_type');
            $data['notification_description']   = $this->session->flashdata('notification_description');
        }
        
        $this->load->view('home',$data);
    }//end-func
    
    
    public function signin() {
        //var_dump($_POST);
        
        $user_name  = trim($this->input->post('txt_user_name'));
        $user_psw   = trim($this->input->post('txt_user_psw'));
        
        $this->load->model('Users_model');
        $user     = $this->Users_model->get_user_auth($user_name);
        //var_dump($user);
        
        if($user && password_verify($user_psw,$user['user_psw']) ) { //valid user
        
            //update user login time & Log
            $last_login = get_cur_date_time();
            
            //set session
            $this->session->set_userdata('is_signin',TRUE);
            $this->session->set_userdata('user_id',$user['user_id']);
            $this->session->set_userdata('user_role',$user['user_role']);
            
            $this->db->trans_start();
                //update user
                $data_set = array('last_login' => $last_login);
                $this->Users_model->update_user($user['user_id'],$data_set);

                //add log entry
                $this->Log_model->write_log('signed-in');
            $this->db->trans_complete();
            $trans_status = $this->db->trans_status();
            
            if($trans_status) {
                //redirect on the user role
                if ($user['user_role'] === 'staff') {
                   redirect("patients");
                } elseif ($user['user_role'] === 'admin') {
                    redirect('admin');
                } else {
                    redirect('home');
                }
            } else {
                $is_notification = array(
                    'is_notification'		=> TRUE,
                    'notification_type'		=> 'danger',
                    'notification_description'      => 'Error in signing-in. Try again.',
                );

                $this->session->set_flashdata($is_notification);
                redirect('home');
            }
            
        } else { //invalid user
            $is_notification = array(
                'is_notification'		=> TRUE,
                'notification_type'		=> 'danger',
                'notification_description'      => 'Invalid user name or password.',
            );
            
            $this->session->set_flashdata($is_notification);
            redirect('home');
        }
        
    }//end-func
    
    public function signout() {
        //add log entry
        $this->Log_model->write_log('signed-out');
        
        $this->session->sess_destroy();
        redirect('home');
    }//end-func
    
}//end-class
