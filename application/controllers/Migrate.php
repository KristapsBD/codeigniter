<?php
declare(strict_types=1);
class Migrate extends CI_Controller {

    /**
     * Run migrations.
     * 
     * @return void
     */
    public function index(): void {
        $this->load->library('migration');

        if ($this->migration->current() === FALSE) {
            show_error($this->migration->error_string());
        }
    }
}