<?php

class Produk_model extends CI_Model
{
    protected $_table = 'produk';

    public function getAllProduk()
    {
        return $this->db->get('produk')->result_array();
    }
    public function getAksProduk()
    {
        $barang = 'Aksesoris';
        return $this->db->get_where($this->_table, ['kategori_produk' => $barang])->result_array();
    }
    public function getMainProduk()
    {
        $barang = 'Mainan';
        return $this->db->get_where($this->_table, ['kategori_produk' => $barang])->result_array();
    }
    public function getMknProduk()
    {
        $barang = 'Makanan';
        return $this->db->get_where($this->_table, ['kategori_produk' => $barang])->result_array();
    }

    public function getproduk($id_produk)
    {
        if ($id_produk) {
            $this->db->like('id_produk', $id_produk);
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

    public function lihat_id($kd_produk)
    {
        $query = $this->db->get_where($this->_table, ['kd_produk' => $kd_produk]);
        return $query->row();
    }

    public function lihat_nama_produk($nama_produk)
    {
        $query = $this->db->select('*');
        $query = $this->db->where(['nama_produk' => $nama_produk]);
        $query = $this->db->get($this->_table);
        return $query->row();
    }

    public function tambahdata($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function min_stok($stok, $nama_produk)
    {
        $query = $this->db->set('stok', 'stok-' . $stok, false);
        $query = $this->db->where('nama_produk', $nama_produk);
        $query = $this->db->update($this->_table);
        return $query;
    }
    public function produkWhere($where)
    {
        return $this->db->get_where('produk', $where);
    }

    public function editproduk($data, $kd_produk)
    {
        $query = $this->db->set($data);
        $query = $this->db->where(['kd_produk' => $kd_produk]);
        $query = $this->db->update($this->_table);
        return $query;
    }

    //public function hapusproduk($kd_produk)
    //{
      //  return $this->db->delete($this->_table, ['kd_produk' => $kd_produk]);
    //}

    public function hapusproduk($where = null)
    {
        $this->db->delete('produk', $where);
    }

    public function simpanproduk($data = null)
    {
        $this->db->insert('produk',$data);
    }

    public function updateproduk($data = null, $where = null)
    {
        $this->db->update('produk', $data, $where);
    }
}
