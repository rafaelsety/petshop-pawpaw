<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajemen_model extends CI_Model
{
    public function getUser()
    {
        return $this->db->get('user')->result_array();
    }

    public function userWhere($where)
    {
        return $this->db->get_where('user', $where);
    }

    public function simpanUser($data = null)
    {
        $this->db->insert('user',$data);
    }

    public function updateUser($data = null, $where = null)
    {
        $this->db->update('user', $data, $where);
    }

    public function hapusUser($where = null)
    {
        $this->db->delete('user', $where);
    }

    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if(!empty($where) && count($where) > 0){
            $this->db->where($where);
        }
        $this->db->from('user');
        return $this->db->get()->row($field);
    }
    
}
