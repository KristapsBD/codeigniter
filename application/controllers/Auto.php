<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auto extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('auto_model');
        $this->load->model('manufacturer_model');
    }

    public function index() {
        $data['auto'] = $this->auto_model->get_all_auto();
        $data['manufacturers'] = $this->manufacturer_model->get_all_manufacturers();
        $this->load->view('auto/list', $data);
    }

    public function create() {
        $data['manufacturers'] = $this->manufacturer_model->get_all_manufacturers();
        $this->load->view('auto/create', $data);   
    }

    public function store() {
        $this->form_validation->set_rules('razotajs_id', 'Razotajs', 'required|integer');
        $this->form_validation->set_rules('uzskaites_datums', 'Uzskaites datums', 'required|regex_match[/^\d{4}-\d{2}-\d{2}$/]'); //YYYY-MM-DD
        $this->form_validation->set_rules('registracijas_numurs', 'Registracijas numurs', 'required|exact_length[6]|regex_match[/^[A-Z]{2}[0-9]{4}$/]');
        $this->form_validation->set_rules('modelis', 'Modelis', 'required|alpha_numeric_spaces|trim|max_length[255]');
        $this->form_validation->set_rules('ir_uzskaite', 'Ir uzskaite', 'integer|in_list[0,1]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auto/create');
        } else {
            $this->auto_model->create_auto();
            redirect('auto');
        }
    }

    public function edit($id) {
        $data['auto'] = $this->auto_model->get_auto($id);
        $data['manufacturers'] = $this->manufacturer_model->get_all_manufacturers();
        $this->load->view('auto/edit', $data);
    }

    public function update($id) {
        $this->form_validation->set_rules('razotajs_id', 'Razotajs', 'required|integer');
        $this->form_validation->set_rules('uzskaites_datums', 'Uzskaites datums', 'required|regex_match[/^\d{4}-\d{2}-\d{2}$/]'); //YYYY-MM-DD
        $this->form_validation->set_rules('registracijas_numurs', 'Registracijas numurs', 'required|exact_length[6]|regex_match[/^[A-Z]{2}[0-9]{4}$/]');
        $this->form_validation->set_rules('modelis', 'Modelis', 'required|alpha_numeric_spaces|trim|max_length[255]');
        $this->form_validation->set_rules('ir_uzskaite', 'Ir uzskaite', 'integer|in_list[0,1]');

        $data['auto'] = $this->auto_model->get_auto($id);
        $data['manufacturers'] = $this->manufacturer_model->get_all_manufacturers();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auto/edit', $data);
        } else {
            $this->auto_model->update_auto($id);
            redirect('auto');
        }
    }

    public function delete($id) {
        $this->auto_model->delete_auto($id);
        redirect('auto');
    }
}