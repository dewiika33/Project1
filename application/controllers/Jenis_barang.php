<?php

class Jenis_barang extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_barang'); // pastikan model m_barang di-load
    }

    //Halaman Janis Barang
    public function index()
    {
        // $this->load->model('m_barang');
        $data['jenis'] = $this->m_barang->tampil_jenis()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jenis_barang', $data);
        $this->load->view('templates/footer');
    }

    //Halaman untuk tampilan tambah jenis
    public function tambah_jenis()
    {  
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('tambah_jenis');
        $this->load->view('templates/footer');
    }

    //Untuk melakukan tambah jenis
    public function aksi_jenis()
    {        
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_jenis();
        } else {
            $data = array(
                'jenis_barang' => $this->input->post('jenis_barang'),
            );

            $this->m_barang->input_jenis($data, 'jenis_barang');
            $this->session->set_flashdata('pesan_tambah', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Jenis Barang Berhasil Di Tambah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('jenis_barang');
        }
    }

    //Untuk validasi tambahh data harus diisi
    public function _rules()
    {
        $this->form_validation->set_rules('jenis_barang', 'Jenis barang', 'required|is_unique[jenis_barang.jenis_barang]', array(
            'required' => '%s harus diisi !!!',
            'is_unique' => 'Jenis barang sudah terdaftar'
        ));
    }
    

    //Edit jenis barang
    public function edit_jenis($jenis_barang)
    {
        $data['jenis'] = $this->m_barang->get_jenis_by_name($jenis_barang);

        if (!$data['jenis']) {
            show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('edit_jenis', $data);
        $this->load->view('templates/footer');
    }

    // Proses update jenis barang
    public function update_jenis()
    {
        $jenis_barang_lama = $this->input->post('jenis_barang_lama');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit_jenis($jenis_barang_lama);
        } else {
            $data = array(
                'jenis_barang' => $this->input->post('jenis_barang'),
            );
            $this->m_barang->update_jenis($jenis_barang_lama, $data);
            $this->session->set_flashdata('pesan_edit', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Jenis Barang Berhasil Di Edit!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('jenis_barang');
        }
    }

    //Hapus Jenis Barang
    public function hapus_jenis($js)
    {
        $where = array('jenis_barang' => $js);

        $this->m_barang->hapus_jenis($where, 'jenis_barang');
            $this->session->set_flashdata('pesan_hapus', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Jenis Barang Berhasil Di Hapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('jenis_barang');
    }
}