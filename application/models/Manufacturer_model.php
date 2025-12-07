<?php
class Manufacturer_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_all_manufacturers() {
        $query = $this->db->get('razotajs');
        return $query->result_array();
    }
}