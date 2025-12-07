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

        $cars = array(
            array('razotajs_id' => 1, 'uzskaites_datums' => '2023-01-15', 'registracijas_numurs' => 'AA1234', 'modelis' => 'X5 xDrive30d', 'ir_uzskaite' => 1),
            array('razotajs_id' => 1, 'uzskaites_datums' => '2023-02-10', 'registracijas_numurs' => 'BB5678', 'modelis' => '320d Touring', 'ir_uzskaite' => 1),
            array('razotajs_id' => 1, 'uzskaites_datums' => '2022-11-05', 'registracijas_numurs' => 'CC9012', 'modelis' => '530e iPerformance', 'ir_uzskaite' => 1),
            array('razotajs_id' => 1, 'uzskaites_datums' => '2021-08-20', 'registracijas_numurs' => 'DD3456', 'modelis' => 'i3 120Ah', 'ir_uzskaite' => 0),

            array('razotajs_id' => 2, 'uzskaites_datums' => '2023-03-01', 'registracijas_numurs' => 'EE7890', 'modelis' => 'A6 Avant 40 TDI', 'ir_uzskaite' => 1),
            array('razotajs_id' => 2, 'uzskaites_datums' => '2023-05-12', 'registracijas_numurs' => 'FF1234', 'modelis' => 'Q7 S-Line', 'ir_uzskaite' => 1),
            array('razotajs_id' => 2, 'uzskaites_datums' => '2022-12-24', 'registracijas_numurs' => 'GG5678', 'modelis' => 'A4 Sedan', 'ir_uzskaite' => 1),
            array('razotajs_id' => 2, 'uzskaites_datums' => '2020-06-15', 'registracijas_numurs' => 'HH9012', 'modelis' => 'Q5 Quattro', 'ir_uzskaite' => 0),

            array('razotajs_id' => 3, 'uzskaites_datums' => '2023-07-04', 'registracijas_numurs' => 'JJ3456', 'modelis' => 'XC60 B4 Mild Hybrid', 'ir_uzskaite' => 1),
            array('razotajs_id' => 3, 'uzskaites_datums' => '2023-09-01', 'registracijas_numurs' => 'KK7890', 'modelis' => 'XC90 Recharge', 'ir_uzskaite' => 1),
            array('razotajs_id' => 3, 'uzskaites_datums' => '2021-04-10', 'registracijas_numurs' => 'LL1234', 'modelis' => 'V60 Cross Country', 'ir_uzskaite' => 1),
            array('razotajs_id' => 3, 'uzskaites_datums' => '2019-11-11', 'registracijas_numurs' => 'MM5678', 'modelis' => 'S90 Inscription', 'ir_uzskaite' => 0),

            array('razotajs_id' => 4, 'uzskaites_datums' => '2023-10-15', 'registracijas_numurs' => 'NN9012', 'modelis' => 'RAV4 Hybrid', 'ir_uzskaite' => 1),
            array('razotajs_id' => 4, 'uzskaites_datums' => '2023-11-20', 'registracijas_numurs' => 'PP3456', 'modelis' => 'Corolla Touring Sports', 'ir_uzskaite' => 1),
            array('razotajs_id' => 4, 'uzskaites_datums' => '2022-01-30', 'registracijas_numurs' => 'RR7890', 'modelis' => 'Yaris Cross', 'ir_uzskaite' => 1),
            array('razotajs_id' => 4, 'uzskaites_datums' => '2020-02-14', 'registracijas_numurs' => 'SS1234', 'modelis' => 'Land Cruiser 150', 'ir_uzskaite' => 0),

            array('razotajs_id' => 5, 'uzskaites_datums' => '2023-08-08', 'registracijas_numurs' => 'TT5678', 'modelis' => 'Passat Variant GTE', 'ir_uzskaite' => 1),
            array('razotajs_id' => 5, 'uzskaites_datums' => '2023-06-25', 'registracijas_numurs' => 'VV9012', 'modelis' => 'Tiguan R-Line', 'ir_uzskaite' => 1),
            array('razotajs_id' => 5, 'uzskaites_datums' => '2021-09-19', 'registracijas_numurs' => 'ZZ3456', 'modelis' => 'Golf 8', 'ir_uzskaite' => 1),
            array('razotajs_id' => 5, 'uzskaites_datums' => '2018-05-05', 'registracijas_numurs' => 'XY7890', 'modelis' => 'Transporter T6', 'ir_uzskaite' => 0),
        );
        $this->db->insert_batch('auto', $cars);        
    }

    public function down() {
        $this->dbforge->drop_table('auto');
        $this->dbforge->drop_table('razotajs');
    }
}