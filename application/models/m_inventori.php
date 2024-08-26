<?php

class M_inventori extends CI_Model {
    public function get_data ()
    {
       return $this->db->get('nama_barang')->result_array();
       return $this->db->get('barang_masuk')->result_array();
    }
}