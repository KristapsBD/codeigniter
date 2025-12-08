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
     * @return bool
     */
    public function create_auto(): bool {
        $data = array(
            'razotajs_id' => $this->input->post('razotajs_id'),
            'uzskaites_datums' => $this->input->post('uzskaites_datums'),
            'registracijas_numurs' => $this->input->post('registracijas_numurs'),
            'modelis' => $this->input->post('modelis'),
            'ir_uzskaite' => $this->input->post('ir_uzskaite')
        );
        return $this->db->insert('auto', $data);
    }

    /**
     * Update existing auto.
     * 
     * @param int $id Auto ID
     * @return bool
     */
    public function update_auto(int $id): bool {
        $data = array(
            'razotajs_id' => $this->input->post('razotajs_id'),
            'uzskaites_datums' => $this->input->post('uzskaites_datums'),
            'registracijas_numurs' => $this->input->post('registracijas_numurs'),
            'modelis' => $this->input->post('modelis'),
            'ir_uzskaite' => $this->input->post('ir_uzskaite')
        );
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