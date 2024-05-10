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
		return $this->db->query('select b.id as id_bahan_baku, a.id as id_sortir, b.*, a.* from tbl_daging b left join tbl_sortir a on a.id_bb = b.id where is_corection is null OR is_corection = 0 order by b.id desc')->result_array();
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
		return $this->db->query("select td.*, td.keterangan as keterangan_bahan_baku, td.id as id_bahan_baku, ts.id as id_sortir, ts.* from tbl_daging td left join tbl_sortir ts on td.id = ts.id_bb where ts.status in(".$val.") and is_corection = 0 order by ts.id desc")->result_array();
	}

	public function getBahanBakuWithDate($start, $end) {
		return $this->db->query("select td.*, td.keterangan as keterangan_bahan_baku, td.id as id_bahan_baku, ts.id as id_sortir, ts.* from tbl_daging td left join tbl_sortir ts on td.id = ts.id_bb where ts.tanggal_rec >= ? and ts.tanggal_rec <= ? and is_corection = 0 order by ts.id desc", [$start, $end])->result_array();
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

	public function get_laporan_root2 () {
		return $this->db->query("select * from tbl_daging a 
		left join tbl_sortir b on a.id  = b.id_bb 
		left join tbl_laporan c on c.id_sortir  = b.id")->result_array();
	}

	public function query_laporan ($start, $end) {
		return $this->db->query("SELECT 
		*,
		(fresh + phrmhr) AS total,
		(
			SELECT sum(qty) 
			FROM tbl_sub_daging x 
			WHERE x.id_bahan_baku = b.id_bahan_baku
		) AS qty
	FROM (
		SELECT 
			(sum_col + sum_jb + sum_jk + sum_bf + xlp + sum_spk + sum_sp + sum_mh + sp_clf + sp_cl + sp_sph) AS fresh,
			(sum_basi_receiving + sum_basi_sortir + basi_mhr) AS phrmhr,
			(air + loss + shell ) as sum_loss,
			a.*
		FROM (
			SELECT 
				b.id as id_sortir_baru,
				a.id AS id_bahan_baku,
				c.id AS id_laporan,
				b.tanggal_rec AS tanggal,
				d.*,
				(b.col + bf) AS sum_col,
				(b.jb + b.jb_bf) AS sum_jb,
				(b.jbb_jk + b.jbb_bf) AS sum_jk,
				(b.bf_k3_col + b.bf_k3_jb + b.bf_k3_jl + b.bf_k3_jk + b.bf_kj + b.bf_bf + b.bf_sp + b.bf_lp_slb) AS sum_bf,
				b.xlp,
				(b.bf_spk_xlp + b.bf_spk_sp) AS sum_spk,
				(b.spk_sp_jb + b.spk_sp_xlp + b.spk_sp_bfp + b.spk_sp) AS sum_sp,
				b.sp_sph,
				(b.basi_col + b.basi_jk + b.basi_xlp + b.basi_bf + b.basi_sp) AS sum_basi_receiving,
				(b.basi_col2 + b.basi_jb2 + b.basi_jk2 + b.basi_xlp2 + b.basi_bf2 + b.basi_sp2) AS sum_basi_sortir,
				(b.basi_cl + b.basi_mh) AS basi_mhr,
				(b.mh + b.mh_slb) AS sum_mh,
				b.sp_cl,
				b.sp_clf,
				b.air,
				b.loss,
				b.shell,
				c.*
			FROM 
				tbl_daging a 
				LEFT JOIN tbl_sortir b ON a.id = b.id_bb 
				LEFT JOIN tbl_laporan c ON c.id_sortir = b.id
				LEFT JOIN (SELECT kode_supplier, nama_supplier FROM tbl_supplier) d ON d.kode_supplier = a.supplier 
			ORDER BY 
				b.tanggal_rec DESC
		) a
	) b where tanggal >= ? and tanggal <= ?;",[$start, $end])->result_array();
	}

	public function get_total()
	{
		return $this->db->query("select
		sum(fresh) as total_fresh,
		sum(phrmhr) as total_phrmhr,
		sum(sum_loss) as total_loss,
		sum(subsidi_normal) as total_subsidi_normal,
		sum(subsidi_transport) as total_subsidi_transport,
		sum(total_subsidi) as total_subsidi,
		sum(total) as total_semua,
		sum(qty) as total_qty
	from
		(
		select
			*,
			(fresh + phrmhr) as total,
			(
			select
				sum(qty)
			from
				tbl_sub_daging x
			where
				x.id_bahan_baku = b.id_bahan_baku
		) as qty
		from
			(
			select
				(sum_col + sum_jb + sum_jk + sum_bf + xlp + sum_spk + sum_sp + sum_mh + sp_clf + sp_cl + sp_sph) as fresh,
				(sum_basi_receiving + sum_basi_sortir + basi_mhr) as phrmhr,
				(air + loss + shell ) as sum_loss,
				subsidi_normal,
				subsidi_transport,
				(subsidi_normal + subsidi_dibayar_2 - subsidi_dibayar_3 ) as total_subsidi,
				id_bahan_baku
			from
				(
				select
					a.id as id_bahan_baku,
					c.id as id_laporan,
					b.tanggal_rec as tanggal,
					d.*,
					(b.col + bf) as sum_col,
					(b.jb + b.jb_bf) as sum_jb,
					(b.jbb_jk + b.jbb_bf) as sum_jk,
					(b.bf_k3_col + b.bf_k3_jb + b.bf_k3_jl + b.bf_k3_jk + b.bf_kj + b.bf_bf + b.bf_sp + b.bf_lp_slb) as sum_bf,
					b.xlp,
					(b.bf_spk_xlp + b.bf_spk_sp) as sum_spk,
					(b.spk_sp_jb + b.spk_sp_xlp + b.spk_sp_bfp + b.spk_sp) as sum_sp,
					b.sp_sph,
					(b.basi_col + b.basi_jk + b.basi_xlp + b.basi_bf + b.basi_sp) as sum_basi_receiving,
					(b.basi_col2 + b.basi_jb2 + b.basi_jk2 + b.basi_xlp2 + b.basi_bf2 + b.basi_sp2) as sum_basi_sortir,
					(b.basi_cl + b.basi_mh) as basi_mhr,
					(b.mh + b.mh_slb) as sum_mh,
					b.sp_cl,
					b.sp_clf,
					b.air,
					b.loss,
					b.shell,
					c.*
				from
					tbl_daging a
				left join tbl_sortir b on
					a.id = b.id_bb
				left join tbl_laporan c on
					c.id_sortir = b.id
				left join (
					select
						kode_supplier,
						nama_supplier
					from
						tbl_supplier) d on
					d.kode_supplier = a.supplier
				order by
					b.tanggal_rec desc
		) a
	) b ) c")->row_array();
	}

	public function get_price() {
		return $this->db->query('select * from tbl_price')->result_array();
	}
	

	public function getDagingWithSubDaging()
	{
		return $this->db->query('select * from tbl_daging a left join tbl_sub_daging b on a.id = b.id_bahan_baku')->result_array();
	}

}
