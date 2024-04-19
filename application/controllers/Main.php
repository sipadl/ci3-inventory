<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Memuat model dan menyimpannya dalam properti objek controller
        $this->load->model('Datadaging_model');
        $this->load->model('Main_model');
		$this->load->library('form_validation');
    }

	public function index() {
		$this->load->view('pages/login');
	}

	public function login() {
		// Ambil data dari form
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// Lakukan proses login
		if ($this->Main_model->login($username, $password)) {
			echo 'disini';
			// Redirect ke halaman dashboard atau halaman lainnya jika login berhasil
			redirect('main/adminUser');
		} else {
			// Jika login gagal, tampilkan pesan error
			$this->session->set_flashdata('error', 'Username atau password salah.');
			redirect('main');
		}
    }

    public function logout() {
		$this->Datadaging_model->logout();
		redirect('main');

        // Lakukan proses logout
        // Misalnya, hapus session dan redirect ke halaman login
    }
    
    public function adminUser() {
        $data['title'] = 'Admin Receiving';
        
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
		$qty = 0;
		$dataDagingMerah = json_decode($spesifikasiDagingMerah);
		$spesifikasiDagingPutih = $this->input->post('dagingPutih');
		foreach($dataDagingMerah as $dag) {
			$qty += $dag->tbersih;
		}
		$dataDagingPutih = json_decode($spesifikasiDagingPutih);
		foreach($dataDagingPutih as $dag) {
			$qty += $dag->tbersih;
		}
		$spesifikasi = $this->input->post('spesifikasi');
		$this->load->model('DataDaging_model');

		// Menyiapkan data yang akan disimpan
		$data = array(
			'tanggal' => $tanggal,
			'supplier' => $supplier,
			'spesifikasi' => $spesifikasi,
			'daging_merah' => $spesifikasiDagingMerah,
			'daging_putih' => $spesifikasiDagingPutih,
			'wilayah' => 0,
			'qty' => $qty,
		);

		// Menyimpan data menggunakan model
		$insert_id = $this->DataDaging_model->addDaging($data);
		$this->session->set_flashdata('success', 'Your data has been saved successfully!');
       
    }

	public function formUser() {
		$data['title'] = 'User';
        
        // Memanggil method getData dari model dan menyimpan hasilnya dalam variabel
        $role = $this->Datadaging_model->getDataNoOrder('tbl_role');
		$user = $this->Datadaging_model->getDataNoOrder('tbl_user');
		$wilayah = $this->Datadaging_model->getDataNoOrder('tbl_area');
        
        // Mengirimkan data ke view
        $this->load->view('templates/header', $data);
        $this->load->view('pages/user', array('role' => $role, 'user' => $user, 'wilayah' => $wilayah));
        $this->load->view('templates/footer');
    }

	public function formSuplier() {
		$data['title'] = 'Supplier';
    
        // Memanggil method getData dari model dan menyimpan hasilnya dalam variabel
		$suppliers = $this->Datadaging_model->getDataNoOrder('tbl_supplier');
        $kodeWilayah = $this->Datadaging_model->getDataNoOrder('tbl_area');
		$kota = $this->Datadaging_model->getDataNoOrder('tbl_kota');
        // Mengirimkan data ke view
        $this->load->view('templates/header', $data);
        $this->load->view('pages/suplier', array('suppliers' => $suppliers, 'wilayah' => $kodeWilayah, 'kota' => $kota));
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
            redirect('main/formUser');

        } else {
            // Jika validasi sukses, simpan data pengguna ke dalam database
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')), // Encrypt password
                'role' => $this->input->post('role'),
                'wilayah' => json_encode($this->input->post('wilayah')),
				'tanggal' => date('Y-m-d H:i:s')
            );
			

			
            // Panggil model untuk menyimpan data pengguna
            $this->Datadaging_model->tambahUser($data);

            // Redirect ke halaman sukses atau halaman lain
			$this->session->set_flashdata('success', 'Your data has been saved successfully!');
            redirect('main/formUser');
        }
    }

	public function updateMiniSortir($id) {
		$data = $this->input->post();
		$this->Main_model->updateAll('tbl_sortir', $data, $id);
		$this->session->set_flashdata('success', 'Your data has been saved successfully!');
		redirect('main/sortir');
	}

	public function tambahSuplier() {
		// File upload configuration for NPWP
		$config_npwp['upload_path'] = FCPATH . 'upload/images';
		$config_npwp['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config_npwp);
		
		// Perform the upload for NPWP
		if (!$this->upload->do_upload('npwp')) {
			// If upload fails, handle the error
			$error = $this->upload->display_errors();
			// Handle the error (e.g., display error message, redirect back to form)
			echo "Upload error (NPWP): $error";
			return; // Stop further execution
		}
		
		// Retrieve upload data for NPWP
		$npwp_data = $this->upload->data();
	
		// File upload configuration for KTP
		$config_ktp['upload_path'] = FCPATH . 'upload/images';
		$config_ktp['allowed_types'] = 'gif|jpg|png';
		// Reset the upload library with new configuration for KTP
		$this->upload->initialize($config_ktp);
		
		// Perform the upload for KTP
		if (!$this->upload->do_upload('no_ktp')) {
			// If upload fails, handle the error
			$error = $this->upload->display_errors();
			// Handle the error (e.g., display error message, redirect back to form)
			echo "Upload error (KTP): $error";
			return; // Stop further execution
		}
	
		// Retrieve upload data for KTP
		$ktp_data = $this->upload->data();
	
		// Retrieve other form data
		$data = array(
			'kode_supplier' => $this->input->post('kode_supplier'),
			'nama_supplier' => $this->input->post('nama_supplier'),
			'bank' => $this->input->post('bank'),
			'nomor' => $this->input->post('nomor'),
			'an' => $this->input->post('an'),
			'npwp' => $npwp_data['file_name'], // Store NPWP filename in the database
			'no_ktp' => $ktp_data['file_name'], // Store KTP filename in the database
			'id_area' => $this->input->post('id_area'),
			'alamat' => $this->input->post('alamat')
		);
	
		// Insert data into the suppliers table through the model
		$this->Datadaging_model->insert_supplier($data);
		$this->session->set_flashdata('success', 'Supplier berhasil ditambahkan.');
	
		// Redirect back to the supplier form
		redirect('main/formSuplier');
	}
	
	public function mainApprove($id) {
		$this->Datadaging_model->aprrovalData($id);
		redirect("main/adminUser");
	}
	
	public function mainReject($id){
		$this->Datadaging_model->rejctData($id);
		redirect("main/adminUser");
	}

	public function getWilayahById($id){
		$data = $this->Main_model->getWilayahById($id);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function sortir(){
		$data['title'] = 'Sortir';
		$sortir = $this->Main_model->getDataSortir(null);
		$bahanbaku = $this->Main_model->getBahanBaku();
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');

		$this->load->view('templates/header', $data);
        $this->load->view('pages/sortir', array('sortir' => $sortir,'supplier' => $supplier, 'bahanbaku' => $bahanbaku));
        $this->load->view('templates/footer');
	}

	public function sortirPost() {
        // Form validation rules
        $this->form_validation->set_rules('kode_supplier', 'Kode Supplier', 'required');
        $this->form_validation->set_rules('tanggal_rec', 'Tanggal Rec', 'required');

        // Get all post data
        $post_data = $this->input->post();
        if ($this->form_validation->run() === FALSE) {
			// Load view add.php with post data
            $this->load->view('main/sortir', $post_data);
        } else {
			$insert = $this->Main_model->insertAll('tbl_sortir', $post_data);
            // Process form request
            // Misalnya, simpan data ke database atau lakukan tindakan lain yang diperlukan

            // Set flashdata untuk pesan sukses atau error
            $this->session->set_flashdata('success', 'Data Sortir berhasil ditambahkan.');

            // Redirect to index
            redirect('main/sortir');
        }
    }

	public function fullsortirPost() {
        // Form validation rules
        $this->form_validation->set_rules('kode_supplier', 'Kode Supplier', 'required');
        $this->form_validation->set_rules('tanggal_rec', 'Tanggal Rec', 'required');

        // Get all post data
        $post_data = $this->input->post();
        if ($this->form_validation->run() === FALSE) {
			// Load view add.php with post data
            redirect('main/sortir', $post_data);
        } else {
			$post_data['tanggal_rec2'] = date('Y-m-d H:i:s');
			$post_data['tanggal_rec3'] = date('Y-m-d H:i:s');
			$insert = $this->Main_model->insertAll('tbl_sortir', $post_data);
            // Process form request
            // Misalnya, simpan data ke database atau lakukan tindakan lain yang diperlukan

            // Set flashdata untuk pesan sukses atau error
            $this->session->set_flashdata('success', 'Data Sortir berhasil ditambahkan.');

            // Redirect to index
            redirect('main/sortir');
        }
    }

	public function sortirUpdate($id) {
		$post_data = $this->input->post();
		$sortir = $this->Main_model->getDataSortir($id);
		
		if($sortir['tanggal_rec2'] == null ){
			$post_data['tanggal_rec2'] = date('Y-m-d H:i:s');
		} else {
			$post_data['tanggal_rec3'] = date('Y-m-d H:i:s');
		}
		$this->Main_model->updateAll('tbl_sortir', $post_data, $id);
		$this->session->set_flashdata('success', 'Data Sortir berhasil diubah.');

		redirect('main/sortir');
	}

	public function approveSortir($id) {
		$user_id = $this->session->userdata('id');
		$data = array('approved_by' => $user_id ,'status' => 1);
		$this->Main_model->updateAll('tbl_sortir', $data, $id);
		$this->session->set_flashdata('success', 'Data Sortir berhasil diapprove.');
		// redirect(base_url(), 'refresh');
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
		
	}

	public function approveSortirTL($id) {
		$user_id = $this->session->userdata('id');
		$data = array('approved_by' => $user_id ,'status' => 2);
		$this->Main_model->updateAll('tbl_sortir', $data, $id);
		$this->session->set_flashdata('success', 'Data Sortir berhasil diapprove.');
		// redirect(base_url(), 'refresh');
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
		
	}

	public function approveSortirProduksi($id) {
		$user_id = $this->session->userdata('id');
		$data = array('approved_by' => $user_id ,'status' => 3);
		$this->Main_model->updateAll('tbl_sortir', $data, $id);
		$this->session->set_flashdata('success', 'Data Sortir berhasil diapprove.');
		// redirect(base_url(), 'refresh');
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}

	public function approveSortirCoast($id) {
		$user_id = $this->session->userdata('id');
		$data = array('approved_by' => $user_id ,'status' => 4);
		$this->Main_model->updateAll('tbl_sortir', $data, $id);
		$this->session->set_flashdata('success', 'Data Sortir berhasil diapprove.');
		// redirect(base_url(), 'refresh');
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}

	public function aproval_sortir(){
		$data['title'] = 'Approval Sortir';
		$sortir = $this->Datadaging_model->getDataNoOrderWithWhere('tbl_sortir','status','1');
		$bahanbaku = $this->Main_model->getBahanBakuWithStatus('0,1');
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');

		$this->load->view('templates/header', $data);
        $this->load->view('pages/approval_sortir', array('sortir' => $sortir,'supplier' => $supplier, 'bahanbaku' => $bahanbaku));
        $this->load->view('templates/footer');
	}
	public function approval_produksi(){
		$data['title'] = 'Approval Produksi';
		$sortir = $this->Datadaging_model->getDataNoOrderWithWhere('tbl_sortir','status','2');
		$bahanbaku = $this->Main_model->getBahanBakuWithStatus('2');
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');

		$this->load->view('templates/header', $data);
        $this->load->view('pages/aproval_produksi', array('sortir' => $sortir,'supplier' => $supplier, 'bahanbaku' => $bahanbaku));
        $this->load->view('templates/footer');
	}
	public function approval_coasting(){
		$data['title'] = 'Approval Coasting';
		$sortir = $this->Datadaging_model->getDataNoOrderWithWhere('tbl_sortir','status','3');
		$bahanbaku = $this->Main_model->getBahanBakuWithStatus('3');
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');

		$this->load->view('templates/header', $data);
        $this->load->view('pages/approval_coasting', array('sortir' => $sortir,'supplier' => $supplier, 'bahanbaku' => $bahanbaku));
        $this->load->view('templates/footer');
	}
	public function approval_gm(){
		$data['title'] = 'Approval General Manager';
		$sortir = $this->Datadaging_model->getDataNoOrderWithWhere('tbl_sortir','status','3');
		$bahanbaku = $this->Main_model->getBahanBakuWithStatus('4');
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');

		$this->load->view('templates/header', $data);
        $this->load->view('pages/approval_gm', array('sortir' => $sortir,'supplier' => $supplier, 'bahanbaku' => $bahanbaku));
        $this->load->view('templates/footer');
	}
}
