<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    } else {
        $jabatan = $ci->session->userdata('jabatan');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('akses_menu_user', [
            'jabatan' => $jabatan,
            'menu_id' => $menu_id
        ]);

        // if ($userAccess->num_rows() < 1) {
        //     redirect('auth/blocked');
        // }
    }
}

function check_access($jabatan, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('jabatan', $jabatan);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('akses_menu_user');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
