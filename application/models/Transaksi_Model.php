<?php

class Transaksi_Model extends CI_Model
{
    public function getAlltransaksi()
    {
        return $this->db->get('transaksi')->result_array();
    }

    public function gettransaksi($id_kasir)
    {
        if ($id_kasir) {
            $this->db->like('id_kasir', $id_kasir);
        }
        return $this->db->get_where('transaksi')->result_array();

        
    }
}
