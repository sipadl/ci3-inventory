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
		$dataSubBahanBaku = $this->input->post('dagingPutih');
		// Menyiapkan data yang akan disimpan
		$data = array(
			'tanggal' => $tanggal ?? date('Y-m-d H:i:s'),
			'supplier' => $supplier,
			'wilayah' => 0,
		);

		// Menyimpan data menggunakan model
		$insert_id = $this->Main_model->insertAll('tbl_daging',$data);
		
		$datas = json_decode($dataSubBahanBaku, true);
		foreach($datas as $datax) {
			$is_exists = $this->db->query('select * from tbl_sub_daging where id_bahan_baku = '.$insert_id.' and spek = "'.$datax['spek'].'" ')->row_array();
			if($is_exists){
				$data = array( 'qty' => $is_exists['qty'] + floatval($datax['tbersih']) + floatval($datax['tbersih2']));
				$this->Main_model->updateAll('tbl_sub_daging', $data, $is_exists['id'] );
			} else {		
				$datax['id_bahan_baku'] = $insert_id;
				$datax['qty'] = floatval($datax['tbersih']) + floatval($datax['tbersih2']);
				$this->Main_model->insertAll('tbl_sub_daging',$datax);
			}
		}
		$this->session->set_flashdata('success', 'Your data has been saved successfully!');
		echo(json_encode($data));
       
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

	public function updateUser($id) {
		$data = $this->input->post();
		if($this->input->post('sign')) {
			$config_ttd['upload_path'] = FCPATH . 'upload/images';
			$config_ttd['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config_ttd);
			
			// Perform the upload for NPWP
			if (!$this->upload->do_upload('sign')) {
				// If upload fails, handle the error
				$error = $this->upload->display_errors();
				// Handle the error (e.g., display error message, redirect back to form)
				echo "Upload error TTD / Sign: $error";
				return; // Stop further execution
			}
			
			// Retrieve upload data for NPWP
			$ttd_data = $this->upload->data();
			$data['ttd'] = $ttd_data['file_name'];
		}
		$this->Main_model->updateAll('tbl_user', $data, $id);
		$this->session->set_flashdata('success', 'Your data has been saved successfully!');
		redirect('main/tambahUser');
	}

	public function deleteUser($id) {
		$this->Main_model->delete('tbl_user', $id);
		$this->session->set_flashdata('success', 'Your data has been removed successfully!');
		redirect('main/tambahUser');
	}
	public function deleteSupplier($id) {
		$this->Main_model->delete('tb_supplier', $id);
		$this->session->set_flashdata('success', 'Your data has been removed successfully!');
		redirect('main/tambahSupplier');
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
			$config_ttd['upload_path'] = FCPATH . 'upload/images';
			$config_ttd['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config_ttd);
			
			// Perform the upload for NPWP
			if (!$this->upload->do_upload('sign')) {
				// If upload fails, handle the error
				$error = $this->upload->display_errors();
				// Handle the error (e.g., display error message, redirect back to form)
				echo "Upload error TTD / Sign: $error";
				return; // Stop further execution
			}
			
			// Retrieve upload data for NPWP
			$ttd_data = $this->upload->data();
            // Jika validasi sukses, simpan data pengguna ke dalam database
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')), // Encrypt password
                'role' => $this->input->post('role'),
				'sign' => $ttd_data['file_name'],
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
			'no_rekening' => $this->input->post('no_rekening'),
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

	public function hapusSuplier($id) {
		$this->Main_model->delete('tbl_supplier', $id);
		redirect('main/supplier');
	}

	public function updateSuplier($id) {
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
			'no_rekening' => $this->input->post('no_rekening'),
			'an' => $this->input->post('an'),
			'npwp' => $npwp_data['file_name'], // Store NPWP filename in the database
			'no_ktp' => $ktp_data['file_name'], // Store KTP filename in the database
			'id_area' => $this->input->post('id_area'),
			'alamat' => $this->input->post('alamat')
		);
	
		// Insert data into the suppliers table through the model
		$this->Main_model->updateAll('tbl_supplier', $data, $id);

		$this->session->set_flashdata('success', 'Supplier berhasil diubah.');
	
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
		$bahanbaku = $this->Main_model->getBahanBakuBaru();
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
		$post_data['status'] = 0;
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
			$post_data['tanggal_rec'] = date('Y-m-d H:i:s');
			$post_data['status'] = 1;
			$insert = $this->Main_model->insertAll('tbl_sortir', $post_data);
            // Process form request
            // Misalnya, simpan data ke database atau lakukan tindakan lain yang diperlukan

            // Set flashdata untuk pesan sukses atau error
            $this->session->set_flashdata('success', 'Data Sortir berhasil ditambahkan.');

            // Redirect to index
            redirect('main/sortir');
        }
    }

	public function sortirUpdate($id, $status = null) {
		$post_data = $this->input->post();
		$sortir = $this->Main_model->getDataSortir($id);
		
		$post_data['status'] = 0;
		if($sortir[0]['tanggal_rec'] == date('Y-m-d H:i:s') ){
			$post_data['tanggal_rec2'] = date('Y-m-d H:i:s');
			$post_data['status'] = 0;
		} else if ($sortir[0]['tanggal_rec2'] == date('Y-m-d H:i:s') ?? $sortir[0]['tanggal_rec2'] != null ){
			$post_data['tanggal_rec3'] = date('Y-m-d H:i:s');
			$post_data['status'] = $status ?? 1;
		}

		$this->Main_model->updateAll('tbl_sortir', $post_data, $id);
		$this->session->set_flashdata('success', 'Data Sortir berhasil diubah.');

		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}

	public function sortirUpdateSimpan($id, $status = null) {
		$post_data = $this->input->post();
		$sortir = $this->Main_model->getDataSortir($id);

		
		if($sortir[0]['tanggal_rec'] == date('Y-m-d H:i:s') ){
			$post_data['tanggal_rec2'] = date('Y-m-d H:i:s');
		} else if ($sortir[0]['tanggal_rec2'] == date('Y-m-d H:i:s')){
			$post_data['tanggal_rec3'] = date('Y-m-d H:i:s');
		}
		$post_data['status'] = $status ?? 1;
		
		$this->Main_model->updateAll('tbl_sortir', $post_data, $id);
		$this->session->set_flashdata('success', 'Data Sortir berhasil diubah.');

		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}

	public function approveSortir($id) {
		$user_id = $this->session->userdata('id');
		$data = array('approved_by' => $user_id ,'status' => 1);
		$this->Main_model->updateAll('tbl_sortir', $data, $id);
		$this->session->set_flashdata('success', 'Data Sortir berhasil diapprove.');
		// redirect(base_url(), 'refresh');
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
		
	}

	public function approveSortirTL($id, $status) {
		$user_id = $this->session->userdata('id');
		$data = array('approved_by' => $user_id ,'status' => $status);
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

	public function rejectSortirProduksi($id) {
		$user_id = $this->session->userdata('id');
		$data = array('approved_by' => $user_id ,'status' => -1);
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
		$bahanbaku = $this->Main_model->getBahanBakuWithStatus('0,1,2,3,4,5');
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');

		$this->load->view('templates/header', $data);
        $this->load->view('pages/approval_sortir', array('sortir' => $sortir,'supplier' => $supplier, 'bahanbaku' => $bahanbaku));
        $this->load->view('templates/footer');
	}
	public function approval_produksi(){
		$data['title'] = 'Approval Produksi';
		$sortir = $this->Datadaging_model->getDataNoOrderWithWhere('tbl_sortir','status','2');
		$bahanbaku = $this->Main_model->getBahanBakuWithStatus('0,1,2,3,4,5');
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');

		$this->load->view('templates/header', $data);
        $this->load->view('pages/aproval_produksi', array('sortir' => $sortir,'supplier' => $supplier, 'bahanbaku' => $bahanbaku));
        $this->load->view('templates/footer');
	}
	public function approval_coasting(){
		$data['title'] = 'Approval Coasting';
		$sortir = $this->Datadaging_model->getDataNoOrderWithWhere('tbl_sortir','status','3');
		$bahanbaku = $this->Main_model->getBahanBakuWithStatus('0,1,2,3,4,5');
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');

		$this->load->view('templates/header', $data);
        $this->load->view('pages/approval_coasting', array('sortir' => $sortir,'supplier' => $supplier, 'bahanbaku' => $bahanbaku));
        $this->load->view('templates/footer');
	}
	public function approval_gm(){
		$data['title'] = 'Approval General Manager';
		$sortir = $this->Datadaging_model->getDataNoOrderWithWhere('tbl_sortir','status','3');
		$bahanbaku = $this->Main_model->getBahanBakuWithStatus('0,1,2,3,4,5');
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');

		$this->load->view('templates/header', $data);
        $this->load->view('pages/approval_gm', array('sortir' => $sortir,'supplier' => $supplier, 'bahanbaku' => $bahanbaku));
        $this->load->view('templates/footer');
	}

	public function pengajuan_dp(){
		$data['title'] = 'Pengajuan DP';
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');
		$datax = $this->Datadaging_model->getDataNoOrder('tbl_pengajuan');

		$this->load->view('templates/header', $data);
        $this->load->view('pages/pengajuan_dp',['supplier' => $supplier, 'data' => $datax ]);
        $this->load->view('templates/footer');
	}


	public function pengajuan_mt(){
		$data['title'] = 'Pengajuan DP';
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');
		$datax = $this->Datadaging_model->getDataNoOrder('tbl_pengajuan');

		$this->load->view('templates/header', $data);
        $this->load->view('pages/pengajuan_dp_mt',['supplier' => $supplier, 'data' => $datax ]);
        $this->load->view('templates/footer');
	}
	public function pengajuan_gm(){
		$data['title'] = 'Pengajuan DP';
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');
		$datax = $this->Datadaging_model->getDataNoOrder('tbl_pengajuan');

		$this->load->view('templates/header', $data);
        $this->load->view('pages/pengajuan_dp_gm',['supplier' => $supplier, 'data' => $datax ]);
        $this->load->view('templates/footer');
	}
	public function pengajuan_audit(){
		$data['title'] = 'Pengajuan DP';
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');
		$datax = $this->Datadaging_model->getDataNoOrder('tbl_pengajuan');

		$this->load->view('templates/header', $data);
        $this->load->view('pages/pengajuan_dp_audit',['supplier' => $supplier, 'data' => $datax ]);
        $this->load->view('templates/footer');
	}

	public function approval_pengajuan_gm(){
		$data['title'] = 'Pengajuan DP';
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');
		$datax = $this->Datadaging_model->getDataNoOrder('tbl_pengajuan');

		$this->load->view('templates/header', $data);
        $this->load->view('pages/approval_pengajuan_gm',['supplier' => $supplier, 'data' => $datax ]);
        $this->load->view('templates/footer');
	}

	public function laporan_root(){
		$data['title'] = 'Laporan Root';
		$supplier = $this->Main_model->get_laporan_root();
		$price = $this->Main_model->get_price();

		$this->load->view('templates/header', $data);
        $this->load->view('pages/laporan_root',['supplier' => $supplier, 'price' => $price ]);
        $this->load->view('templates/footer');
	}

	public function memo_subsidi(){
		$data['title'] = 'Memo Subsidi';
		$sortir = $this->Main_model->getTblMemo();
		$price = $this->Main_model->get_price();
		$memo = $this->Main_model->getTblMemo();



		$this->load->view('templates/header', $data);
        $this->load->view('pages/memo_subsidi',['sortir' => $sortir, 'price' => $price, 'memo' => $memo ]);
        $this->load->view('templates/footer');
	}

	public function memo_subsidi_by_gm(){
		$data['title'] = 'Approval Memo Subsidi';
		$sortir = $this->Main_model->getTblMemo();
		$price = $this->Main_model->get_price();
		$memo = $this->Main_model->getTblMemo();

		$this->load->view('templates/header', $data);
        $this->load->view('pages/approval_memo_by_gm',['sortir' => $sortir, 'price' => $price, 'memo' => $memo ]);
        $this->load->view('templates/footer');
	}

	public function penerimaan_bahan() 
	{
		$data['title'] = 'Penerimaan Bahan';
		$sortir = $this->Main_model->getTblMemo();
		$price = $this->Main_model->get_price();
		$memo = $this->Main_model->getTblMemo();



		$this->load->view('templates/header', $data);
		$this->load->view('pages/penerimaan_bahan',['sortir' => $sortir, 'price' => $price, 'memo' => $memo ]);
		$this->load->view('templates/footer');
	}

	

	public function input_memo_subdisi($id) {
		$data_post = $this->input->post();
		$data_post['id_sortir'] = $id;

		$this->Main_model->insertAll('tbl_memo', $data_post );
		
		$this->session->set_flashdata('success', 'Memo berhasil dibuat.');
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}

	public function approve_penerimaan_bahan_baku() {
		$data_post = $this->input->post();
		$user_id = $this->session->userdata('id');
		$data_post['approved_by'] = $user_id;
		$data_post['status'] = 1;
		$data_post['tanggal'] = date('Y-m-d H:i:s');

		$this->Main_model->insertAll('tbl_penerimaan', $data_post );
		$this->session->set_flashdata('success', 'Penerimaan Bahan Baku berhasil dibuat.');
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}

	public function approve_memo_subsidi($id) {
		$user_id = $this->session->userdata('id');
		$data = array('approved_by' => $user_id ,'status' => 4);
		$this->Main_model->updateAll('tbl_memo', $data, $id);
		$this->session->set_flashdata('success', 'Memo berhasil diapprove.');
		// redirect(base_url(), 'refresh');
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}

	public function approve_laporan_root($id) {
		$user_id = $this->session->userdata('id');
		$data = array('approved_by' => $user_id ,'status' => 1);
		$this->Main_model->updateAll('tbl_laporan', $data, $id);
		$this->session->set_flashdata('success', 'Laporan berhasil diapprove.');
		// redirect(base_url(), 'refresh');
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}

	public function penerimaan_bahan_baku(){
		$data['title'] = 'Penerimaan Bahan Baku';
		$sortir = $this->Datadaging_model->getDataNoOrder('tbl_sortir');

		$this->load->view('templates/header', $data);
        $this->load->view('pages/memo_subsidi',['sortir' => $sortir ]);
        $this->load->view('templates/footer');
	}

	public function approve_pengajuan_by_gm($id) {
		$user_id = $this->session->userdata('id');
		$data = array('approved_by' => $user_id ,'status' => 1);
		$this->Main_model->updateAll('tbl_pengajuan', $data, $id);
		$this->session->set_flashdata('success', 'Data Pengajuan berhasil diapprove.');
		// redirect(base_url(), 'refresh');
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}

	public function post_pengajuan_dp() {
		$data = $this->input->post();
		$data['created_at'] = date('Y-m-d H:i:s');
	
		// Konfigurasi upload
		$config['upload_path'] = FCPATH . 'upload/images';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
	
		// Lakukan upload untuk NPWP
		if (!$this->upload->do_upload('upload_images')) {
			// Tangani error upload
			$error = $this->upload->display_errors();
			echo $error; // Tampilkan pesan error
			return; // Hentikan eksekusi lebih lanjut
		} else {
			// Jika upload berhasil, simpan nama file ke dalam data
			$data['upload_images'] = $this->upload->data('file_name');
		}
	
		// Simpan data ke dalam database
		$this->Main_model->insertAll('tbl_pengajuan', $data);
		$this->session->set_flashdata('success', 'Data berhasil diinput.');
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}
	

	public function get_supplier($id) {
		$supplier = $this->db->query("SELECT * FROM tbl_supplier a 
        LEFT JOIN tbl_area b ON a.id_area = b.kode_area 
        WHERE a.kode_supplier = '" . $id . "'")->row_array();
		header('Content-Type: application/json');
    	echo json_encode($supplier);
	}

	public function post_laporan_root($id){
		$data_post = $this->input->post();
		$data_post['created_at'] = date('Y-m-d H:i:s');
		$data_post['id_sortir'] = $id;

		$this->Main_model->insertAll('tbl_laporan', $data_post);
		$this->session->set_flashdata('success', 'Laporan berhasil ditambahkan.');
		redirect($_SERVER['HTTP_REFERER'], 'refresh');

	}

	public function approve_memo_dp($id, $status)
	{
		// Pastikan Anda menginisialisasi $user_id dari sesi atau sumber lainnya
		$user_id = $this->session->userdata('user_id'); // contoh pengambilan ID pengguna dari sesi, sesuaikan dengan logika aplikasi Anda
		$data = array('approved_by' => $user_id, 'status' => $status, 'keterangan_approval' => $this->input->post('keterangan_approval'));
		$this->Main_model->updateAll('tbl_pengajuan', $data, $id);

		// Tambahkan pesan flash untuk memberi umpan balik kepada pengguna
		$message = ($status != '-1') ? 'Memo disetujui.' : 'Memo ditolak.'; // Pesan sesuai dengan status
		$this->session->set_flashdata('success', $message);

		// redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}


	public function approve_laporan($id) {
		$user_id = $this->session->userdata('id');
		$data = array('approved_by' => $user_id ,'status' => 1);
		$this->Main_model->updateAll('tbl_laporan', $data, $id);
		$this->session->set_flashdata('success', 'Data berhasil diapprove.');
		// redirect(base_url(), 'refresh');
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}
}
