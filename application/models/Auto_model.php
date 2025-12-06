<?php
class Auto_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_all_auto() {
        $query = $this->db->get('auto');
        return $query->result_array();
    }

    public function get_auto($id) {
        $query = $this->db->get_where('auto', array('id' => $id));
        return $query->row_array();
    }

    public function create_auto() {
        $data = array(
            'razotajs_id' => $this->input->post('razotajs_id'),
            'uzskaites_datums' => $this->input->post('uzskaites_datums'),
            'registracijas_numurs' => $this->input->post('registracijas_numurs'),
            'modelis' => $this->input->post('modelis'),
            'ir_uzskaite' => $this->input->post('ir_uzskaite')
        );
        return $this->db->insert('auto', $data);
    }

    public function update_auto($id) {
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

    public function delete_auto($id) {
        $this->db->where('id', $id);
        return $this->db->delete('auto');
    }
}