<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataDaging_model extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->database(); // Memuat library database
    }

    public function addDaging($data) {
        // Simpan data ke dalam database
        $this->db->insert('tbl_daging', $data);
        return $this->db->insert_id(); // Mengembalikan ID dari data yang baru dimasukkan
    }

	public function getData($table) {
	$query = $this->db->query('SELECT * FROM '.$table.' ORDER BY TANGGAL DESC');
    return $query->result_array();
	}

	public function getDataNoOrder($table) {
		$query = $this->db->query('SELECT * FROM '.$table);
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
}
