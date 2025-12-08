<?php
declare(strict_types=1);

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    /**
     * Display login form.
     * 
     * @return void
     */
    public function index(): void {
        if ($this->session->userdata('logged_in')) {
            redirect('auto');
        }

        $data['view_to_load'] = 'auth/login';
        $data['page_title'] = 'Pieslēgties';  
        $this->load->view('layouts/main', $data);
    }

    /**
     * Process login form submission.
     * 
     * @return void
     */
    public function login_process(): void {
        // TODO Add rate limiting
        if ($this->session->userdata('logged_in')) {
            redirect('auto');
        }

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
                $this->session->sess_regenerate(TRUE);
                
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

    /**
     * Logout the user and clean up session.
     * 
     * @return void
     */
    public function logout(): void {
        $this->session->sess_destroy();
        redirect('auth');
    }
}