<?php
declare(strict_types=1);

class Auto_model extends CI_Model {

    /**
     * Base dependency injection.
     */
    public function __construct() {
        $this->load->database();
    }

    /**
     * Get all autos.
     * 
     * @return array
     */
    public function get_all_auto(): array {
        $this->db->select('auto.*, razotajs.nosaukums as manufacturer_name');
        $this->db->from('auto');
        $this->db->join('razotajs', 'razotajs.id = auto.razotajs_id');
        $this->db->order_by('auto.id', 'DESC');
        return $this->db->get()->result_array();
    }

    /**
     * Get single auto by ID.
     * 
     * @param int $id Auto ID
     * @return array|null
     */
    public function get_auto(int $id): ?array {
        $query = $this->db->get_where('auto', array('id' => $id));
        return $query->row_array();
    }

    /**
     * Create new auto.
     * 
     * @param array $data Auto data
     * @return int 
     */
    public function create_auto(array $data): int {
        $this->db->insert('auto', $data);
        return $this->db->insert_id();
    }

    /**
     * Update existing auto.
     * 
     * @param int $id Auto ID
     * @param array $data Auto data
     * @return bool
     */
    public function update_auto(int $id, array $data): bool {
        $this->db->where('id', $id);
        return $this->db->update('auto', $data);
    }

    /**
     * Delete auto by ID.
     * 
     * @param int $id Auto ID
     * @return bool
     */
    public function delete_auto(int $id): bool {
        $this->db->where('id', $id);
        return $this->db->delete('auto');
    }
}