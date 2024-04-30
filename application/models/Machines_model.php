<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Machines_model extends CI_Model{
		
    private $tbl = 'tbl15_machines';
        
    public function __construct(){
        parent::__construct();
    }//end of function

    public function get_machines($criteria='', $offset=''){
        $fields = array(
            'machine_id', 'machine_serial','machine_barcode','machine_unit', 'machine_manufacturer', 'machine_model',  'machine_active', 'machine_starting_date', 'machine_cautions', 'machine_notes'
        );
        $this->db->select($fields);
        if ($criteria != '') { $this->db->where($criteria); }
        if ($offset != '') { $this->db->offset($offset); }
        $this->db->limit($this->config->item('rows_per_page'));
        return $this->db->get($this->tbl)->result_array();
    }//end-func
    
    public function get_total_machines($criteria = '') {
        if($criteria != '') { $this->db->where($criteria); }
        return $this->db->get($this->tbl)->num_rows();
    }//end-func
    
    


}//end-class

//end-file