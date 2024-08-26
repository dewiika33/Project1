<?php

class Laporan_pemakaian extends CI_Controller{

    public function index()
    {
        $this->load->model('m_barang');
        $data['laporan'] = $this->m_barang->get_all_data();
        // $data['barang'] = $this->m_barang->get_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('laporan_pemakaian', $data);
        $this->load->view('templates/footer');
    }

    public function filter() {
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');
    
        // Validasi dan format tanggal jika diperlukan
    
        $this->load->model('m_barang');
        $data['laporan'] = $this->m_barang->get_filtered_data($start_date, $end_date);
    
        // Load view dengan data yang telah difilter
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('laporan_pemakaian', $data);
        $this->load->view('templates/footer');
    }
}