<?php
class Units_model extends CI_Model {

    private $tbl = 'tbl08_units';


    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

     // Function to total unit number
     public function get_total_units($criteria = '') {
        if($criteria != '') { $this->db->where($criteria); }
        return $this->db->get($this->tbl)->num_rows();
    }//end-function


     // Function to get unit data with pagination
     public function get_units($criteria='', $offset=''){

        $fields = array(
            'unit_id_pk','unit_name', 'unit_hospital',  'unit_active'
        );
        $this->db->select($fields);
        if ($criteria != '') { $this->db->where($criteria); }
        if ($offset != '') { $this->db->offset($offset); }
        $this->db->limit($this->config->item('rows_per_page'));
        return $this->db->get($this->tbl)->result_array();
    }//end-function

    // Function to add a new unit
    public function add_unit($data) {
        $this->db->insert($this->tbl, $data);
        return $this->db->insert_id();
    }

    // Function to update a unit
    public function update_unit($unit_id_pk, $data) {
        $this->db->where('unit_id_pk', $unit_id_pk);
        $this->db->update($this->tbl, $data);
        return $this->db->affected_rows() > 0;
    }

    // Function to delete a unit
    public function delete_unit($unit_id_pk) {
        $this->db->where('unit_id_pk', $unit_id_pk);
        $this->db->delete($this->tbl);
        return $this->db->affected_rows() > 0;
    }

    public function get_punit_from_public_id($u_public_name) {
        return $this->db->get_where($this->tbl, array('u_public_name' => $u_public_name))->row_array();
    }
public function get_punit_from_pkid($unit_id_pk) {
        return $this->db->get_where($this->tbl, array('unit_id_pk' => $unit_id_pk))->row_array();
    }

    public function get_active_units()
    {
        // Select active units from the database
        $query = $this->db->where('unit_active', true)
                          ->get($this->tbl);
        return $query->result();
    }

    public function enabledisable_unit($unit_id, $changestatusto) {
        // var_dump($unit_id );

         // Update the unit status to disabled in the database
         $this->db->where('unit_id_pk', $unit_id);
         $this->db->update($this->tbl, array('unit_active' => $changestatusto));
         
         // Check if the update was successful
         return $this->db->affected_rows() > 0;
 }//end-function



}
?>
