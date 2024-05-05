<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sessions_model extends CI_Model{
		
    private $tbl = 'tbl20_hemodialysis_sessions';
        
    public function __construct(){
        parent::__construct();
    }//end of function

    

    public function get_next_sessionid($unit){

        $date = date("Ymd");
        $serachtext = $date  .'-'.$unit;
        //var_dump($serachtext);


        $query = $this->db->query("SELECT *  FROM {$this->tbl} WHERE hds_id_public LIKE '%{$serachtext}%' ORDER BY hds_id_pk  DESC LIMIT 1");
        $nextlastid =1;

if ($query->num_rows() == 1) {
    $row = $query->row();

    $query_public_id =  $row->hds_id_public;

    $currentlastid = substr($query_public_id, -5);

    $nextlastid = $currentlastid+1;

    //return $serachtext.'-00001';

    var_dump( $nextlastid);

}

return $serachtext.'-'.str_pad($nextlastid, 5, '0', STR_PAD_LEFT);

    }

        // Function to add a new session
        public function add_new_session($data) {

            // Insert the data into the 'sessions' table
            $this->db->insert($this->tbl , $data);
            // Return the ID of the inserted row
            return $this->db->insert_id();
    }//end-function


    // Function to get all dialysis sessions data with pagination

    public function get_current_sessions( $offset=''){

        $this->db->select();
        $this->db->from($this->tbl );
        

        $criteria[] = 'hds_status != 0';
        $criteria[] = 'hds_status != 4';


        $this->db->where('(' . implode(' AND ', $criteria) . ')');
        if ($offset != '') { $this->db->offset($offset); }
        $this->db->limit($this->config->item('rows_per_page'));
        $this->db->join('tbl10_patient', 'tbl20_hemodialysis_sessions.hds_patientid = tbl10_patient.p_nindt_id', 'left');
        return $this->db->get()->result_array();
    }//end-function
   
   
    public function get_sessions($criteria='', $offset=''){

        $this->db->select();
        if ($criteria != '') { $this->db->where($criteria); }
        if ($offset != '') { $this->db->offset($offset); }
        $this->db->limit($this->config->item('rows_per_page'));
        $this->db->join('tbl10_patient', 'tbl20_hemodialysis_sessions.hds_patientid = tbl10_patient.p_nindt_id', 'left');
        return $this->db->get($this->tbl)->result_array();
    }//end-function
    
     // Function to total session number
    public function get_total_sessions($criteria = '') {
        if($criteria != '') { $this->db->where($criteria); }
        return $this->db->get($this->tbl)->num_rows();
    }//end-function
     // Function to total session number
    public function get_total_current_sessions() {
        $criteria[] = 'hds_status != 0';
        $criteria[] = 'hds_status != 4';
        $this->db->where('(' . implode(' AND ', $criteria) . ')');
       // var_dump($this->db->get($this->tbl));
        return $this->db->get($this->tbl)->num_rows();
    }//end-function
    
     // Function to single session data
     public function get_session_details($hds_id_public) {
     
        // Fetch the row from the 'sessions' table where session_id matches
        $query = $this->db->get_where($this->tbl , array('hds_id_public' => $hds_id_public));
        
        // Return the single row as an object
        return $query->row();
    }//end-function

     // Function to update session data
 public function update_session($session_id, $data) {
    $this->db->where('hds_id_pk', $session_id);
    $this->db->update($this->tbl, $data);    
    // Check if the update was successful
    return $this->db->affected_rows() > 0;
    }//end-function

 public function update_session2($session_id, $data) {
    $this->db->where('hds_id_public', $session_id);
    $this->db->update($this->tbl, $data);    
    // Check if the update was successful
    return $this->db->affected_rows() > 0;
    }//end-function




public function get_patient_sessions_by_nindtid($hds_patientid) {
    $this->db->select('*');
$this->db->from($this->tbl );
$this->db->where('hds_patientid', $hds_patientid);
$this->db->where('hds_patientid', $hds_patientid);
$this->db->order_by('hds_id_pk', 'DESC'); 
$this->db->limit(10);
$query = $this->db->get();
$result = $query->result();
    // Check if the update was successful
    return $result ;
}//end-function



}//end-class
