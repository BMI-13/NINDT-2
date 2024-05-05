<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sessions extends CI_Controller {
    
public $hds_types=array(0=>"Haemodialysis",1=>"Peritoneal Dialysis",null=>'-');
public $hds_status=array( 0=>"Pre HD",1=>"On Dialysis",2=>"Stopped Dialysis",3=>"Post Dialysis", null=>'-');


    public function __construct() {
        parent::__construct();
       // $this->output->enable_profiler(TRUE);
        $this->app->is_staff();
        $this->load->model('Sessions_model');
        date_default_timezone_set('Asia/Colombo');



    }//end-function

    public function current($page=0) {

        $this->load->view('templates/head');
        $this->load->view('templates/navbar');
        $data 		= $this->app->set_data();
        $data['page']   = $page;
        $criteria       = array();
        $data['sessions'] = $this->Sessions_model->get_current_sessions($page);
        $data['hds_types'] = $this->hds_types;
        $data['hds_status'] = $this->hds_status;

        $total_rows = $this->Sessions_model->get_total_current_sessions() ;
        //var_dump($total_rows);

        $this->app->set_pagination($total_rows,site_url('sessions/current'));
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

        public function index($page=0) {
            $this->load->view('templates/head');
        $this->load->view('templates/navbar');

        $data 		= $this->app->set_data();
        $data['page']   = $page;
        $criteria       = array();
         
            //searching
            if($this->session->userdata('session_is_search')) {
                $key   = $this->session->userdata('sessions_search_key');
                $value = $this->session->userdata('sessions_search_value');

                if($key == 'ma_id') { 		
                    $key =  'session_public_id';
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
       
            $data['hds_types'] = $this->hds_types;
            $data['hds_status'] = $this->hds_status;



       $this->load->view('sessions',$data);
        //var_dump($data);
       $this->load->view('templates/footer');
    }//end-function
    
    public function new() {
        if ($_POST) {

            $this->load->model('Patients_model');

            // Get the values to match against columns
            $value1 =  $this->input->post('search');
            $data['search'] =  $this->input->post('search');
    
            // Call the model method to filter data
            $data['filtered_data'] = $this->Patients_model->filter_data_sessions($value1);
            $data['hds_types'] = $this->hds_types;
            $data['hds_status'] = $this->hds_status;
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

    public function step_01() {
        if ($_POST) {

            $this->load->model('Patients_model');


            $ptdata = $this->Patients_model->get_patient($this->input->post('p_id_pk'));
            //var_dump($ptdata);

            $dtage = date_diff(date_create(), date_create($ptdata['p_birthDate']));

            $nextid = $this->Sessions_model->get_next_sessionid($ptdata['p_unit']);


            $user_id = $this->session->userdata('user_id');



            $data = array(
                'hds_patientid' => $ptdata['p_nindt_id'],
                'hds_type' => $this->input->post('hds_type'),
                'hds_status'=>01,
                'hds_id_public' => $nextid,
                'hds_created_user_id_pk' => $user_id,
                'hds_age' =>  $dtage->format(" %Y "),
                'hds_createddt' => date('Y-m-d H:i:s', time()),
                'hds_unit_public_id' => $ptdata['p_unit'] ,
            );


          $saved  = $this->Sessions_model->add_new_session($data);

           
           // var_dump($user_id);

           redirect('sessions/start/'.$nextid);


          
          




    }}


    public function start($session_public_id) {

        if ($_POST) {

            $data = $this->Sessions_model->get_session_details($session_public_id);


            if($this->input->post('save_additional')=="save_additional"  &&  $data->hds_type==null){

            $data = array(
                'hds_type' => $this->input->post('hds_type'),
            );
            $result = $this->Sessions_model->update_session($this->input->post('hds_id_public'), $data);





            }

            if($this->input->post('save_to_start')=="save_to_start"  &&  $data->hds_startdt==null){

                $this->input->post('save_to_start','') ;


                $data = array(
                    'hds_bednumber' => $this->input->post('hds_bednumber'),
                    'hds_machine_id' => $this->input->post('hds_machine_id'),
                    'hds_prehdweight' => $this->input->post('hds_prehdweight'),
                    'hds_prehdbp' => $this->input->post('hds_prehdbp'),
                    'hds_heparinloading' => $this->input->post('hds_heparinloading'),
                    'hds_started_user_id_pk' =>    $this->session->userdata('user_id'),
                    'hds_startdt' => date('Y-m-d H:i:s', time()),
                    'hds_status'=>02,


                );

                $result = $this->Sessions_model->update_session($this->input->post('hds_id_public'), $data);

                if($result)            redirect('sessions/processing/'.$session_public_id);


            }
            

        
        }
        $this->load->model('Patients_model');
        $this->load->model('Units_model');
        $this->load->model('Machines_model');


        $data['session'] = $this->Sessions_model->get_session_details($session_public_id);
        $data['patient'] = $this->Patients_model->get_patient_from_public_id($data['session']->hds_patientid);
        $data['unit'] = $this->Units_model->get_punit_from_public_id($data['session']->hds_unit_public_id);
        $data['hds_types'] = $this->hds_types;
        $data['hds_status'] = $this->hds_status;
        $data['machines'] = $this->Machines_model->get_active_machines();

        //var_dump($data['machines'] );
        $this->load->view('templates/head');

        $this->load->view('sessions/session_step_1',$data);
        $this->load->view('templates/footer');
    }


    public function processing($session_public_id) {


        $this->load->model('Patients_model');
        $this->load->model('Units_model');
        $this->load->model('Machines_model');


        $data['session'] = $this->Sessions_model->get_session_details($session_public_id);
        $data['patient'] = $this->Patients_model->get_patient_from_public_id($data['session']->hds_patientid);
        $data['unit'] = $this->Units_model->get_punit_from_public_id($data['session']->hds_unit_public_id);
        $data['hds_types'] = $this->hds_types;
        $data['hds_status'] = $this->hds_status;
        $data['machines'] = $this->Machines_model->get_active_machines();

        //var_dump($data['machines'] );
        $this->load->view('templates/head');

        $this->load->view('sessions/session_step_1',$data);
        $this->load->view('templates/footer');

        
    }
    public function stop($session_public_id) {


        $sessuion = $this->Sessions_model->get_session_details($session_public_id);

        
        if($sessuion->hds_status == 2 ){

             $data = array(
                'hds_stop_user_id_pk' =>    $this->session->userdata('user_id'),
                'hds_stopdt' => date('Y-m-d H:i:s', time()),
                'hds_status'=>3
            );

    //        var_dump($data);

    $result = $this->Sessions_model->update_session2($session_public_id,$data); 
   // var_dump($result);

    }
    
    $this->load->model('Patients_model');
        $this->load->model('Units_model');
        $this->load->model('Machines_model');

        $data['session'] = $this->Sessions_model->get_session_details($session_public_id);//var_dump($data['session']);
        $data['patient'] = $this->Patients_model->get_patient_from_public_id($data['session']->hds_patientid);
        $data['unit'] = $this->Units_model->get_punit_from_public_id($data['session']->hds_unit_public_id);
        $data['hds_types'] = $this->hds_types;
        $data['hds_status'] = $this->hds_status;
        $data['machines'] = $this->Machines_model->get_machine_by_id($data['session']->hds_machine_id);
        $this->load->view('templates/head');
        $this->load->view('sessions/session_step_2',$data);
        $this->load->view('templates/footer');
    } 
    
    public function end($session_public_id) {               

        if ($_POST) {
            if($this->input->post('save_to_end')=="save_to_end"  ){
                
        $sessuion = $this->Sessions_model->get_session_details($session_public_id);
      var_dump($_POST);

        if($sessuion->hds_status == 3 ){

             $data = array(
                'hds_end_user_id_pk' =>    $this->session->userdata('user_id'),
                'hds_enddt' => date('Y-m-d H:i:s', time()),
                'hds_status'=>4,
                'hds_bloodflowrate'=>$this->input->post('hds_bloodflowrate'),
                'hds_uf'=>$this->input->post('hds_uf'),
                'hds_heparinmaintenance'=>$this->input->post('hds_heparinmaintenance'),
                'hds_posthdweight'=>$this->input->post('hds_posthdweight'),
                'hds_posthdbp'=>$this->input->post('hds_posthdbp'),
                'hds_erythropoietindose'=>$this->input->post('hds_erythropoietindose'),
                'hds_remarks'=>$this->input->post('hds_remarks'),
            );
    //        var_dump($data);

    $result = $this->Sessions_model->update_session2($session_public_id,$data); 
   //var_dump($result);
   if($result)            redirect('sessions/completed/'.$session_public_id);
   ;

    }
}}}


public function completed($session_public_id) {     
    
    //get_session_details

        $this->load->model('Patients_model');
        $this->load->model('Units_model');
        $this->load->model('Machines_model');

        $data['session'] = $this->Sessions_model->get_session_details($session_public_id);//var_dump($data['session']);
        $data['patient'] = $this->Patients_model->get_patient_from_public_id($data['session']->hds_patientid);
        $data['unit'] = $this->Units_model->get_punit_from_public_id($data['session']->hds_unit_public_id);
        $data['hds_types'] = $this->hds_types;
        $data['hds_status'] = $this->hds_status;
        $data['machines'] = $this->Machines_model->get_machine_by_id($data['session']->hds_machine_id);
        $this->load->view('templates/head');
        $this->load->view('sessions/session_stoped',$data);
        $this->load->view('templates/footer');
    



}
    
    






     


    public function view($ma_id){

        if($this->session->flashdata('is_notification')) {
            $data['is_notification']		= $this->session->flashdata('is_notification');
            $data['notification_type']		= $this->session->flashdata('notification_type');
            $data['notification_description']   = $this->session->flashdata('notification_description');
        }
        
        // Call the get_session_by_id method to fetch the session data
        $data['session_data']  = $this->Sessions_model->get_session_by_id($ma_id);


        $this->load->view('templates/head');


      // var_dump($session_data);

       $this->load->view('sessions/single_view_sessions',$data);
       $this->load->view('templates/footer');

        
    }//end-function
    
        public function enabledisable_session() {            
                       
            // Assuming you're passing session ID via POST
            $session_id = $this->input->post('session_id');
            $changestatusto = ($this->input->post('status')=='disable')? false : true;

            
            // Perform any necessary validation
            //var_dump($changestatusto);
            // Call the model to update the session status
            $result = $this->Sessions_model->enabledisable_session($session_id,$changestatusto);
           //var_dump($changestatusto );
            if ($result) {
                // session successfully disabled
                $response = array(
                    'status' => 'success',
                    'message' => 'session Status changed successfully!'
                );
            } else {
                // Failed to disable session
                $response = array(
                    'status' => 'error',
                    'message' => 'Failed to change status of the session. Please try again.'
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
