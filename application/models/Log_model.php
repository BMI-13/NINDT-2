<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_model extends CI_Model{
		
    private $tbl = 'tbl06_log';
        
    public function __construct(){
        parent::__construct();
    }//end of function

    public function write_log($desc) {
        
        $data_set = array(
            'user_id_fk'        => $this->session->userdata('user_id'),
            'log_stamp'         => get_cur_date_time(),
            'log_desc'          => $desc
        );
        
        $this->db->insert($this->tbl,$data_set);
        return $this->db->insert_id(); 
        
    }//end-func
    
}//end-class

//end-file