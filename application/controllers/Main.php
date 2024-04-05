<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Memuat model dan menyimpannya dalam properti objek controller
        $this->load->model('Datadaging_model');
		$this->load->library('form_validation');
    }
    
    public function index() {
        $data['title'] = 'Admin Suplier';
        
        // Memanggil method getData dari model dan menyimpan hasilnya dalam variabel
        $daging = $this->Datadaging_model->getData('tbl_daging');
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');

        
        // Mengirimkan data ke view
        $this->load->view('templates/header', $data);
        $this->load->view('pages/admin', array('daging' => $daging, 'supplier' => $supplier));
        $this->load->view('templates/footer');
    }

	public function tambahDaging() {
        // Tangkap data POST
        $tanggal = $this->input->post('tanggal');
        $supplier = $this->input->post('supplier');
        $spesifikasiDagingMerah = $this->input->post('dagingMerah');
		$spesifikasi = $this->input->post('spesifikasi');
        $spesifikasiDagingPutih = $this->input->post('dagingPutih');
        $qty = $this->input->post('qty');

        // Lakukan sesuatu dengan data yang diterima
        // Contoh: Simpan ke database, tampilkan, dll.

        // Memanggil model di dalam controller
		$this->load->model('DataDaging_model');

		// Menyiapkan data yang akan disimpan
		$data = array(
			'tanggal' => $tanggal,
			'supplier' => $supplier,
			'spesifikasi' => $spesifikasi,
			'daging_merah' => $spesifikasiDagingMerah,
			'daging_putih' => $spesifikasiDagingPutih
		);

		// Menyimpan data menggunakan model
		$insert_id = $this->DataDaging_model->addDaging($data);

        redirect('/');
    }

	public function formUser() {
		$data['title'] = 'User';
        
        // Memanggil method getData dari model dan menyimpan hasilnya dalam variabel
        $role = $this->Datadaging_model->getDataNoOrder('tbl_role');
		$user = $this->Datadaging_model->getDataNoOrder('tbl_user');
        
        // Mengirimkan data ke view
        $this->load->view('templates/header', $data);
        $this->load->view('pages/user', array('role' => $role, 'user' => $user));
        $this->load->view('templates/footer');
    }

	public function formSuplier() {
		$data['title'] = 'Supplier';
    
        // Memanggil method getData dari model dan menyimpan hasilnya dalam variabel
		$suppliers = $this->Datadaging_model->getDataNoOrder('tbl_supplier');
        
        // Mengirimkan data ke view
        $this->load->view('templates/header', $data);
        $this->load->view('pages/suplier', array('suppliers' => $suppliers));
        $this->load->view('templates/footer');
    }

	public function tambahUser() {
        // Validasi input
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali form tambah user
            $this->load->view('tambah_user');
        } else {
            // Jika validasi sukses, simpan data pengguna ke dalam database
            $data = array(
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT), // Encrypt password
                'role' => $this->input->post('role')
            );

            // Panggil model untuk menyimpan data pengguna
            $this->Datadaging_model->tambahUser($data);

            // Redirect ke halaman sukses atau halaman lain
            redirect('main/formUser');
        }
    }

	public function tambahSuplier() {
        // Mendapatkan data dari form
        $data = array(
            'nama_supplier' => $this->input->post('nama_supplier'),
            'bank' => $this->input->post('bank'),
            'nomor' => $this->input->post('nomor'),
            'an' => $this->input->post('an'),
            'npwp' => $this->input->post('npwp'),
            'id_area' => $this->input->post('id_area'),
            'no_ktp' => $this->input->post('no_ktp'),
            'alamat' => $this->input->post('alamat')
        );

        // Memasukkan data ke dalam tabel suppliers melalui model
        $this->Datadaging_model->insert_supplier($data);

        // Redirect kembali ke halaman index
        redirect('main/formSuplier');
    }
}
