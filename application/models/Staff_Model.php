<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_model extends CI_Model{

    private $tbl = 'tbl05_user';



    public function get_staff($criteria='', $offset=''){
        $fields = array(
            'user_id_pk','user_name', 'user_email', 'user_unit_name', 'user_role', 'user_nic', 'user_tpnumber', 'user_gender', 'user_photo','user_status'
        );
        $this->db->select($fields);
        if ($criteria != '') { $this->db->where($criteria); }
        if ($offset != '') { $this->db->offset($offset); }
        $this->db->limit($this->config->item('rows_per_page'));
        return $this->db->get($this->tbl)->result_array();
        }//end-function


         // Function to single patient data
         public function get_user_by_id($user_id_pk) {
     
            // Fetch the row from the 'machines' table where machine_id matches
            $query = $this->db->get_where($this->tbl , array('user_id_pk' => $user_id_pk ));
            
            //var_dump($query);
            // Return the single row as an object
            return $query->row();
        }//end-function
    
    public function get_total_staff($criteria = '') {
        if($criteria != '') { $this->db->where($criteria); }
        return $this->db->get($this->tbl)->num_rows();
        }//end-function
    


    public function get_password($user_id)
    {
        $query = $this->db->select('user_psw')
                          ->get_where($this->tbl, array('user_id_pk' => $user_id));
        $row = $query->row();
        return $row->password;
        }//end-function

    public function update_password($user_id, $new_password)
    {
        $this->db->where('user_id_pk', $user_id)
                 ->update($this->tbl, array('user_psw' => $new_password));
        }//end-function









}//end-class

//end-file