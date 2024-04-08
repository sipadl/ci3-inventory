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
}
