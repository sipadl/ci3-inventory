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
		$insert_id = $this->Main_model->insertAll('tbl_daging', $data);
		// $insert_id = 149;
		$datas = json_decode($dataSubBahanBaku, true);
		// Check if $insert_id is valid
		if ($insert_id !== false) {
			// Fetch $is_exists outside the loop
			foreach ($datas as $datax) {
				$ada = $this->db->query("SELECT * FROM tbl_sub_daging WHERE id_bahan_baku = ? and spek = ? and spek2 is null", array($insert_id, $datax['spek']))->row_array();
				if($ada !=  null ) {
					$qtys = 0;
						if($ada['spek'] == $datax['spek']) {
							if($ada['tipe'] == 0 && $datax['tipe'] == 1 && !$ada['spek2']) {
								$this->Main_model->updateAll('tbl_sub_daging', array(
									'spesifikasi_bahan' => $datax['spek'],
									'spek2' => $datax['spek'],
									'bungkus2' => $datax['bungkus'],
									'tkotor2' => $datax['tkotor'],
									'tbersih2' => $datax['tbersih'],
									'qty' => floatval($datax['tbersih']) + floatval($ada['qty']), 
									)
									,$ada['id']);
								} else {
									$datax['spesifikasi_bahan'] = '';
									$datax['id_bahan_baku'] = $insert_id;
									$datax['qty'] = 0;
									$this->Main_model->insertAll('tbl_sub_daging', $datax);
									$qtys = floatval($ada['qty']) + floatval($datax['tbersih']);
									$this->Main_model->updateAll('tbl_sub_daging', array('qty' => $qtys), $ada['id']);
									
							}
					// 		if($datax['tipe'] == 1 ){
					// 			if($ada['spek2']) {
					// 				$datax['spesifikasi_bahan'] = '';
					// 				$datax['id_bahan_baku'] = $insert_id;
					// 				$datax['qty'] = 0;
					// 				$this->Main_model->insertAll('tbl_sub_daging', $datax);
					// 				$qtys = floatval($ada['qty']) + floatval($datax['tbersih']);
					// 				$this->Main_model->updateAll('tbl_sub_daging', array('qty' => $qtys), $ada['id']);
					// 			} else {
					// 				$this->Main_model->updateAll('tbl_sub_daging', array(
					// 					'spesifikasi_bahan' => $datax['spek'],
					// 					'spek2' => $datax['spek'],
					// 					'bungkus2' => $datax['bungkus'],
					// 					'tkotor2' => $datax['tkotor'],
					// 					'tbersih2' => $datax['tbersih'],
					// 					'qty' => floatval($datax['tbersih']) + floatval($ada['qty']), 
					// 					)
					// 					,$ada['id']);
					// 				}
					// 			}
					// 			else {
					// 				if($datax['tipe'] == 0) {
					// 				$datax['spesifikasi_bahan'] = '';
					// 				$datax['id_bahan_baku'] = $insert_id;
					// 				$datax['spesifikasi_bahan'] = '';
					// 				$datax['qty'] = 0;
					// 				$this->Main_model->insertAll('tbl_sub_daging', $datax);
					// 				$qtys = floatval($ada['qty']) + floatval($datax['tbersih']);
					// 				$this->Main_model->updateAll('tbl_sub_daging', array('qty' => $qtys), $ada['id']);
					// 		// }
					// 	} else {
					// 		$datax['spesifikasi_bahan'] = '';
					// 		$datax['id_bahan_baku'] = $insert_id;
					// 		$datax['qty'] = floatval($datax['tbersih']);
					// 		$this->Main_model->insertAll('tbl_sub_daging', $datax);
					// 	}
					// }
					}
					// else if($merah != null) {
					// 	$datax['spesifikasi_bahan'] = '';
					// 	$datax['id_bahan_baku'] = $insert_id;
					// 	$datax['spesifikasi_bahan'] = '';
					// 	$datax['qty'] = 0;
					// 	$this->Main_model->insertAll('tbl_sub_daging', $datax);
					// 	$qtys = floatval($merah['qty']) + floatval($datax['tbersih']);
					// 	$this->Main_model->updateAll('tbl_sub_daging', array('qty' => $qtys), $merah['id']);
					} else {
							$datax['spesifikasi_bahan'] = $datax['spek'];
							$datax['id_bahan_baku'] = $insert_id;
							$datax['qty'] = floatval($datax['tbersih']);
							// if($datax['tipe'] == 1) {
							// 	$datax['tipe'] = 0;
							// 	$datax['tbersih2'] = $datax['tbersih'];
							// 	$datax['tkotor2'] = $datax['tkotor'];
							// 	$datax['bungkus2'] = $datax['bungkus'];
							// 	$datax['spek2'] = $datax['spek'];
							// }
							$this->Main_model->insertAll('tbl_sub_daging', $datax);
				}
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
			$data['sign'] = $ttd_data['file_name'];
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
		// redirect('main/sortir');
		redirect($_SERVER['HTTP_REFERER'], 'refresh');

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
		
		$this->Main_model->updateAll('tbl_daging', array('keterangan' => $this->input->post('keterangan'), 'status' => 1), $id);
		// $this->Main_model->updateAll('tbl_sortir', array('status' => 3), $id);
		$this->session->set_flashdata('success', 'Bahan Baku berhasil diapprove.');
		redirect($_SERVER['HTTP_REFERER'], 'refresh');

	}
	
	public function mainReject($id){
		$this->Main_model->updateAll('tbl_daging', array('keterangan' => $this->input->post('keterangan'), 'status' => -1), $id);
		// $this->Main_model->updateAll('tbl_sortir', array('status' => -1), $id);
		$this->session->set_flashdata('success', 'Bahan Baku berhasil direject.');
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
		// redirect("main/adminUser");
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
            // redirect('main/sortir');
			redirect($_SERVER['HTTP_REFERER'], 'refresh');

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
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
    }

	public function fullsortirPostCorrection($id) {
		$post_data = $this->input->post();
		// var_dump($post_data);
		// die();
		// $sortir = $this->Main_model->getDataSortir($id);
		// Get all post data
		$post_data['tanggal_rec'] = date('Y-m-d H:i:s');
		$post_data['status'] = 3;
		$post_data['id_bb'] = $id;
		$post_data['is_corection'] = 1;
		$insert = $this->Main_model->insertAll('tbl_sortir', $post_data);
		$this->session->set_flashdata('success', 'Data Sortir berhasil ditambahkan.');
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
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
		} else {
			$post_data['tanggal_rec2'] = ' ';
			$post_data['tanggal_rec3'] = ' ';
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
		$data = array('approved_by' => $user_id ,'status' => 3, 'keterangan' => $this->input->post('keterangan'));
		$this->Main_model->updateAll('tbl_sortir', $data, $id);
		$this->session->set_flashdata('success', 'Data Sortir berhasil diapprove.');
		// redirect(base_url(), 'refresh');
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}

	public function rejectSortirProduksi($id) {
		var_dump($this->input->post());
		$user_id = $this->session->userdata('id');
		$data = array('approved_by' => $user_id ,'status' => -1, 'keterangan' => $this->input->post('keterangan'));
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
		$bahanbaku = $this->Main_model->getBahanBakuWithStatus('-1,0,1,2,3,4,5');
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');

		$this->load->view('templates/header', $data);
        $this->load->view('pages/approval_sortir', array('sortir' => $sortir,'supplier' => $supplier, 'bahanbaku' => $bahanbaku));
        $this->load->view('templates/footer');
	}
	public function approval_produksi(){
		$data['title'] = 'Approval Produksi';
		$sortir = $this->Datadaging_model->getDataNoOrderWithWhere('tbl_sortir','status','2');
		$bahanbaku = $this->Main_model->getBahanBakuWithStatus('-1,0,1,2,3,4,5');
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');

		$this->load->view('templates/header', $data);
        $this->load->view('pages/aproval_produksi', array('sortir' => $sortir,'supplier' => $supplier, 'bahanbaku' => $bahanbaku));
        $this->load->view('templates/footer');
	}
	public function approval_coasting(){
		$data['title'] = 'Approval Coasting';
		$sortir = $this->Datadaging_model->getDataNoOrderWithWhere('tbl_sortir','status','3');
		$bahanbaku = $this->Main_model->getBahanBakuWithStatus('3,4,5');
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');

		$this->load->view('templates/header', $data);
        $this->load->view('pages/approval_coasting', array('sortir' => $sortir,'supplier' => $supplier, 'bahanbaku' => $bahanbaku));
        $this->load->view('templates/footer');
	}
	public function approval_gm(){
		$data['title'] = 'Approval General Manager';
		if($this->input->post()) {
			$data['start'] = $this->input->post('start');
			$data['end'] = $this->input->post('end');
		} else {
			$data['start'] = date('Y-m-d');
			$data['end'] = date('Y-m-d');
		}

		$datax = $this->Main_model->query_laporan($data['start'], $data['end']);
		$sortir = $this->Datadaging_model->getDataNoOrderWithWhere('tbl_sortir','status','3');
		$bahanbaku = $this->Main_model->getBahanBakuWithStatus('0,1,2,3,4,5');
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');
		$price = $this->Main_model->get_price();


		$this->load->view('templates/header', $data);
        $this->load->view('pages/approval_gm', array('datax' => $datax, 'price' => $price, 'sortir' => $sortir,'supplier' => $supplier, 'bahanbaku' => $bahanbaku));
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
		$data['title'] = 'Pengajuan GM';
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');
		$datax = $this->Datadaging_model->getDataNoOrder('tbl_pengajuan');

		$this->load->view('templates/header', $data);
        $this->load->view('pages/pengajuan_dp_gm',['supplier' => $supplier, 'data' => $datax ]);
        $this->load->view('templates/footer');
	}
	public function pengajuan_audit(){
		$data['title'] = 'Pengajuan Audit';
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');
		$datax = $this->Datadaging_model->getDataNoOrder('tbl_pengajuan');

		$this->load->view('templates/header', $data);
        $this->load->view('pages/pengajuan_dp_audit',['supplier' => $supplier, 'data' => $datax ]);
        $this->load->view('templates/footer');
	}

	public function approval_pengajuan_gm(){
		$data['title'] = 'Pengajuan GM';
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');
		$datax = $this->Datadaging_model->getDataNoOrder('tbl_pengajuan');

		$this->load->view('templates/header', $data);
        $this->load->view('pages/approval_pengajuan_gm',['supplier' => $supplier, 'data' => $datax ]);
        $this->load->view('templates/footer');
	}

	public function laporan_root(){

		$data['title'] = 'Laporan Root';
		if($this->input->post()) {
			$data['start'] = $this->input->post('start');
			$data['end'] = $this->input->post('end');
		} else {
			$data['start'] = date('Y-m-d');
			$data['end'] = date('Y-m-d');
		}

		$supplier = $this->Main_model->get_laporan_root();
		$datax = $this->Main_model->query_laporan($data['start'], $data['end']);
		$supplier2 = $this->Main_model->get_laporan_root2();
		$price = $this->Main_model->get_price();


		$bahanbaku = $this->Main_model->getBahanBakuWithDate($data['start'], $data['end']);

		$this->load->view('templates/header', $data);
        $this->load->view('pages/laporan_root',['datax' => $datax ,'supplier' => $supplier, 'supolier' => $supplier2,  'price' => $price, 'bahanbaku' => $bahanbaku]);
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

		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}


	public function approve_laporan($id) {
		$user_id = $this->session->userdata('id');
		$data = array('approved_by' => $user_id ,'status' => 1);
		$this->Main_model->updateAll('tbl_laporan', $data, $id);
		$this->session->set_flashdata('success', 'Data berhasil diapprove.');
		// redirect(base_url(), 'refresh');
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}

	public function aproval_tl_bb () {
		$data['title'] = 'Approval TL Bahan Baku';
        $daging = $this->Datadaging_model->getData('tbl_daging');

		$this->load->view('templates/header', $data);
        $this->load->view('pages/aproval_tl_bb',['daging' => $daging ]);
        $this->load->view('templates/footer');
	}

	public function upload_coasting() {
		$data['title'] = 'Upload Coasting';
		$file = $this->Main_model->kontrol1();

		$this->load->view('templates/header', $data);
        $this->load->view('pages/k1',['file' => $file ]);
        $this->load->view('templates/footer');
	}

	public function file_gm() {
		$data['title'] = 'File GM';
		$file = $this->Main_model->kontrol1();

		$this->load->view('templates/header', $data);
        $this->load->view('pages/k2',['file' => $file ]);
        $this->load->view('templates/footer');
	}

	public function upload_coastings() {
        // Lakukan proses unggah file dan catatan di sini
        // Misalnya, simpan file di server dan catatan ke dalam database

        // Contoh proses unggah file
		$config['upload_path'] = FCPATH . 'upload/images';
		$config['allowed_types'] = 'pdf|doc|docx|jpg|jpeg|png|xls|xlsx|zip'; // Jenis file yang diizinkan
        $config['max_size'] = 2048; // Maksimum ukuran file dalam KB

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            // Gagal unggah file, tampilkan pesan error
			$error = $this->upload->display_errors();
            echo $error;
			return;
        } else {
            // File berhasil diunggah, proses catatan dan penyimpanan ke database jika diperlukan
            $data = array(
                'file' => $this->upload->data('file_name'),
                'note' => $this->input->post('note'), // Ambil catatan dari form
				'created_at' => date('Y-m-d H:i:s'),
            );
			$this->Main_model->insertAll('tbl_file', $data);
			$this->session->set_flashdata('success', 'Data berhasil ditambahkan.');

			redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
    }

	public function upload_coastings_2($id) {
        // Lakukan proses unggah file dan catatan di sini
        // Misalnya, simpan file di server dan catatan ke dalam database

        // Contoh proses unggah file
		$config['upload_path'] = FCPATH . 'upload/images';
		$config['allowed_types'] = 'pdf|doc|docx|jpg|jpeg|png|xls|xlsx|zip'; // Jenis file yang diizinkan
        $config['max_size'] = 2048; // Maksimum ukuran file dalam KB

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            // Gagal unggah file, tampilkan pesan error
			$error = $this->upload->display_errors();
            echo $error;
			return;
        } else {
            // File berhasil diunggah, proses catatan dan penyimpanan ke database jika diperlukan
            $data = array(
                'file' => $this->upload->data('file_name'),
                'note' => $this->input->post('note'), // Ambil catatan dari form
				'created_at' => date('Y-m-d H:i:s'),
            );
			$this->Main_model->updateAll('tbl_file', $data, $id);
			$this->session->set_flashdata('success', 'Data berhasil diubah.');

			redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
    }

	public function approval_upload($id){
		$this->Main_model->updateAll('tbl_file', ['status' => 1], $id);
		$this->session->set_flashdata('success', 'Data berhasil diapprove.');
		
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}
	public function reject_upload($id){
		$this->Main_model->updateAll('tbl_file', ['status' => -1], $id);
		$this->session->set_flashdata('success', 'Data berhasil direject.');

		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}
	

	public function download($file_id) {
		// Ambil informasi file dari database berdasarkan ID
		$data = $this->db->query('SELECT * FROM tbl_file WHERE id = '.$file_id)->row_array();
	
		// Tentukan nama file dan path ke file yang sesungguhnya
		$file_name = $data['file'];
		$file_path = FCPATH.'/upload/images/'.$file_name; // Sesuaikan dengan path ke direktori penyimpanan file
	
		// Set header untuk file yang akan didownload
		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=\"".$file_name."\"");
		readfile($file_path);
	}
	
}
