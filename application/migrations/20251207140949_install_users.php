<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install_users extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'unique' => TRUE,
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
            ),
            'is_admin' => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'default' => date('Y-m-d H:i:s'),
            ),
        ));

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');

        $users = array(
            array('username' => 'admin', 'password' => password_hash('admin', PASSWORD_BCRYPT), 'is_admin' => 1),
            array('username' => 'user', 'password' => password_hash('user', PASSWORD_BCRYPT), 'is_admin' => 0),
        );
        $this->db->insert_batch('users', $users);        
    }

    public function down() {
        $this->dbforge->drop_table('users');
    }
}