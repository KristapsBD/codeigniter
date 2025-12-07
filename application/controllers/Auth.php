<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index() {
        $data['view_to_load'] = 'auth/login';
        $data['page_title'] = 'Pieslēgties';  
        $this->load->view('layouts/main', $data);
    }

    public function login_process() {
        $this->load->library('form_validation');
        $this->load->model('user_model');
        $data['view_to_load'] = 'auth/login';
        $data['page_title'] = 'Pieslēgties';

        if ($this->form_validation->run('login_auth') == FALSE) {
            $this->load->view('layouts/main', $data);
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->user_model->login($username, $password);

            if ($user) {
                $session_data = array(
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'is_admin' => $user['is_admin'],
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);
                
                redirect('auto');
            } else {
                $this->session->set_flashdata('error', 'Nepareizs lietotājvārds vai parole');
                redirect('auth');
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}