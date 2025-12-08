<?php
declare(strict_types=1);

class Manufacturer_model extends CI_Model {

    /**
     * Base dependency injection.
     */
    public function __construct() {
        $this->load->database();
    }

    /**
     * Get all manufacturers.
     * 
     * @return array Array of manufacturers
     */
    public function get_all_manufacturers(): array {
        $query = $this->db->get('razotajs');
        return $query->result_array();
    }
}