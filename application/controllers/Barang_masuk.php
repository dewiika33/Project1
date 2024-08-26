 <?php
 class Barang_masuk extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_barang'); // pastikan model m_barang di-load
    }
    public function index()
    {
        $this->load->model('m_barang');
        // $data['barang'] = $this->m_barang->get_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('create');
        $this->load->view('templates/footer');
    }
    // public function tambah()
    // {
    //     $this->load->view('templates/header');
    //     $this->load->view('templates/sidebar');
    //     $this->load->view('create');  // Load view untuk form tambah barang
    //     $this->load->view('templates/footer');
    // }
    public function simpan_barang() {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'no_inventori' => $this->input->post('no_inventori'),
                'nama_barang' => $this->input->post('nama_barang'),
                'jenis_barang' => $this->input->post('jenis_barang'),
                'qty' => $this->input->post('qty'),
                'masa_pakai' => $this->input->post('masa_pakai'),
                'status' => $this->input->post('status'),
                'tanggal' => $this->input->post('tanggal')
            );
            $this->m_barang->insert_barang_masuk($data, 'barang_masuk');

            // $this->m_barang->insert_barang_masuk($data 'barang_masuk'); 
            redirect('barang_masuk'); // Redirect ke halaman list barang masuk setelah data berhasil disimpan
        }
    } 
    
     // Fungsi untuk menyimpan data barang masuk
     public function _rules() {
        // $this->form_validation->set_rules('no_inventori', 'no_inventori', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('jenis_barang', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('qty', 'qty', 'required|numeric');
        $this->form_validation->set_rules('masa_pakai', 'Masa Pakai', 'required|numeric');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Masuk', 'required');

        // if ($this->form_validation->run() == FALSE) {
        //     // Jika validasi gagal, tampilkan kembali form tambah barang
        //     $this->tambah();
        // } else {
        //     // Jika validasi berhasil, simpan data ke database
        //     $data = array(
        //         'nama_barang' => $this->input->post('nama_barang'),
        //         'jenis_barang' => $this->input->post('jenis_barang'),
        //         'jumlah_barang' => $this->input->post('jumlah_barang'),
        //         'jumlah_pakai' => $this->input->post('jumlah_pakai'),
        //         'status' => $this->input->post('status'),
        //         'tanggal_masuk' => $this->input->post('tanggal_masuk')
        //     );
        //     $this->m_barang->insert_barang_masuk($data 'barang_masuk');
        //     redirect('barang_masuk'); // Redirect ke halaman list barang masuk setelah data berhasil disimpan
        // }
    }
// }
// class Barang_masuk extends CI_Controller {

    // public function __construct() {
    //     parent::__construct();
    //     $this->load->model('m_barang');
    // }

//     public function index() {
//         $data['barang_masuk'] = $this->Barang_masuk_model->get_all_barang_masuk();
//         $this->load->view('barang_masuk/index', $data);
//     }

//     public function create() {
//         $this->load->view('create');
//     }

    // public function store()
    // {
    //     $data = array(
    //         'nama_barang' => $this->input->post('nama_barang'),
    //         'jenis_barang' => $this->input->post('jenis_barang'),
    //         'jumlah' => $this->input->post('jumlah'),
    //         'masa_pakai' => $this->input->post('masa_pakai'),
    //         'status' => $this->input->post('status'),
    //         'tanggal_masuk' => $this->input->post('tanggal_masuk')
    //     );

    //     $this->m_barang->insert_barang_masuk($data, 'nama_barang');
    //     $this->m_barang->insert_barang_masuk($data, 'jenis_barang');
    //     $this->m_barang->insert_barang_masuk($data, 'jumlah');
    //     $this->m_barang->insert_barang_masuk($data, 'masa_pakai');
    //     $this->m_barang->insert_barang_masuk($data, 'status');
    //     $this->m_barang->insert_barang_masuk($data, 'nama_barang');
    //     redirect('barang_masuk');
    // }
}
?> 
