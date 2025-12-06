<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auto extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('auto_model');
    }

    public function index() {
        $data['auto'] = $this->auto_model->get_auto();
        $this->load->view('auto/list', $data);
    }

    public function create() {
        $this->load->view('auto/create');
    }

    public function store() {
        $this->auto_model->create_product();
        redirect('auto');
    }

    public function edit($id) {
        $data['product'] = $this->auto_model->get_product($id);
        $this->load->view('auto/edit', $data);
    }

    public function update($id) {
        $this->auto_model->update_product($id);
        redirect('auto');
    }

    public function delete($id) {
        $this->auto_model->delete_product($id);
        redirect('auto');
    }
}