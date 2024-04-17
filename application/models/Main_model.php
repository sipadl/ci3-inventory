<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->database(); 
    }

	public function getWilayahById($id) {
		return $this->db->query("select * from tbl_kota where kode_area =".$id )->result_array();
	}

	public function getBahanBaku() {
		return $this->db->query("select td.*, ts.id as id_sortir, ts.* from tbl_daging td left join tbl_sortir ts on td.id = ts.id")->result_array();
	}

	public function getDataSortir($id = null) {
		if($id) {
			return $this->db->query("select * from tbl_sortir where status = 0 and id =". $id)->result_array()[0];
		} else {
			return $this->db->query("select * from tbl_sortir where status = 0")->result_array();
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

		if (!$user) {
			return false;
		}

		// Verify the password
		if (password_verify($password, $user['password'])) {
			// Password matches, return user data
			$userdata = array(
                'user_id' => $user['id'], // Ganti 'id' sesuai dengan nama kolom id pada tabel pengguna
                'username' => $user['username'], // Ganti 'username' sesuai dengan nama kolom username pada tabel pengguna
                // Tambahkan data lainnya sesuai kebutuhan
                'logged_in' => TRUE
            );
            $this->session->set_userdata($userdata);
		} else {
			// Password does not match
			return false;
		}
	}
	
}
