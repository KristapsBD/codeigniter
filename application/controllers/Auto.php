<?php
declare(strict_types=1);

defined('BASEPATH') OR exit('No direct script access allowed');

class Auto extends MY_Controller {

    /**
     * Base dependency injection.
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('auto_model');
        $this->load->model('manufacturer_model');
    }

    /**
     * Show all autos.
     * 
     * @return void
     */
    public function index(): void {
        $data['auto'] = $this->auto_model->get_all_auto();
        $data['manufacturers'] = $this->manufacturer_model->get_all_manufacturers();
        $data['view_to_load'] = 'auto/list';
        $data['page_title'] = 'Auto Saraksts';
        $this->load->view('layouts/main', $data);
    }

    /**
     * Admin form to create new auto.
     * 
     * @return void
     */
    public function create(): void {
        $this->check_admin();

        $data['manufacturers'] = $this->manufacturer_model->get_all_manufacturers();
        $data['view_to_load'] = 'auto/create';
        $data['page_title'] = 'Izveidot Auto';
        $this->load->view('layouts/main', $data);   
    }

    /**
     * Process and save new auto.
     * 
     * @return void
     */
    public function store(): void {
        $this->check_admin();

        if ($this->form_validation->run('auto_creation') == FALSE) {
            $this->create();
        } else {
            $data = array(
                'razotajs_id' => $this->input->post('razotajs_id'),
                'uzskaites_datums' => $this->input->post('uzskaites_datums'),
                'registracijas_numurs' => $this->input->post('registracijas_numurs'),
                'modelis' => $this->input->post('modelis'),
                'ir_uzskaite' => $this->input->post('ir_uzskaite')
            );
            
            $this->auto_model->create_auto($data);

            $this->session->set_flashdata('success', 'Ieraksts veiksmīgi izveidots');
            redirect('auto');
        }
    }

    /**
     * Edit auto form.
     * 
     * @param string $id Auto ID
     * @return void
     */
    public function edit(string $id): void {
        if (!is_numeric($id)) {
            show_404();
            return;
        }
        $id = (int) $id;
        
        $data['auto'] = $this->auto_model->get_auto($id);
        
        if (!$data['auto']) {
            show_404();
            return;
        }
        
        $data['manufacturers'] = $this->manufacturer_model->get_all_manufacturers();
        $data['view_to_load'] = 'auto/edit';
        $data['page_title'] = 'Rediģēt Auto';
        $this->load->view('layouts/main', $data);
    }

    /**
     * Process and save existing auto.
     * 
     * @param string $id Auto ID
     * @return void
     */
    public function update(string $id): void {
        if (!is_numeric($id)) {
            show_404();
            return;
        }
        $id = (int) $id;
        
        $data['auto'] = $this->auto_model->get_auto($id);
        
        if (!$data['auto']) {
            show_404();
            return;
        }
        
        if ($this->form_validation->run('auto_creation') == FALSE) {
            $this->edit((string) $id);
        } else {
            $data = array(
                'razotajs_id' => $this->input->post('razotajs_id'),
                'uzskaites_datums' => $this->input->post('uzskaites_datums'),
                'registracijas_numurs' => $this->input->post('registracijas_numurs'),
                'modelis' => $this->input->post('modelis'),
                'ir_uzskaite' => $this->input->post('ir_uzskaite')
            );

            $this->auto_model->update_auto($id, $data);

            $this->session->set_flashdata('success', 'Ieraksts veiksmīgi atjaunināts');
            redirect('auto');
        }
    }

    /**
     * Admin only delete auto.
     * 
     * @param string $id Auto ID
     * @return void
     */
    public function delete(string $id): void {
        $this->check_admin();
        
        if ($this->input->server('REQUEST_METHOD') !== 'POST') {
            show_error('Neatļauta darbība', 405);
            return;
        }
        
        if (!is_numeric($id)) {
            show_404();
            return;
        }
        $id = (int) $id;
        
        if (!$this->auto_model->get_auto($id)) {
            show_404();
            return;
        }

        $this->auto_model->delete_auto($id);
        $this->session->set_flashdata('success', 'Ieraksts veiksmīgi dzēsts');
        redirect('auto');
    }
}