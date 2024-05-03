<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Machines_model extends CI_Model{
		
    private $tbl = 'tbl15_machines';
        
    public function __construct(){
        parent::__construct();
    }//end of function

 // Function to get all machine data with pagination
    public function get_machines($criteria='', $offset=''){

        var_dump($criteria);
        $fields = array(
            'machine_id_pk','machine_public_id', 'machine_serial','machine_unit', 'machine_manufacturer', 'machine_model',  'machine_active'
        );
        $this->db->select($fields);
        if ($criteria != '') { $this->db->where($criteria); }
        if ($offset != '') { $this->db->offset($offset); }
        $this->db->limit($this->config->item('rows_per_page'));
        return $this->db->get($this->tbl)->result_array();
    }//end-function
    
     // Function to total machine number
    public function get_total_machines($criteria = '') {
        if($criteria != '') { $this->db->where($criteria); }
        return $this->db->get($this->tbl)->num_rows();
    }//end-function
    
     // Function to single machine data
     public function get_machine_by_id($machine_id) {
     
        // Fetch the row from the 'machines' table where machine_id matches
        $query = $this->db->get_where($this->tbl , array('machine_id_pk' => $machine_id));
        
        // Return the single row as an object
        return $query->row();
    }//end-function

        // Function to add a new machine
        public function add_new_machine($data) {
            $this->load->database();
            // Insert the data into the 'machines' table
            $this->db->insert($this->tbl , $data);
            // Return the ID of the inserted row
            return $this->db->insert_id();
    }//end-function


 // Function to change machine status
    public function enabledisable_machine($machine_id, $changestatusto) {
           // var_dump($machine_id );

            // Update the machine status to disabled in the database
            $this->db->where('machine_id_pk', $machine_id);
            $this->db->update($this->tbl, array('machine_active' => $changestatusto));
            
            // Check if the update was successful
            return $this->db->affected_rows() > 0;
    }//end-function


 // Function to update machine data
 public function update_machine($machine_id, $data) {
    $this->db->where('machine_id_pk', $machine_id);
    $this->db->update($this->tbl, $data);
    
    // Check if the update was successful
    return $this->db->affected_rows() > 0;
    }//end-function



}//end-class
