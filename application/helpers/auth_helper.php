<?php

if (!function_exists('get_role')) {
    function role($id_role) {
        $CI = &get_instance();
        $CI->db->where('id_role', $id_role);
		$query = $CI->db->get('tbl_role');
		return $query->row_array() ?? [];
    }
}

if (!function_exists('user')) {
    function user() {
        $role = role($_SESSION['role'] ?? 0);

        return array(
            'id' => $_SESSION['id'] ?? null,
            'username' => $_SESSION['username'] ?? null,
            'role' => $_SESSION['role'] ?? null,
            'role_name' => $role['nama_role'] ?? '-',
            'role_description' => $role['descriptiom'] ?? '-',
            'wilayah' => json_decode($_SESSION['wilayah'], true), // true for associative array (as the return value), must decode to prevent bugs on model search
            'logged_in' => (isset($_SESSION['id']) && $_SESSION['id'] != null)? TRUE : FALSE
        );
    }
}

if (!function_exists('check_login')) {
    function check_login() {
        if(user()['logged_in']) {
            // user sudah login (sesi masih aktif)
            return TRUE;
        } else {
            // user login expired
            redirect('main/index');
            return FALSE;
        }
    }
}