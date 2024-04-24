<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patients_model extends CI_Model{
		
    private $tbl = 'tbl10_patient';
        
    public function __construct(){
        parent::__construct();
    }//end of function

    public function get_patients($criteria='', $offset=''){
        $fields = array(
            'p_id_pk AS p_id', 'p_name','p_status',
            "IF(p_gender,'F','M') AS p_gender"
        );
        $this->db->select($fields);
        if ($criteria != '') { $this->db->where($criteria); }
        if ($offset != '') { $this->db->offset($offset); }
        $this->db->limit($this->config->item('rows_per_page'));
        return $this->db->get($this->tbl)->result_array();
    }//end-func
    
    
    
    public function get_total_patients($criteria = '') {
        if($criteria != '') { $this->db->where($criteria); }
        return $this->db->get($this->tbl)->num_rows();
    }//end-func
    
    

}//end-class

//end-file