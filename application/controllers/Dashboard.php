<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
        // $this->load->model('m_inventori');
		// $data['barang'] = $this->m_inventori->get_data();

        // $this->load->view('templates/header');
        // $this->load->view('templates/sidebar');

        // $this->load->view('v_inventori', $data);
        // $this->load->view('templates/footer');

		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard');
        $this->load->view('templates/footer');
	}
}

?>