<?php
declare(strict_types=1);

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    
    /**
     * Base controller. Add authentication for all child controllers.
     */
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Jūs neesat autorizēts piekļūt šai lapai.');
            redirect('auth');
        }
    }

    /**
     * Helper method to check admin privileges.
     * 
     * @return void
     */
    protected function check_admin(): void {
        if ($this->session->userdata('is_admin') != 1) {
            show_error('403 Aizliegts. Jūs neesat autorizēts piekļūt šai lapai.', 403);
        }
    }
}