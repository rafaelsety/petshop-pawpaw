<?php

class Produk_model extends CI_Model
{
    protected $_table = 'produk';

    public function getAllProduk()
    {
        return $this->db->get('produk')->result_array();
    }

    public function getproduk($id_barang)
    {
        if ($id_barang) {
            $this->db->like('id_barang', $id_barang);
        }
        return $this->db->get_where('produk')->result_array();
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
        $row = $this->db->prepare($sql);
        $row->execute();
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function jumlah()
    {
        $sql = "SELECT SUM(total) as bayar FROM penjualan";
        $row = $this->db->prepare($sql);
        $row->execute();
        $hasil = $row->fetch();
        return $hasil;
    }

    // ci
    public function lihat()
    {
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function jml()
    {
        $query = $this->db->get($this->_table);
        return $query->num_rows();
    }

    public function lihat_stok()
    {
        $query = $this->db->get_where($this->_table, 'stok > 1');
        return $query->result();
    }

    public function lihat_id($kode_barang)
    {
        $query = $this->db->get_where($this->_table, ['kode_barang' => $kode_barang]);
        return $query->row();
    }

    public function lihat_nama_barang($nama_barang)
    {
        $query = $this->db->select('*');
        $query = $this->db->where(['nama_barang' => $nama_barang]);
        $query = $this->db->get($this->_table);
        return $query->row();
    }

    public function tambah($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function min_stok($stok, $nama_barang)
    {
        $query = $this->db->set('stok', 'stok-' . $stok, false);
        $query = $this->db->where('nama_barang', $nama_barang);
        $query = $this->db->update($this->_table);
        return $query;
    }

    public function ubah($data, $kode_barang)
    {
        $query = $this->db->set($data);
        $query = $this->db->where(['kode_barang' => $kode_barang]);
        $query = $this->db->update($this->_table);
        return $query;
    }

    public function hapus($kode_barang)
    {
        return $this->db->delete($this->_table, ['kode_barang' => $kode_barang]);
    }
}
