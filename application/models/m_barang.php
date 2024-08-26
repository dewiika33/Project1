<?php

class M_barang extends CI_Model {
    public function tampil_data ()
    {
       return $this->db->get('nama_barang');
       return $this->db->get('barang_masuk');
    }

    public function insert_barang_masuk($data, $table) {
        return $this->db->insert($table, $data);
    }
}