<?php

class M_detail_penjualan extends CI_Model
{
	protected $_table = 'detail_transaksi';

	public function tambah($data)
	{
		return $this->db->insert_batch($this->_table, $data);
	}

	public function lihat_no_penjualan($no_penjualan)
	{
		return $this->db->get_where($this->_table, ['no_transaksi' => $no_penjualan])->result();
	}

	public function hapus($no_penjualan)
	{
		return $this->db->delete($this->_table, ['no_transaksi' => $no_penjualan]);
	}
}
