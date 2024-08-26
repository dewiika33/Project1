<!-- 
// class Barang_masuk_model extends CI_Model {
    
//     public function __construct() {
//         $this->load->database();
//     }

//     public function get_all_barang_masuk() {
//         $query = $this->db->get('barang_masuk'); // Assuming the table is named 'barang_masuk'
//         return $query->result_array();
//     }

//     public function insert_barang_masuk($data) {
//         return $this->db->insert('barang_masuk', $data);
//     }
// }
 -->

<?php
class Barang_masuk_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function store_barang($data) {
        return $this->db->insert('barang_masuk', $data);
    }

    public function get_all_barang() {
        $query = $this->db->get('barang_masuk');
        return $query->result_array();
    }
}
?>
