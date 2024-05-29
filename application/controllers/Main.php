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
		// jika user belum login (atau sesi expired)
		$this->load->view('pages/login');
	}

	public function beranda() {
		check_login();
		
		$data['title'] = 'Beranda';
        $this->load->view('templates/header', $data);
		$this->load->view('pages/beranda');
        $this->load->view('templates/footer');
	}

	public function login() {
		// Ambil data dari form
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// Lakukan proses login
		if ($this->Main_model->login($username, $password)) {
			// Redirect ke halaman dashboard atau halaman lainnya jika login berhasil
			redirect('main/beranda');
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
		check_login();
        $data['title'] = 'Admin Receiving';
        
        // Memanggil method getData dari model dan menyimpan hasilnya dalam variabel
		if(user()['role_name'] == 'master_admin') {
			$daging = $this->Datadaging_model->getData('tbl_daging');
			$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');
		} else {
			$this->db->from('tbl_daging');
			$this->db->where_in('tbl_supplier.id_area', user()['wilayah']);
			$this->db->join('tbl_supplier', 'tbl_supplier.kode_supplier = tbl_daging.supplier', 'left');
			$daging = $this->db->get('tbl_daging')->result_array();
			$supplier = $this->Datadaging_model->getDataNoOrderWithWhere('tbl_supplier', 'id_area', user()['wilayah'], 'where_in');
		}
        
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
					}
					} else {
							$datax['spesifikasi_bahan'] = $datax['spek'];
							$datax['id_bahan_baku'] = $insert_id;
							$datax['qty'] = floatval($datax['tbersih']);
							$this->Main_model->insertAll('tbl_sub_daging', $datax);
				}
			}
		}

		$this->session->set_flashdata('success', 'Your data has been saved successfully!');
		echo(json_encode($data));
       
    }

	public function formUser() {
		check_login();
		$data['title'] = 'User';
        
        $role = $this->Datadaging_model->getDataNoOrder('tbl_role');
		$user = $this->Datadaging_model->getData('tbl_user');
		$wilayah = $this->Datadaging_model->getDataNoOrder('tbl_area');
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/user', array('role' => $role, 'user' => $user, 'wilayah' => $wilayah));
        $this->load->view('templates/footer');
    }

	public function formArea() {
		check_login();
		$data['title'] = 'Area';
        
        $area = $this->Datadaging_model->getDataNoOrder('tbl_area');
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/area', array('area' => $area,));
        $this->load->view('templates/footer');
    }

	public function tambahArea() {
        $this->form_validation->set_rules('nama_area', 'Nama Area', 'required');
		$this->form_validation->set_rules('kode_area', 'Kode Area', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('main/formArea');

        } else {
            $data = array(
                'nama_area' => $this->input->post('nama_area'),
                'kode_area' => $this->input->post('kode_area'),
				//'tanggal' => date('Y-m-d H:i:s')
            );

			$insert = $this->Main_model->insertAll('tbl_area', $data);
			$this->session->set_flashdata('success', 'Your data has been saved successfully!');
            redirect('main/formArea');
        }
    }

	public function updateArea($id) {
		$data = $this->input->post();
		$this->Main_model->updateAll('tbl_area', $data, $id, 'id_area');
		$this->session->set_flashdata('success', 'Your data has been saved successfully!');
		redirect('main/formArea');
	}

	public function deleteArea($id) {
		$this->Main_model->delete('tbl_area', $id, 'id_area');
		$this->session->set_flashdata('success', 'Your data has been removed successfully!');
		redirect('main/formArea');
	}

	public function formHarga() {
		check_login();
		$data['title'] = 'Harga';
        
        $price = $this->Datadaging_model->getDataNoOrder('tbl_price');        
		$wilayah = $this->Datadaging_model->getDataNoOrder('tbl_area');

        $this->load->view('templates/header', $data);
        $this->load->view('pages/harga', array('price' => $price, 'wilayah' => $wilayah));
        $this->load->view('templates/footer');
    }

	public function tambahHarga() {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		$this->form_validation->set_rules('tanggal', 'Harga',);

        if ($this->form_validation->run() == FALSE) {
            redirect('main/formHarga');

        } else {
            $data = array(
                'nama_produk' => $this->input->post('nama_produk'),
                'harga' => $this->input->post('harga'),
				'tanggal' => $this->input->post('tanggal'),
				'id_area' => $this->input->post('id_area'),
				//'tanggal' => date('Y-m-d H:i:s')
            );

			$insert = $this->Main_model->insertAll('tbl_price', $data);
			$this->session->set_flashdata('success', 'Your data has been saved successfully!');
            redirect('main/formHarga');
        }
    }

	public function updateHarga($id) {
		$data = $this->input->post();
		$this->Main_model->updateAll('tbl_price', $data, $id, 'id_price');
		$this->session->set_flashdata('success', 'Your data has been saved successfully!');
		redirect('main/formHarga');
	}

	public function deleteHarga($id) {
		$this->Main_model->delete('tbl_price', $id, 'id_price');
		$this->session->set_flashdata('success', 'Your data has been removed successfully!');
		redirect('main/formHarga');
	}

	public function formSuplier() {
		check_login();
		$data['title'] = 'Supplier';
    
		$suppliers = $this->Datadaging_model->getDataNoOrder('tbl_supplier');
        $kodeWilayah = $this->Datadaging_model->getDataNoOrder('tbl_area');
		$kota = $this->Datadaging_model->getDataNoOrder('tbl_kota');
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
			
			if (!$this->upload->do_upload('sign')) {
				$error = $this->upload->display_errors();
				echo "Upload error TTD / Sign: $error";
			}
			
			$ttd_data = $this->upload->data();
			$data['sign'] = $ttd_data['file_name'];
		}
		if($this->input->post('password')) {
			if( $this->input->post('password') == null || $this->input->post('password') == '' ) {
				unset($data['password']);
			}
		}
		if($this->input->post('wilayah')) {
			$data['wilayah'] = json_encode($data['wilayah']);
		}
		$this->Main_model->updateAll('tbl_user', $data, $id);
		$this->session->set_flashdata('success', 'Your data has been saved successfully!');
		redirect('main/formUser');
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
        $this->form_validation->set_rules('username', 'Username', 'required');
        // $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('main/tambahUser');

        } else {
			$config_ttd['upload_path'] = FCPATH . 'upload/images';
			$config_ttd['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config_ttd);
			
			if (!$this->upload->do_upload('sign')) {
				$error = $this->upload->display_errors();
				echo "Upload error TTD / Sign: $error";
			}
			
			$ttd_data = $this->upload->data();
            $data = array(
                'username' => $this->input->post('username'),
                // 'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')), // Encrypt password
                'role' => $this->input->post('role'),
				'sign' => $ttd_data['file_name'],
                'wilayah' => json_encode($this->input->post('wilayah')),
				'tanggal' => date('Y-m-d H:i:s')
            );
			

            $this->Datadaging_model->tambahUser($data);
			$this->session->set_flashdata('success', 'Your data has been saved successfully!');
            redirect('main/formUser');
        }
    }

	public function updateMiniSortir($id) {
		$data = $this->input->post();
		$this->Main_model->updateAll('tbl_sortir', $data, $id);
		$this->session->set_flashdata('success', 'Your data has been saved successfully!');
		redirect($_SERVER['HTTP_REFERER'], 'refresh');

	}

	public function tambahSuplier() {
		$config_npwp['upload_path'] = FCPATH . 'upload/images';
		$config_npwp['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config_npwp);
		
		if (!$this->upload->do_upload('npwp')) {
			$error = $this->upload->display_errors();
			echo "Upload error (NPWP): $error";
			return; // Stop further execution
		}
		
		$npwp_data = $this->upload->data();
	
		$config_ktp['upload_path'] = FCPATH . 'upload/images';
		$config_ktp['allowed_types'] = 'gif|jpg|png';
		$this->upload->initialize($config_ktp);
		
		if (!$this->upload->do_upload('no_ktp')) {
			$error = $this->upload->display_errors();
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
	
		$this->Datadaging_model->insert_supplier($data);
		$this->session->set_flashdata('success', 'Supplier berhasil ditambahkan.');
	
		redirect('main/formSuplier');
	}

	public function hapusSuplier($id) {
		$this->Main_model->delete('tbl_supplier', $id);
		redirect('main/supplier');
	}

	public function updateSupplier($id) {
		$config_npwp['upload_path'] = FCPATH . 'upload/images';
		$config_npwp['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config_npwp);
		
		if (!$this->upload->do_upload('npwp')) {
			$error = $this->upload->display_errors();
			echo "Upload error (NPWP): $error";
			return; // Stop further execution
		}
		
		$npwp_data = $this->upload->data();
	
		$config_ktp['upload_path'] = FCPATH . 'upload/images';
		$config_ktp['allowed_types'] = 'gif|jpg|png';
		$this->upload->initialize($config_ktp);
		
		if (!$this->upload->do_upload('no_ktp')) {
			$error = $this->upload->display_errors();
			echo "Upload error (KTP): $error";
			return; // Stop further execution
		}
		$ktp_data = $this->upload->data();
	
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
	
		$this->Main_model->updateAll('tbl_supplier', $data, $id, 'id_supplier');

		$this->session->set_flashdata('success', 'Supplier berhasil diubah.');
		redirect('main/formSuplier');
	}
	
	public function mainApprove($id) {		
		$this->Main_model->updateAll('tbl_daging', array('keterangan' => $this->input->post('keterangan'), 'status' => 1), $id);
		$this->session->set_flashdata('success', 'Bahan Baku berhasil diapprove.');
		redirect($_SERVER['HTTP_REFERER'], 'refresh');

	}
	
	public function mainReject($id){
		$this->Main_model->updateAll('tbl_daging', array('keterangan' => $this->input->post('keterangan'), 'status' => -1), $id);
		$this->session->set_flashdata('success', 'Bahan Baku berhasil direject.');
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}

	public function getWilayahById($id){
		$data = $this->Main_model->getWilayahById($id);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function sortir(){
		check_login();
		$data['title'] = 'Sortir';
		$sortir = $this->Main_model->getDataSortir(null);
		$bahanbaku = $this->Main_model->getBahanBakuBaru();
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');
		$daging = $this->Datadaging_model->getDataNoOrder('tbl_daging');

		$this->load->view('templates/header', $data);
        $this->load->view('pages/sortir', array('sortir' => $sortir,'supplier' => $supplier, 'daging' => $daging, 'bahanbaku' => $bahanbaku));
        $this->load->view('templates/footer');
	}

	// SIMPAN SEMENTARA
	public function sortirPost() {
        // Form validation rules
        $this->form_validation->set_rules('kode_supplier', 'Kode Supplier', 'required');
        $this->form_validation->set_rules('tanggal_rec1', 'Tanggal Rec', 'required');

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

	// SIMPAN PERMANEN
	public function fullsortirPost() {
        // Form validation rules
        $this->form_validation->set_rules('kode_supplier', 'Kode Supplier', 'required');
        $this->form_validation->set_rules('tanggal_rec1', 'Tanggal Rec', 'required');

        // Get all post data
        $post_data = $this->input->post();
        if ($this->form_validation->run() === FALSE) {
			// Load view add.php with post data
            redirect('main/sortir', $post_data);
        } else {
			//$post_data['tanggal_rec'] = date('Y-m-d H:i:s');
			//$post_data['tanggal_rec1'] = date('Y-m-d H:i:s');
			$post_data['status'] = 1;
			$insert = $this->Main_model->insertAll('tbl_sortir', $post_data);
            // Process form request
            // Misalnya, simpan data ke database atau lakukan tindakan lain yang diperlukan
			$insert_data = $this->db->query('select * from tbl_sortir order by id desc')->row_array();

			// recap price berdasarkan area user
			// kemudian masukkan ke 
			$wil = implode(',', user()['wilayah']);
			$price = $this->db->query('select * from tbl_price')->result_array();
			/*$price = $this->db->query(
				'select * from tbl_price
				left join tbl_area on tbl_area.id_area = tbl_price.id_area
				where tbl_area.kode_area in ('.$wil.')'
			)->result_array();*/
			foreach($price as $p) {
				$post_data = [];
				$post_data['id_sortir'] = $insert_data['id'];
				$post_data['nama_produk'] = $p['nama_produk'];
				$post_data['harga'] = $p['harga'];
				$post_data['id_area'] = $p['id_area'];
				$insert = $this->Main_model->insertAll('tbl_price_tr', $post_data);
			}

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
		if($post_data['tanggal_rec'] != date('Y-m-d') ){
			//$post_data['tanggal_rec2'] = date('Y-m-d');
			$post_data['status'] = 0;
		} else if ($sortir[0]['tanggal_rec2'] == date('Y-m-d') ?? $sortir[0]['tanggal_rec2'] != null ){
			//$post_data['tanggal_rec3'] = date('Y-m-d');
			$post_data['status'] = $status ?? 1;
		}
		/*if($post_data['tanggal_rec2'] != null){
			$post_data['tanggal_rec3'] = date('Y-m-d');
			$post_data['status'] = $status ?? 1;
		} else {
			$post_data['tanggal_rec2'] = date('Y-m-d');
			$post_data['status'] = 0;
		}*/

		$this->Main_model->updateAll('tbl_sortir', $post_data, $id);
		$this->session->set_flashdata('success', 'Data Sortir berhasil diubah.');

		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}

	public function sortirUpdateSimpan($id, $status = null) {
		$post_data = $this->input->post();
		$sortir = $this->Main_model->getDataSortir($id);

		
		/*if($sortir[0]['tanggal_rec'] == date('Y-m-d H:i:s') ){
			$post_data['tanggal_rec2'] = date('Y-m-d H:i:s');
		} else if ($sortir[0]['tanggal_rec2'] == date('Y-m-d H:i:s')){
			$post_data['tanggal_rec3'] = date('Y-m-d H:i:s');
		} else {
			$post_data['tanggal_rec2'] = ' ';
			$post_data['tanggal_rec3'] = ' ';
		}*/
		/*if($sortir[0]['tanggal_rec'] != date('Y-m-d') ){
			$post_data['tanggal_rec2'] = date('Y-m-d');
		} else if ($sortir[0]['tanggal_rec2'] != date('Y-m-d')){
			$post_data['tanggal_rec3'] = date('Y-m-d');
		} else {
			$post_data['tanggal_rec2'] = '';
			$post_data['tanggal_rec3'] = '';
		}*/
		if($sortir[0]['tanggal_rec2'] != null) {
			//$post_data['tanggal_rec3'] = date('Y-m-d');
		} else {
			//$post_data['tanggal_rec2'] = date('Y-m-d');
		}
		$post_data['status'] = $status ?? 1;
		$this->Main_model->updateAll('tbl_sortir', $post_data, $id);

		// recap price berdasarkan area user
		// kemudian masukkan ke 
		$wil = implode(',', user()['wilayah']);
		$price = $this->db->query('select * from tbl_price')->result_array();
		/*$price = $this->db->query(
			'select * from tbl_price
			left join tbl_area on tbl_area.id_area = tbl_price.id_area
			where tbl_area.kode_area in ('.$wil.')'
		)->result_array();*/
		foreach($price as $p) {
			$post_data = [];
			$post_data['id_sortir'] = $id;
			$post_data['nama_produk'] = $p['nama_produk'];
			$post_data['harga'] = $p['harga'];
			$post_data['id_area'] = $p['id_area'];
			$insert = $this->Main_model->insertAll('tbl_price_tr', $post_data);
		}

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
		check_login();
		$data['title'] = 'Approval Sortir';

		if(user()['role_name'] == 'master_admin') {
			$sortir = $this->Datadaging_model->getDataNoOrderWithWhere('tbl_sortir','status','1');
			$bahanbaku = $this->Main_model->getBahanBakuWithStatus('-1,0,1,2,3,4,5');
			$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');
			$daging = $this->Datadaging_model->getDataNoOrder('tbl_daging');
		} else {
			$this->db->from('tbl_sortir');
			$this->db->where('tbl_sortir.status', '1');
			$this->db->where_in('tbl_supplier.id_area', user()['wilayah']);
			$this->db->join('tbl_supplier', 'tbl_supplier.kode_supplier = tbl_sortir.kode_supplier', 'left');
			$sortir = $this->db->get('tbl_sortir')->result_array();

			$val = '-1,0,1,2,3,4,5';
			$wil = implode(',', user()['wilayah']);
			$bahanbaku = $this->db->query(
				"select td.*, td.keterangan as keterangan_bahan_baku, td.id as id_bahan_baku,
				ts.id as id_sortir, ts.* from tbl_daging td
				left join tbl_sortir ts on td.id = ts.id_bb
				left join tbl_supplier sup on sup.kode_supplier = ts.kode_supplier
				where ts.status in(".$val.")
				and sup.id_area in(".$wil.")
				and is_corection = 0
				order by ts.id desc"
			)->result_array();

			$this->db->from('tbl_daging');
			$this->db->where_in('tbl_supplier.id_area', user()['wilayah']);
			$this->db->join('tbl_supplier', 'tbl_supplier.kode_supplier = tbl_daging.supplier', 'left');
			$daging = $this->db->get('tbl_daging')->result_array();
			$supplier = $this->Datadaging_model->getDataNoOrderWithWhere('tbl_supplier', 'id_area', user()['wilayah'], 'where_in');
		}

		$this->load->view('templates/header', $data);
        $this->load->view('pages/approval_sortir', array('sortir' => $sortir,'supplier' => $supplier, 'daging' => $daging, 'bahanbaku' => $bahanbaku));
        $this->load->view('templates/footer');
	}
	public function approval_produksi(){
		check_login();
		$data['title'] = 'Approval Produksi';

		if(user()['role_name'] == 'master_admin') {
			$sortir = $this->Datadaging_model->getDataNoOrderWithWhere('tbl_sortir','status','2');
			$bahanbaku = $this->Main_model->getBahanBakuWithStatus('-1,0,1,2,3,4,5');
			$daging = $this->Datadaging_model->getDataNoOrder('tbl_daging');
			$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');
		} else {
			$this->db->from('tbl_sortir');
			$this->db->where('tbl_sortir.status', '2');
			$this->db->where_in('tbl_supplier.id_area', user()['wilayah']);
			$this->db->join('tbl_supplier', 'tbl_supplier.kode_supplier = tbl_sortir.kode_supplier', 'left');
			$sortir = $this->db->get('tbl_sortir')->result_array();

			$val = '-1,0,1,2,3,4,5';
			$wil = implode(',', user()['wilayah']);
			$bahanbaku = $this->db->query(
				"select td.*, td.keterangan as keterangan_bahan_baku, td.id as id_bahan_baku,
				ts.id as id_sortir, ts.*, ts.status as status_sortir, td.status as status_daging
				from tbl_daging td
				left join tbl_sortir ts on td.id = ts.id_bb
				left join tbl_supplier sup on sup.kode_supplier = ts.kode_supplier
				where ts.status in(".$val.")
				and sup.id_area in(".$wil.")
				and is_corection = 0
				order by ts.id desc"
			)->result_array();

			$this->db->from('tbl_daging');
			$this->db->where_in('tbl_supplier.id_area', user()['wilayah']);
			$this->db->join('tbl_supplier', 'tbl_supplier.kode_supplier = tbl_daging.supplier', 'left');
			$daging = $this->db->get('tbl_daging')->result_array();
			$supplier = $this->Datadaging_model->getDataNoOrderWithWhere('tbl_supplier', 'id_area', user()['wilayah'], 'where_in');
		}

		$this->load->view('templates/header', $data);
        $this->load->view('pages/aproval_produksi', array('sortir' => $sortir,'supplier' => $supplier, 'daging' => $daging, 'bahanbaku' => $bahanbaku));
        $this->load->view('templates/footer');
	}
	public function approval_produksi_bb(){
		check_login();
		$data['title'] = 'Approval Produksi Bahan Baku';

		if(user()['role_name'] == 'master_admin') {
			$daging = $this->Datadaging_model->getData('tbl_daging','status','1');
	
		} else {
			$this->db->from('tbl_daging');
			$this->db->where_in('tbl_supplier.id_area', user()['wilayah']);
			$this->db->join('tbl_supplier', 'tbl_supplier.kode_supplier = tbl_daging.supplier', 'left');
			$daging = $this->db->get('tbl_daging')->result_array();

		}

		$this->load->view('templates/header', $data);
        $this->load->view('pages/aproval_produksi_bb',['daging' => $daging ]);
        $this->load->view('templates/footer');
	}
	public function approval_coasting(){
		check_login();
		$data['title'] = 'Approval Coasting';

		if(user()['role_name'] == 'master_admin') {
			$sortir = $this->Datadaging_model->getDataNoOrderWithWhere('tbl_sortir','status','3');
			$bahanbaku = $this->Main_model->getBahanBakuWithStatus('3,4,5');
			$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');

			$daging = $this->Datadaging_model->getDataNoOrder('tbl_daging');

		} else {
			$this->db->from('tbl_sortir');
			$this->db->where('tbl_sortir.status', '3');
			$this->db->where_in('tbl_supplier.id_area', user()['wilayah']);
			$this->db->join('tbl_supplier', 'tbl_supplier.kode_supplier = tbl_sortir.kode_supplier', 'left');
			$sortir = $this->db->get('tbl_sortir')->result_array();

			$val = '3,4,5';
			$wil = implode(',', user()['wilayah']);
			$bahanbaku = $this->db->query(
				"select td.*, td.keterangan as keterangan_bahan_baku, td.id as id_bahan_baku,
				ts.id as id_sortir, ts.* from tbl_daging td
				left join tbl_sortir ts on td.id = ts.id_bb
				left join tbl_supplier sup on sup.kode_supplier = ts.kode_supplier
				where ts.status in(".$val.")
				and sup.id_area in(".$wil.")
				and is_corection = 0
				order by ts.id desc"
			)->result_array();

			$supplier = $this->Datadaging_model->getDataNoOrderWithWhere('tbl_supplier', 'id_area', user()['wilayah'], 'where_in');

			$daging = $this->Datadaging_model->getDataNoOrder('tbl_daging');
		}

		$this->load->view('templates/header', $data);
        $this->load->view('pages/approval_coasting', array('sortir' => $sortir,'supplier' => $supplier, 'bahanbaku' => $bahanbaku, 'daging' => $daging));
        $this->load->view('templates/footer');
	}
	public function approval_gm(){
		check_login();
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
		check_login();
		$data['title'] = 'Pengajuan DP';
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');
		//$datax = $this->Datadaging_model->getDataNoOrder('tbl_pengajuan');
		$datax = $this->db->query(
			'SELECT tbl_pengajuan.*, tbl_supplier.nama_supplier FROM tbl_pengajuan
			LEFT JOIN tbl_supplier ON tbl_supplier.kode_supplier = tbl_pengajuan.supplier'
		)->result_array();

		$this->load->view('templates/header', $data);
        $this->load->view('pages/pengajuan_dp',['supplier' => $supplier, 'data' => $datax ]);
        $this->load->view('templates/footer');
	}


	public function pengajuan_mt(){
		check_login();
		$data['title'] = 'Pengajuan DP';
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');
		$datax = $this->Datadaging_model->getDataNoOrder('tbl_pengajuan');

		$this->load->view('templates/header', $data);
        $this->load->view('pages/pengajuan_dp_mt',['supplier' => $supplier, 'data' => $datax ]);
        $this->load->view('templates/footer');
	}
	public function pengajuan_gm(){
		check_login();
		$data['title'] = 'Approval Pengajuan';
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');
		$datax = $this->Datadaging_model->getDataNoOrder('tbl_pengajuan');

		$this->load->view('templates/header', $data);
        $this->load->view('pages/pengajuan_dp_gm',['supplier' => $supplier, 'data' => $datax ]);
        $this->load->view('templates/footer');
	}
	public function pengajuan_audit(){
		check_login();
		$data['title'] = 'Pengajuan Audit';
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');
		$datax = $this->Datadaging_model->getDataNoOrder('tbl_pengajuan');

		$this->load->view('templates/header', $data);
        $this->load->view('pages/pengajuan_dp_audit',['supplier' => $supplier, 'data' => $datax ]);
        $this->load->view('templates/footer');
	}

	public function approval_pengajuan_gm(){
		check_login();
		$data['title'] = 'Pengajuan GM';
		$supplier = $this->Datadaging_model->getDataNoOrder('tbl_supplier');
		$datax = $this->Datadaging_model->getDataNoOrder('tbl_pengajuan');

		$this->load->view('templates/header', $data);
        $this->load->view('pages/approval_pengajuan_gm',['supplier' => $supplier, 'data' => $datax ]);
        $this->load->view('templates/footer');
	}

	public function laporan_root(){
		check_login();
		$data['title'] = 'Laporan Root';
		if($this->input->post()) {
			$data['start'] = $this->input->post('start');
			$data['end'] = $this->input->post('end');
		} else {
			$data['start'] = date('Y-m-d');
			$data['end'] = date('Y-m-d');
		}

		if(user()['role_name'] == 'master_admin') {
			$supplier = $this->Main_model->get_laporan_root();
			$datax = $this->Main_model->query_laporan($data['start'], $data['end']);
			$supplier2 = $this->Main_model->get_laporan_root2();
			$price = $this->Main_model->get_price();
			
			//$bahanbaku = $this->Main_model->getBahanBakuWithDate($data['start'], $data['end']);
			$bahanbaku = $this->Main_model->getBahanBakuWithStatus('4');

			$daging = $this->Datadaging_model->getData('tbl_daging');
		} else {
			$wil = implode(',', user()['wilayah']);

			$supplier = $this->db->query(
				"select *,d.id as id_laporan, d.status as status_laporan from tbl_supplier a 
				left join tbl_sortir b
				on a.kode_supplier = b.kode_supplier 
				join tbl_daging c on c.id = b.id_bb 
				left join tbl_laporan d on b.id_bb = d.id_sortir
				where a.id_area in (".$wil.")
				"
			)->result_array();

			$datax = $this->Main_model->query_laporan($data['start'], $data['end']);

			$supplier2 = $this->db->query(
				"select * from tbl_daging a 
				left join tbl_sortir b on a.id  = b.id_bb 
				left join tbl_laporan c on c.id_sortir  = b.id
				left join tbl_supplier d on d.kode_supplier = a.supplier
				where d.id_area in (".$wil.")
				"
			)->result_array();

			$price = $this->db->query(
				'select * from tbl_price
				left join tbl_area on tbl_area.id_area = tbl_price.id_area
				where tbl_area.kode_area in ('.$wil.')'
			)->result_array();

			$bahanbaku = $this->db->query(
				"select td.*, ts.status as status_sortir, td.keterangan as keterangan_bahan_baku, td.id as id_bahan_baku,
				ts.id as id_sortir, ts.*
				from tbl_daging td
				left join tbl_sortir ts on td.id = ts.id_bb
				left join tbl_supplier sup on sup.kode_supplier = td.supplier
				where ts.tanggal_rec1 >= ? and ts.tanggal_rec1 <= ? and ts.status >= 3
				and sup.id_area in (".$wil.") and is_corection = 0
				order by ts.id desc"
			, [$data['start'], $data['end']])->result_array();

			$this->db->from('tbl_daging');
			$this->db->where_in('tbl_supplier.id_area', user()['wilayah']);
			$this->db->join('tbl_supplier', 'tbl_supplier.kode_supplier = tbl_daging.supplier', 'left');
			$daging = $this->db->get('tbl_daging')->result_array();
		}

		$this->load->view('templates/header', $data);
        $this->load->view('pages/laporan_root',['datax' => $datax ,'supplier' => $supplier, 'supolier' => $supplier2,  'price' => $price, 'bahanbaku' => $bahanbaku, 'daging' => $daging]);
        $this->load->view('templates/footer');
	}
	public function lap_bulananbb(){
		check_login();
		$data['title'] = 'Laporan Bulanan';
		if($this->input->post()) {
			$data['start'] = $this->input->post('start');
			$data['end'] = $this->input->post('end');
		} else {
			$data['start'] = date('Y-m-d');
			$data['end'] = date('Y-m-d');
		}

		if(user()['role_name'] == 'master_admin') {
			$supplier = $this->Main_model->get_laporan_root();
			$datax = $this->Main_model->query_laporan($data['start'], $data['end']);
			$supplier2 = $this->Main_model->get_laporan_root2();
			$price = $this->Main_model->get_price();
			
			//$bahanbaku = $this->Main_model->getBahanBakuWithDate($data['start'], $data['end']);
			$bahanbaku = $this->Main_model->getBahanBakuWithStatus('4');

			$daging = $this->Datadaging_model->getData('tbl_daging');
		} else {
			$wil = implode(',', user()['']);

			$supplier = $this->db->query(
				"select *,d.id as id_laporan, d.status as status_laporan from tbl_supplier a 
				left join tbl_sortir b
				on a.kode_supplier = b.kode_supplier 
				join tbl_daging c on c.id = b.id_bb 
				left join tbl_laporan d on b.id_bb = d.id_sortir
			
				"
			)->result_array();

			$datax = $this->Main_model->query_laporan($data['start'], $data['end']);

			$supplier2 = $this->db->query(
				"select * from tbl_daging a 
				left join tbl_sortir b on a.id  = b.id_bb 
				left join tbl_laporan c on c.id_sortir  = b.id
				left join tbl_supplier d on d.kode_supplier = a.supplier"
			)->result_array();

			$price = $this->db->query(
				'select * from tbl_price
				left join tbl_area on tbl_area.id_area = tbl_price.id_area
				where tbl_area.kode_area '
			)->result_array();

			$bahanbaku = $this->db->query(
				"select td.*, ts.status as status_sortir, td.keterangan as keterangan_bahan_baku, td.id as id_bahan_baku,
				ts.id as id_sortir, ts.*, b.subsidi as subsidi
				from tbl_daging td
				left join tbl_sortir ts on td.id = ts.id_bb
				left join tbl_supplier sup on sup.kode_supplier = td.supplier
				left join tbl_memo b on ts.id = b.id_sortir
				where ts.tanggal_rec1 >= ? and ts.tanggal_rec1 <= ? and ts.status >= 3
				and sup.id_area and is_corection = 0
				order by ts.id desc"
			, [$data['start'], $data['end']])->result_array();

			$this->db->from('tbl_daging');
			$this->db->where_in('tbl_supplier.id_area');
			$this->db->join('tbl_supplier', 'tbl_supplier.kode_supplier = tbl_daging.supplier', 'left');
			$daging = $this->db->get('tbl_daging')->result_array();
		}

		$this->load->view('templates/header', $data);
        $this->load->view('pages/bulanan_bb',['datax' => $datax ,'supplier' => $supplier, 'supolier' => $supplier2,  'price' => $price, 'bahanbaku' => $bahanbaku, 'daging' => $daging]);
        $this->load->view('templates/footer');
	}

	public function memo_subsidi(){
		check_login();
		$data['title'] = 'Memo Subsidi';
		$sortir = $this->Main_model->getTblMemo();
		$price = $this->Main_model->get_price();
		$memo = $this->Main_model->getTblMemo();



		$this->load->view('templates/header', $data);
        $this->load->view('pages/memo_subsidi',['sortir' => $sortir, 'price' => $price, 'memo' => $memo ]);
        $this->load->view('templates/footer');
	}

	public function memo_subsidi_by_gm(){
		check_login();
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
		check_login();
		$data['title'] = 'Penerimaan Bahan';

		if(user()['role_name'] == 'master_admin') {
			$sortir = $this->Main_model->getTblMemo();
			$price = $this->Main_model->get_price();
			$memo = $this->Main_model->getTblMemo();
		} else {
			$wil = implode(',', user()['wilayah']);
			$sortir = $this->db->query(
				'select
					a.*,
					c.*,
					a.id as ids,
					a.kode_supplier as supplier,
					b.status as status_memo,
					b.id as id_memo,
					subsidi
				from
					tbl_sortir a
				left join tbl_memo b on
					a.id = b.id_sortir
				join tbl_daging c on c.id = a.id_bb
				left join tbl_supplier d on d.kode_supplier = a.kode_supplier
				where is_corection = 0
				and d.id_area in ('.$wil.')
				order by a.id desc'
			)->result_array();

			$price = $this->db->query(
				'select * from tbl_price
				left join tbl_area on tbl_area.id_area = tbl_price.id_area
				where tbl_area.kode_area in ('.$wil.')'
			)->result_array();

			$memo = $this->db->query(
				'select
					a.*,
					c.*,
					a.id as ids,
					a.kode_supplier as supplier,
					b.status as status_memo,
					b.id as id_memo,
					subsidi
				from
					tbl_sortir a
				left join tbl_memo b on
					a.id = b.id_sortir
				join tbl_daging c on c.id = a.id_bb
				left join tbl_supplier d on d.kode_supplier = a.kode_supplier
				where is_corection = 0
				and d.id_area in ('.$wil.')'
			)->result_array();
		}


		$this->load->view('templates/header', $data);
		$this->load->view('pages/penerimaan_bahan',['sortir' => $sortir, 'price' => $price, 'memo' => $memo ]);
		$this->load->view('templates/footer');
	}
	public function penerimaan_bahan_admin_bb() 
	{
		check_login();
		$data['title'] = 'REKAPITULASI PEMBELIAN BAHAN BAKU FRESH';

		if(user()['role_name'] == 'master_admin') {
			$sortir = $this->Main_model->getTblMemo();
			$price = $this->Main_model->get_price();
			$memo = $this->Main_model->getTblMemo();

			$bahanbaku = $this->Main_model->getBahanBakuWithStatus('4');
		} else {
			$wil = implode(',', user()['wilayah']);
			$sortir = $this->db->query(
				'select
					a.*,
					c.*,
					a.id as ids,
					a.kode_supplier as supplier,
					b.status as status_memo,
					b.id as id_memo,
					subsidi
				from
					tbl_sortir a
				left join tbl_memo b on
					a.id = b.id_sortir
				join tbl_daging c on c.id = a.id_bb
				left join tbl_supplier d on d.kode_supplier = a.kode_supplier
				where is_corection = 0
				and d.id_area in ('.$wil.')'
			)->result_array();

			$price = $this->db->query(
				'select * from tbl_price
				left join tbl_area on tbl_area.id_area = tbl_price.id_area
				where tbl_area.kode_area in ('.$wil.')'
			)->result_array();

			$memo = $this->db->query(
				'select
					a.*,
					c.*,
					a.id as ids,
					a.kode_supplier as supplier,
					b.status as status_memo,
					b.id as id_memo,
					subsidi
				from
					tbl_sortir a
				left join tbl_memo b on
					a.id = b.id_sortir
				join tbl_daging c on c.id = a.id_bb
				left join tbl_supplier d on d.kode_supplier = a.kode_supplier
				where is_corection = 0
				and d.id_area in ('.$wil.')'
			)->result_array();

			$bahanbaku = $this->db->query(
				"select td.*, ts.status as status_sortir, td.keterangan as keterangan_bahan_baku, td.id as id_bahan_baku,
				ts.id as id_sortir, ts.*
				from tbl_daging td
				left join tbl_sortir ts on td.id = ts.id_bb
				left join tbl_supplier sup on sup.kode_supplier = td.supplier
				where ts.status >= 3
				and sup.id_area in (".$wil.") and is_corection = 0
				order by ts.id desc"
			)->result_array();
		}


		$this->load->view('templates/header', $data);
		$this->load->view('pages/bahan_baku',['sortir' => $sortir, 'price' => $price, 'memo' => $memo, 'bahanbaku' => $bahanbaku]);
		$this->load->view('templates/footer');
	}
	

	public function input_memo_subdisi($id) {
		$data_post = $this->input->post();
		$data_post['id_sortir'] = $id;

		$this->Main_model->insertAll('tbl_memo', $data_post );
		
		$this->session->set_flashdata('success', 'Memo berhasil dibuat.');
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}

	public function input_tambahan($id) {
		$data_post = $this->input->post();
		$data_post['id'] = $id;

		$this->Main_model->updateAll('tbl_sortir', $data_post, $id);
		
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
		check_login();
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
		check_login();
		$data['title'] = 'Approval TL Bahan Baku';

		if(user()['role_name'] == 'master_admin') {
			$daging = $this->Datadaging_model->getData('tbl_daging');
		} else {
			$this->db->from('tbl_daging');
			$this->db->where_in('tbl_supplier.id_area', user()['wilayah']);
			$this->db->join('tbl_supplier', 'tbl_supplier.kode_supplier = tbl_daging.supplier', 'left');
			$daging = $this->db->get('tbl_daging')->result_array();
		}

		$this->load->view('templates/header', $data);
        $this->load->view('pages/aproval_tl_bb',['daging' => $daging ]);
        $this->load->view('templates/footer');
	}

	public function upload_coasting() {
		check_login();
		$data['title'] = 'Upload Coasting';
		$file = $this->Main_model->kontrol1();

		$this->load->view('templates/header', $data);
        $this->load->view('pages/k1',['file' => $file ]);
        $this->load->view('templates/footer');
	}
	public function upload_bb() {
		check_login();
		$data['title'] = 'Upload Bahan Baku';
		$file = $this->Main_model->kontrol2();

		$this->load->view('templates/header', $data);
        $this->load->view('pages/bahan_baku_upload',['file' => $file ]);
        $this->load->view('templates/footer');
	}

	public function file_gm() {
		check_login();
		$data['title'] = 'Approval Laporan Root';
		$file = $this->Main_model->kontrol1();

		$this->load->view('templates/header', $data);
        $this->load->view('pages/k2',['file' => $file ]);
        $this->load->view('templates/footer');
	}
	
	public function file_bb() {
		check_login();
		$data['title'] = 'Approval Laporan Bahan Baku';
		$file = $this->Main_model->kontrol2();

		$this->load->view('templates/header', $data);
        $this->load->view('pages/k3',['file' => $file ]);
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
				'status' => 0,
                'note' => $this->input->post('note'), // Ambil catatan dari form
				'created_at' => date('Y-m-d H:i:s'),
            );
			$this->Main_model->updateAll('tbl_file', $data, $id);
			$this->session->set_flashdata('success', 'Data berhasil diubah.');

			redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
    }
	
	public function upload_bahan_baku_dua() {
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
			$this->Main_model->insertAll('tbl_file_2', $data);
			$this->session->set_flashdata('success', 'Data berhasil ditambahkan.');

			redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
    }

	public function upload_bb_dua($id) {
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
				'status' => 0,
                'note' => $this->input->post('note'), // Ambil catatan dari form
				'created_at' => date('Y-m-d H:i:s'),
            );
			$this->Main_model->updateAll('tbl_file_2', $data, $id);
			$this->session->set_flashdata('success', 'Data berhasil diubah.');

			redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
    }
	public function upload_bahan_baku_2($id) {
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
				'status' => 0,
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

	public function approval_upload_bb($id){
		$this->Main_model->updateAll('tbl_file_2', ['status' => 1], $id);
		$this->session->set_flashdata('success', 'Data berhasil diapprove.');
		
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}
	public function reject_upload_bb($id){
		$this->Main_model->updateAll('tbl_file_2', ['status' => -1], $id);
		$this->session->set_flashdata('success', 'Data berhasil direject.');

		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}
	public function approval_bahan_upload($id){
		$this->Main_model->updateAll('tbl_file_2', ['status' => 1], $id);
		$this->session->set_flashdata('success', 'Data berhasil diapprove.');
		
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}
	public function reject_bahan_upload($id){
		$this->Main_model->updateAll('tbl_file_2', ['status' => -1], $id);
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

	public function rejectwithmodal($id) {
		$this->Main_model->updateAll('tbl_file', [
			'note' => $this->input->post('note'),
			'status' => -1
		], $id);
		$this->session->set_flashdata('success', 'Data berhasil direject.');
		redirect($_SERVER['HTTP_REFERER'], 'refresh');

	}
	public function reject_bb($id) {
		$this->Main_model->updateAll('tbl_file_2', [
			'note' => $this->input->post('note'),
			'status' => -1
		], $id);
		$this->session->set_flashdata('success', 'Data berhasil direject.');
		redirect($_SERVER['HTTP_REFERER'], 'refresh');

	}
}
