<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model{
		
    private $tbl = 'tbl05_user';
        
    public function __construct(){
        parent::__construct();
    }//end-func

    public function get_user_auth($user_name){
        $fields   = array('user_id_pk AS user_id', 'user_psw', 'user_role');
        $criteria = array('user_email' => $user_name, 'user_status' => TRUE);
        $this->db->select($fields);
        $this->db->where($criteria);
        return $this->db->get($this->tbl)->row_array();
    }//end-func
    
    public function update_user($user_id, $data_set){
        $criteria = array('user_id_pk' => $user_id);
        return $this->db->update($this->tbl,$data_set, $criteria);
    }//end-func
    
    public function get_users($criteria='', $offset=''){
        $fields = array();
        if ($criteria != '') { $this->db->where($criteria); }
        if ($offset != '') { $this->db->offset($offset); }
        $this->db->limit($this->config->item('rows_per_page'));
        return $this->db->get($this->tbl)->result_array();
    }//end-func
    
    public function add_user($data_set) {
        $this->db->insert($this->tbl,$data_set);
        return $this->db->insert_id(); 
    }//end-func
    
    public function get_total_users($criteria = '') {
        if($criteria != '') { $this->db->where($criteria); }
        return $this->db->get($this->tbl)->num_rows();
    }//end-func
    
    

}//end of class

//end of file