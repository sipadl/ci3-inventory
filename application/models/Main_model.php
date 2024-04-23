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


	public function getBahanBakuBaru() {
		return $this->db->query('select b.id as id_bahan_baku, b.*, a.* from tbl_daging b left join tbl_sortir a on a.id_bb = b.id order by b.id desc')->result_array();
	}

	public function GetSortirWithMemo($val) {
		return $this->db->query('select *, b.status as status_memo from tbl_sortir a left join tbl_memo b on a.id = b.id_sortir')->result_array();
	}


	public function getTblMemo() {
		return $this->db->query('
		select
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
	join tbl_daging c on c.id = a.id_bb ')->result_array();
	}

	public function getBahanBakuWithStatus($val) {
		return $this->db->query("select td.*, td.id as id_bahan_baku, ts.id as id_sortir, ts.* from tbl_daging td left join tbl_sortir ts on td.id = ts.id_bb where ts.status in(".$val.") order by ts.id desc")->result_array();
	}

	public function getDataSortir($id = null) {
		if($id) {
			return $this->db->query("select * from tbl_sortir where id =". $id." order by id desc")->result_array();
		} else {
			return $this->db->query("select * from tbl_sortir where status = 0 order by id desc")->result_array();
		}
	}

	public function insertAll($table, $data)
	{
		$this->db->insert($table,  $data);
		return $this->db->insert_id();
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

	public function get_datas_detail_from_table($table, $id, $condition){
		$this->db->where($condition, $id);
		$query = $this->db->get($table)->row_array();
		return $query;
	}

	public function get_datas_all_from_table($table, $id){
		$query = $this->db->get($table)->row_array();
		return $query;
	}

	public function delete($table, $id) {
		$this->db->where('id', $id);
		$this->db->get($table);
		$this->db->delete();
	}
	public function get_laporan_root () {
		return $this->db->query("select *,d.id as id_laporan, d.status as status_laporan from tbl_supplier a 
		left join tbl_sortir b
		on a.kode_supplier = b.kode_supplier 
		join tbl_daging c on c.id = b.id_bb 
		left join tbl_laporan d on b.id_bb = d.id_sortir")->result_array();
	} 

	public function get_price() {
		return $this->db->query('select * from tbl_price')->result_array();
	}
	

	public function getDagingWithSubDaging()
	{
		return $this->db->query('select * from tbl_daging a left join tbl_sub_daging b on a.id = b.id_bahan_baku')->result_array();
	}

}
