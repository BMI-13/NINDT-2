<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sessions_model extends CI_Model{
		
    private $tbl = 'tbl20_hemodialysis_sessions';
        
    public function __construct(){
        parent::__construct();
    }//end of function

    

 // Function to get all prescription data with pagination
    public function get_sessions($criteria='', $offset=''){

        var_dump($criteria);
        $fields = array(
            'hds_id_pk', 'hds_id_public', 'hds_patientid', 'hds_age', 'hds_type', 'hds_routine_startdt', 'hds_ward_startdt', 'hds_emergency_startdt', 'hds_bednumber', 'hds_useridstart', 'hds_machine_id', 'hds_prehdweight', 'hds_prehdbp', 'hds_heparinloading', 'hds_heparinmaintenance', 'hds_enddt', 'hds_posthdweight', 'hds_posthdbp', 'hds_bloodflowrate', 'hds_uf', 'hds_erythropoietindose', 'hds_useridend', 'hds_remarks'
        );
        $this->db->select($fields);
        if ($criteria != '') { $this->db->where($criteria); }
        if ($offset != '') { $this->db->offset($offset); }
        $this->db->limit($this->config->item('rows_per_page'));
        return $this->db->get($this->tbl)->result_array();
    }//end-function
    
     // Function to total prescription number
    public function get_total_sessions($criteria = '') {
        if($criteria != '') { $this->db->where($criteria); }
        return $this->db->get($this->tbl)->num_rows();
    }//end-function
    
     // Function to single prescription data
     public function get_prescription_by_id($prescription_id) {
     
        // Fetch the row from the 'sessions' table where prescription_id matches
        $query = $this->db->get_where($this->tbl , array('hds_id_pk' => $prescription_id));
        
        // Return the single row as an object
        return $query->row();
    }//end-function

        // Function to add a new prescription
        public function add_new_prescription($data) {
            $this->load->database();
            // Insert the data into the 'sessions' table
            $this->db->insert($this->tbl , $data);
            // Return the ID of the inserted row
            return $this->db->insert_id();
    }//end-function


 // Function to change prescription status
    public function enabledisable_prescription($prescription_id, $changestatusto) {
           // var_dump($prescription_id );

            // Update the prescription status to disabled in the database
            $this->db->where('hds_id_pk', $prescription_id);
            $this->db->update($this->tbl, array('prescription_active' => $changestatusto));
            
            // Check if the update was successful
            return $this->db->affected_rows() > 0;
    }//end-function


 // Function to update prescription data
 public function update_prescription($prescription_id, $data) {
    $this->db->where('hds_id_pk', $prescription_id);
    $this->db->update($this->tbl, $data);
    
    // Check if the update was successful
    return $this->db->affected_rows() > 0;
    }//end-function



}//end-class
