<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auto extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('auto_model');
        $this->load->model('manufacturer_model');
    }

    public function index() {
        $data['auto'] = $this->auto_model->get_all_auto();
        $data['manufacturers'] = $this->manufacturer_model->get_all_manufacturers();
        $data['view_to_load'] = 'auto/list';
        $data['page_title'] = 'Auto Saraksts';
        $this->load->view('layouts/main', $data);
    }

    public function create() {
        $this->check_admin();

        $data['manufacturers'] = $this->manufacturer_model->get_all_manufacturers();
        $data['view_to_load'] = 'auto/create';
        $data['page_title'] = 'Izveidot Auto';
        $this->load->view('layouts/main', $data);   
    }

    public function store() {
        $this->check_admin();

        $data['manufacturers'] = $this->manufacturer_model->get_all_manufacturers();
        $data['view_to_load'] = 'auto/create';
        $data['page_title'] = 'Izveidot Auto';

        if ($this->form_validation->run('auto_creation') == FALSE) {
            $this->load->view('layouts/main', $data);
        } else {
            $this->auto_model->create_auto();
            redirect('auto');
        }
    }

    public function edit($id) {
        $data['auto'] = $this->auto_model->get_auto($id);
        $data['manufacturers'] = $this->manufacturer_model->get_all_manufacturers();
        $data['view_to_load'] = 'auto/edit';
        $data['page_title'] = 'Rediģēt Auto';
        $this->load->view('layouts/main', $data);
    }

    public function update($id) {
        $data['auto'] = $this->auto_model->get_auto($id);
        $data['manufacturers'] = $this->manufacturer_model->get_all_manufacturers();
        $data['view_to_load'] = 'auto/edit';
        $data['page_title'] = 'Rediģēt Auto';

        if ($this->form_validation->run('auto_creation') == FALSE) {
            $this->load->view('layouts/main', $data);
        } else {
            $this->auto_model->update_auto($id);
            redirect('auto');
        }
    }

    public function delete($id) {
        $this->check_admin();

        $this->auto_model->delete_auto($id);
        redirect('auto');
    }
}