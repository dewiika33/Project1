<?php

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_barang'); // pastikan model m_barang di-load
    }

    public function index()
    {
        $this->load->view('templates/header');
        // $this->load->view('templates/sidebar');
        $this->load->view('login');
        $this->load->view('templates/footer');
    }

    public function login_aksi()
    {
        $user = $this->input->post('username', true);
        $pass = $this->input->post('password', true);

        //validasi
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s Harus diisi !!!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus diisi !!!'
        ));

        if ($this->form_validation->run() != FALSE) {
            $where = array(
                'username' => $user,
                'password' => $pass,
            );

            $cekLogin = $this->m_barang->cek_login($where)->num_rows();
            if ($cekLogin > 0) {
                $sess_data = array(
                    'username' => $user,
                    'login' => 'OK',
                );
                $this->session->set_userdata($sess_data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', 'Username atau Password salah');
                redirect('login');
            }
        } else {
            $this->load->view('login');
            $this->load->view('templates/header');
            $this->load->view('templates/footer');
        }
    }
}
