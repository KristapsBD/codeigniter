<?php
declare(strict_types=1);

class User_model extends CI_Model {

    /**
     * Authenticate user with username and password.
     * 
     * @param string $username
     * @param string $password
     * @return array|false
     */
    public function login(string $username, string $password): array|false {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        $user = $query->row_array();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }
}