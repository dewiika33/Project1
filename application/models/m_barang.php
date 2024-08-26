<?php

class M_barang extends CI_Model
{
   //**Login */
   function cek_login($where)
   {
      return $this->db->get_where('akun', $where);
   }





   //**Halaman master Nama Barang */
   //Untuk halaman menampilkan nama barang
   public function tampil_nama()
   {
      return $this->db->get('nama_barang');
   }
   //Untuk menambahkan nama 
   public function input_nama($data, $table)
   {
      return $this->db->insert($table, $data);
   }
   // Untuk melakukan update
   public function update_nama($nama_barang_lama, $data)
   {
      $this->db->where('nama_barang', $nama_barang_lama);
      return $this->db->update('nama_barang', $data);
   }
   // Mengambil data nama barang berdasarkan nama
   public function get_nama_by_name($nama_barang)
   {
      $this->db->where('nama_barang', $nama_barang);
      return $this->db->get('nama_barang')->row();
   }
   // Menghapus nama barang
   public function hapus_nama($where, $table)
   {
      $this->db->where($where);
      $this->db->delete($table);
   }





   //**Halaman master Jenis Barang */
   //Untuk halaman menampilkan jenis barang
   public function tampil_jenis()
   {
      return $this->db->get('jenis_barang');
   }
   //Untuk menambahkan jenis
   public function input_jenis($data, $table)
   {
      return $this->db->insert($table, $data);
   }
   // Untuk melakukan update
   public function update_jenis($jenis_barang_lama, $data)
   {
      $this->db->where('jenis_barang', $jenis_barang_lama);
      return $this->db->update('jenis_barang', $data);
   }
   // Mengambil data jenis barang berdasarkan nama
   public function get_jenis_by_name($jenis_barang)
   {
      $this->db->where('jenis_barang', $jenis_barang);
      return $this->db->get('jenis_barang')->row();
   }
   //Menghapus data jenis barang
   public function hapus_jenis($where, $table)
   {
      $this->db->where($where);
      $this->db->delete($table);
   }


   


   //**Halaman Pemakaian */
   //Menampilkan barang yang sudah dipakai
   public function tampil_pemakaian() {
      $this->db->select('p.*, bm.nama_barang, bm.jenis_barang, bm.masa_pakai, bm.status');
      $this->db->from('pemakaian p');
      $this->db->join('barang_masuk bm', 'p.no_inventori = bm.no_inventori');
      $query = $this->db->get();
      return $query->result();
   }
   //Tambah barang pemakaian 
   public function input_tambah_pakai($data, $table){
      return $this->db->insert($table, $data);
   }
   //Selec option nama barang pemakaian
   public function get_nama_barang()
   {
      $query = $this->db->query("SELECT * FROM barang_masuk WHERE qty > 0 ORDER BY no_inventori ASC");
      return $query->result();
   }
   //ID Otomatis
   public function getMax($table = null, $field = null)
   {
      $this->db->select_max($field);
      return $this->db->get($table)->row_array()[$field];
   }
   //Untuk mengupdet qty/mengurangi qty
   public function update_qty_barang($no_inventori, $jumlah_pakai)
   {
      $this->db->set('qty', 'qty - ' . (int)$jumlah_pakai, FALSE);
      $this->db->where('no_inventori', $no_inventori);
      return $this->db->update('barang_masuk');
   }
   //cek stok
   public function cek_stok_barang($no_inventori, $jumlah_pakai)
   {
      $this->db->select('qty');
      $this->db->where('no_inventori', $no_inventori);
      $query = $this->db->get('barang_masuk');

      if ($query->num_rows() > 0) {
         $row = $query->row();
         return $row->qty >= $jumlah_pakai;
      }
      return FALSE;
   }




   
   //**Halaman Laporan Pemakaian */
   //**Menampilkan data   
   public function get_all_data() {
      $this->db->select('p.*, bm.nama_barang, bm.jenis_barang, bm.masa_pakai, bm.status');
      $this->db->from('pemakaian p');
      $this->db->join('barang_masuk bm', 'p.no_inventori = bm.no_inventori');
      $query = $this->db->get();
      return $query->result();
   }
   //Filter tanggalaporan
   public function get_filtered_data($start_date, $end_date) {
      $this->db->select('p.*, bm.nama_barang, bm.jenis_barang, bm.masa_pakai, bm.status');
      $this->db->from('pemakaian p');
      $this->db->join('barang_masuk bm', 'p.no_inventori = bm.no_inventori');
      
      if ($start_date && $end_date) {
         $this->db->where('p.tanggal >=', $start_date);
         $this->db->where('p.tanggal <=', $end_date);
      }
      
      $query = $this->db->get();
      return $query->result();
   }
}
