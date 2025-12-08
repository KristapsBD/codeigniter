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
            $this->session->set_flashdata('success', 'Ieraksts veiksmīgi izveidots');
            redirect('auto');
        }
    }

    public function edit($id) {
        if (!is_numeric($id)) {
            show_404();
        }
        
        $data['auto'] = $this->auto_model->get_auto($id);
        
        if (!$data['auto']) {
            show_404();
        }
        
        $data['manufacturers'] = $this->manufacturer_model->get_all_manufacturers();
        $data['view_to_load'] = 'auto/edit';
        $data['page_title'] = 'Rediģēt Auto';
        $this->load->view('layouts/main', $data);
    }

    public function update($id) {
        if (!is_numeric($id)) {
            show_404();
        }
        
        $data['auto'] = $this->auto_model->get_auto($id);
        
        if (!$data['auto']) {
            show_404();
        }
        
        $data['manufacturers'] = $this->manufacturer_model->get_all_manufacturers();
        $data['view_to_load'] = 'auto/edit';
        $data['page_title'] = 'Rediģēt Auto';

        if ($this->form_validation->run('auto_creation') == FALSE) {
            $this->load->view('layouts/main', $data);
        } else {
            $this->auto_model->update_auto($id);
            $this->session->set_flashdata('success', 'Ieraksts veiksmīgi atjaunināts');
            redirect('auto');
        }
    }

    public function delete($id) {
        $this->check_admin();
        
        if ($this->input->server('REQUEST_METHOD') !== 'POST') {
            show_error('Neatļauta darbība', 405);
        }
        
        if (!is_numeric($id) || !$this->auto_model->get_auto($id)) {
            show_404();
        }

        $this->auto_model->delete_auto($id);
        $this->session->set_flashdata('success', 'Ieraksts veiksmīgi dzēsts');
        redirect('auto');
    }
}