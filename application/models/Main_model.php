<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->database(); 
    }

	public function getWilayahById($id) {
		return $this->db->query("select * from tbl_kota where kode_area =".$id. "order by id desc")->result_array();
	}

	public function getBahanBaku() {
		return $this->db->query("select td.*, td.id as id_bahan_baku, ts.id as id_sortir, ts.* from tbl_daging td left join tbl_sortir ts on td.id = ts.id_bb order by ts.id desc")->result_array();
	}

	public function getBahanBakuWithStatus($val) {
		return $this->db->query("select td.*, td.id as id_bahan_baku, ts.id as id_sortir, ts.* from tbl_daging td left join tbl_sortir ts on td.id = ts.id_bb where ts.status in(".$val.") order by ts.id desc")->result_array();
	}

	public function getDataSortir($id = null) {
		if($id) {
			return $this->db->query("select * from tbl_sortir where status = 0 and id =". $id." order by id desc")->result_array()[0];
		} else {
			return $this->db->query("select * from tbl_sortir where status = 0 order by id desc")->result_array();
		}
	}

	public function insertAll($table, $data)
	{
		$this->db->insert($table,  $data);
	}

	public function updateAll($table, $data, $id)
	{
		$this->db->where('id', $id); // Assuming 'id' is the primary key column
    	$this->db->update($table, $data);
	}

	public function login($username, $password) {
        // Lakukan pengecekan login ke database atau sumber autentikasi lainnya
        // Misalnya, jika menggunakan database:
        $this->db->where('username', $username);
		$query = $this->db->get('tbl_user');
		$user = $query->row_array();
		
		// var_dump(md5($password) == $user['password']);
		// die();
		if (!$user) {
			return false;
		}

		$hash = md5($password) == $user['password'];
		// Verify the password
		if ($hash) {
			// Password matches, return user data
			$userdata = array(
                'id' => $user['id'], // Ganti 'id' sesuai dengan nama kolom id pada tabel pengguna
                'username' => $user['username'], // Ganti 'username' sesuai dengan nama kolom username pada tabel pengguna
				'role' => $user['role'],
                // Tambahkan data lainnya sesuai kebutuhan
                'logged_in' => TRUE
            );
            $this->session->set_userdata($userdata);

			return true;
		} else {
			// Password does not match
			return false;
		}
	}
	
}
