<?php

class Dashboard extends CI_Controller{

    public function index()
    {
        // $this->load->model('m_barang');
        // $data['barang'] = $this->m_barang->get_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard');
        $this->load->view('templates/footer');
    }
}