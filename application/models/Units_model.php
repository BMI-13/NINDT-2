<?php
class Units_model extends CI_Model {

    private $tbl = 'tbl08_units';


    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

     // Function to total machine number
     public function get_total_units($criteria = '') {
        if($criteria != '') { $this->db->where($criteria); }
        return $this->db->get($this->tbl)->num_rows();
    }//end-function


     // Function to get machine data with pagination
     public function get_units($criteria='', $offset=''){

        var_dump($criteria);
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
    public function update_unit($unit_id, $data) {
        $this->db->where('unit_id', $unit_id);
        $this->db->update($this->tbl, $data);
        return $this->db->affected_rows() > 0;
    }

    // Function to delete a unit
    public function delete_unit($unit_id) {
        $this->db->where('unit_id', $unit_id);
        $this->db->delete($this->tbl);
        return $this->db->affected_rows() > 0;
    }

    public function get_active_units()
    {
        // Select active units from the database
        $query = $this->db->where('unit_active', true)
                          ->get($this->tbl);
        return $query->result();
    }


}
?>
