<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install_auto extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nosaukums' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'unique' => TRUE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('razotajs');

        $data = array(
            array('nosaukums' => 'BMW'),
            array('nosaukums' => 'Audi'),
            array('nosaukums' => 'Volvo'),
            array('nosaukums' => 'Toyota'),
            array('nosaukums' => 'Volkswagen'),
        );
        $this->db->insert_batch('razotajs', $data);

        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'razotajs_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ),
            'uzskaites_datums' => array(
                'type' => 'DATE',
            ),
            'registracijas_numurs' => array(
                'type' => 'VARCHAR',
                'constraint' => '8',
            ),
            'modelis' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'ir_uzskaite' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => 1,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (razotajs_id) REFERENCES razotajs(id)');
        
        $this->dbforge->create_table('auto');
    }

    public function down() {
        $this->dbforge->drop_table('auto');
        $this->dbforge->drop_table('razotajs');
    }
}