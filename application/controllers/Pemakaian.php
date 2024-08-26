<?php

class Pemakaian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_barang'); // pastikan model m_barang di-load
    }

    public function index()
    {
        $this->load->model('m_barang');
        $data['pemakaian'] = $this->m_barang->tampil_pemakaian();
        $data['datanama'] = $this->m_barang->get_nama_barang();

        // Id otomatis
        $table = "pemakaian";
        $field = "id_pemakaian";
        $lastKode = $this->m_barang->getMax($table, $field);
        if ($lastKode) {
            $noUrut = (int) substr($lastKode, 2, 5);
            $noUrut++;
        } else {
            $noUrut = 1;
        }
        $str = "PK";
        $data['newKode'] = $str . sprintf('%05s', $noUrut);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pemakaian', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_tambah_pakai()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $no_inventori = $this->input->post('no_inventori');
            $jumlah = $this->input->post('jumlah');
            // $status_barang = $this->m_barang->get_status_barang($no_inventori); //mengambil status dari barang masuk

            // Periksa ketersediaan stok
            if (!$this->m_barang->cek_stok_barang($no_inventori, $jumlah)) {
                $this->session->set_flashdata('pesan_gagal', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Stok barang tidak mencukupi!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
                redirect('pemakaian');
            } else {

                // Data pemakaian
                $data = array(
                    'id_pemakaian' => $this->input->post('id_pemakaian'),
                    'no_inventori' => $this->input->post('no_inventori'),
                    'jumlah' => $this->input->post('jumlah'),
                    'tanggal' => $this->input->post('tanggal'),
                    // 'status' => $status_barang
                );
                // Mulai transaksi
                $this->db->trans_start();

                // Simpan data pemakaian
                $this->m_barang->input_tambah_pakai($data, 'pemakaian');

                // Kurangi jumlah barang
                $this->m_barang->update_qty_barang($no_inventori, $jumlah);

                // Selesaikan transaksi
                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    // Jika terjadi kesalahan, rollback transaksi
                    $this->session->set_flashdata('pesan_gagal', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Barang gagal di pakai!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                } else {
                    // Jika berhasil, commit transaksi
                    $this->session->set_flashdata('pesan_tambah', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Barang berhasil di pakai!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                }
                redirect('pemakaian');
            }

            //     if ($this->m_barang->input_tambah_pakai($data, 'pemakaian')) {
            //         $this->session->set_flashdata('pesan_tambah', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            //         Barang berhasil di pakai!
            //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //             <span aria-hidden="true">&times;</span>
            //         </button>
            //         </div>');
            //     } else {
            //         $this->session->set_flashdata('pesan_gagal', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            //         Gagal menyimpan data barang!
            //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //             <span aria-hidden="true">&times;</span>
            //         </button>
            //         </div>');
            //     }
            //     redirect('pemakaian');
            // }
        }
    }


    public function _rules()
    {
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required', array(
            'required' => '%s Harus diisi !!!',

        ));
    }
}
