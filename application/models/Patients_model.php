<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patients_model extends CI_Model{
		
    private $tbl = 'tbl10_patient';
        
    public function __construct(){
        parent::__construct();
    }//end of function


    public function filter_data_sessions($value1)
    {
        //var_dump($value1);
        // Query to filter data where column1 matches $value1 or column2 matches $value2
        $this->db->select('*');
        $this->db->from($this->tbl );
        $this->db->group_start(); // Start a group for OR conditions
        $this->db->where('p_nindt_id', $value1);
        $this->db->or_where('p_old_nindt_id', $value1);
        $this->db->group_end(); // End the group for OR conditions
        $query = $this->db->get();

        // Get the filtered data
        $result = $query->row();

        // Return the filtered data
        return $result;
    }




    public function get_patients($criteria='', $offset=''){
        $fields = array(
            'p_id_pk AS p_id', 'p_name','p_status',

            'p_nindt_id', 'p_old_nindt_id',  'p_nic',  'p_tpnumber', 'p_email', 'p_birthDate', 'p_address', 'p_assignedcategory',

            "IF(p_gender,'F','M') AS p_gender"
        );
        var_dump($criteria);
        $this->db->select($fields);
        if ($criteria != '') { $this->db->where($criteria); }
        if ($offset != '') { $this->db->offset($offset); }
        $this->db->limit($this->config->item('rows_per_page'));
        return $this->db->get($this->tbl)->result_array();
    }//end-func
    
         // Function to single patient data
         public function get_patient_by_id($p_id_pk) {
     
            // Fetch the row from the 'machines' table where machine_id matches
            $query = $this->db->get_where($this->tbl , array('p_id_pk' => $p_id_pk));
            
            // Return the single row as an object
            return $query->row();
        }//end-function
    
    public function get_total_patients($criteria = '') {
        if($criteria != '') { $this->db->where($criteria); }
        return $this->db->get($this->tbl)->num_rows();
    }//end-func
    
    


    // Function to add a new patient
    public function add_patient($data) {
        $this->db->insert($this->tbl, $data);
    }

    // Function to fetch a patient by ID
    public function get_patient($p_id_pk) {
        return $this->db->get_where($this->tbl, array('p_id_pk' => $p_id_pk))->row_array();
    }

 public function get_patient_from_public_id($p_nindt_id) {
        return $this->db->get_where($this->tbl, array('p_nindt_id' => $p_nindt_id))->row_array();
    }

    // Function to update a patient
    public function update_patient($p_id_pk, $data) {
        $this->db->where('p_id_pk', $p_id_pk);
        $this->db->update($this->tbl, $data);
    }




}//end-class

//end-file