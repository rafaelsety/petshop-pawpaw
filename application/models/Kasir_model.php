<?php

class Kasir_model extends CI_Model
{
    public function getAllProduk()
    {
        return $this->db->get('produk')->result_array();
    }

    public function getproduk($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('name', $keyword);
            $this->db->or_like('email', $keyword);
        }
        return $this->db->get('produk', $limit, $start)->result_array();
    }

    public function countAllProduk()
    {
        return $this->db->get('produk')->num_rows();
    }

    public function penjualan()
    {
        $sql = "SELECT penjualan.* , produk.id_produk, produk.nama_produk, member.id_member,
                member.nm_member from penjualan 
                left join produk on produk.id_produk=penjualan.id_produk 
                left join member on member.id_member=penjualan.id_member
                ORDER BY id_penjualan";
        $hasil = $this->db->query($sql)->result_array();
        return $hasil;
    }

    public function jualan($id_barang)
    {
        return $this->db->get_where('penjualan', ['id_produk' => $id_barang])->row_array();
    }

    public function jumlah()
    {
        $sql = "SELECT SUM(total) as bayar FROM penjualan";
        $hasil = $this->db->query($sql)->result_array();
        return $hasil;
    }

    public function produk_cari($cari = null)
    {
        if ($cari) {
            $this->db->like('id_produk', $cari);
            $this->db->or_like('nama_produk', $cari);
            return $this->db->get('produk')->result_array();
        } elseif ($cari == null) {
            return null;
        }
    }
}
