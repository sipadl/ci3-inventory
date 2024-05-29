<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataDaging_model extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->database(); // Memuat library database
    }

	public function get_id_names() {
        return array(
            'tbl_area' => 'id_area',
            'tbl_daging' => 'id',
            'tbl_file' => 'id',
            'tbl_kota' => 'id_kota',
            'tbl_laporan' => 'id',
            'tbl_memo' => 'id',
            'tbl_pembayaran_dp' => 'id_pembayaran_dp',
            'tbl_penerimaan' => 'id',
            'tbl_pengajuan' => 'id',
            'tbl_price' => 'id_price',
            'tbl_role' => 'id_role',
            'tbl_sortir' => 'id',
            'tbl_sub_daging' => 'id',
            'tbl_supplier' => 'id_supplier',
            'tbl_user' => 'id',
        );
    }

    // THIS FUNCTION IS NOT USED, YOU MAY MODIFY IT IF NEEDED OR DELETE IT OTHERWISE
    /*public function join_two_tables($table_1, $table_2, $foreign_key_name, $foreign_key_from_table = 2, $type = 'left', $must_use_from = false) {
        if(
            $foreign_key_from_table == 2
            && isset($this->get_id_names()[$table_1])
        ) {
            if($must_use_from) {
                $this->db->from($table_1);
            }

            $this->db->join($table_2,
                $table_2 . '.' . $foreign_key_name
                . ' = '
                . $table_1 . '.' . $this->get_id_names()[$table_1]
            , $type);
        }
    }*/

    public function addDaging($data) {
        // Simpan data ke dalam database
        $this->db->insert('tbl_daging', $data);
        return $this->db->insert_id(); // Mengembalikan ID dari data yang baru dimasukkan
    }

	public function getData($table) {
        $query = $this->db->query('SELECT * FROM '.$table.' ORDER BY id desc');
        return $query->result_array();
	}

	public function getDataWithWhere($table, $condition, $value, $type = 'where') {
        if($type == 'where') {
            $this->db->where($condition, $value);
        } else if($type == 'where_in') {
            $this->db->where_in($condition, $value);
        }
        $this->db->order_by("id", "desc");
		$query = $this->db->get($table);
		return $query->result_array();
	}

	public function getDataNoOrder($table) {
		$query = $this->db->query('SELECT * FROM '.$table);
		return $query->result_array();
	}
	
	public function getDataNoOrderWithWhere($table, $condition, $value, $type = 'where') {
        if($type == 'where') {
            $this->db->where($condition, $value);
        } else if($type == 'where_in') {
            $this->db->where_in($condition, $value);
        }
		$query = $this->db->get($table);
		return $query->result_array();
	}

	public function tambahUser($data) {
        // Simpan data user ke dalam database
        $this->db->insert('tbl_user', $data);
    }
	public function insert_supplier($data) {
        // Simpan data user ke dalam database
        $this->db->insert('tbl_supplier', $data);
    }

	public function login($username, $password) {
        // Lakukan pengecekan login ke database atau sumber autentikasi lainnya
        // Misalnya, jika menggunakan database:
        $this->db->where('username', $username);
        $this->db->where('password', md5($password)); // Jika password disimpan dengan hash md5, ubah sesuai dengan metode yang Anda gunakan
        $query = $this->db->get('tbl_user'); // 'users' adalah nama tabel pengguna, ubah sesuai dengan kebutuhan Anda

        // Jika ditemukan pengguna dengan username dan password yang cocok
        if ($query->num_rows() == 1) {
            // Ambil data pengguna
            $user = $query->row_array();

            // Set session untuk pengguna yang sudah login
            $userdata = array(
                'user_id' => $user['id'], // Ganti 'id' sesuai dengan nama kolom id pada tabel pengguna
                'username' => $user['username'], // Ganti 'username' sesuai dengan nama kolom username pada tabel pengguna
                // Tambahkan data lainnya sesuai kebutuhan
                'logged_in' => TRUE
            );
            $this->session->set_userdata($userdata);
            return true;
        } else {
            // Jika tidak ditemukan pengguna dengan username dan password yang cocok
            return false;
        }
    }

    public function logout() {
        // Hapus semua data sesi pengguna saat logout
        $this->session->sess_destroy();
    }

	public function aprrovalData($id) {
		$this->db->where('id', $id); // Assuming 'id' is the primary key column
    	$this->db->update('tbl_daging', array('status' => 2));
	}
	public function rejctData($id) {
		$this->db->where('id', $id); // Assuming 'id' is the primary key column
    	$this->db->update('tbl_daging', array('status' => -1));
	}
}
