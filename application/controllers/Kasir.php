<?php

use Dompdf\Dompdf;

class Kasir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_barang', 'm_barang');
        $this->load->model('M_penjualan', 'm_penjualan');
        $this->load->model('M_kasir', 'm_kasir');
        $this->load->model('M_detail_penjualan', 'm_detail_penjualan');
        $this->data['aktif'] = 'kasir';
    }

    public function index()
    {
        $this->data['title'] = 'Kasir';
        $this->data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->data['all_barang'] = $this->m_barang->lihat_stok();

        $this->load->view('templates/header', $this->data);
        $this->load->view('templates/sidebar', $this->data);
        $this->load->view('templates/topbar', $this->data);
        $this->load->view('kasir/index', $this->data);
        $this->load->view('templates/footer');
    }

    public function proses_tambah()
    {
        $jumlah_barang_dibeli = count($this->input->post('kode_barang_hidden'));

        $data_penjualan = [
            'no_transaksi' => $this->input->post('no_penjualan'),
            'username' => $this->input->post('nama_kasir'),
            'tgl_transaksi' => $this->input->post('tgl_penjualan'),
            'jam_transaksi' => $this->input->post('jam_penjualan'),
            'total' => $this->input->post('total_hidden'),
        ];

        $data_detail_penjualan = [];

        for ($i = 0; $i < $jumlah_barang_dibeli; $i++) {
            array_push($data_detail_penjualan, ['kode_produk' => $this->input->post('kode_barang_hidden')[$i]]);
            $data_detail_penjualan[$i]['nama_produk'] = $this->input->post('nama_barang_hidden')[$i];
            $data_detail_penjualan[$i]['no_transaksi'] = $this->input->post('no_penjualan');
            $data_detail_penjualan[$i]['harga_produk'] = $this->input->post('harga_barang_hidden')[$i];
            $data_detail_penjualan[$i]['jumlah_produk'] = $this->input->post('jumlah_hidden')[$i];
            $data_detail_penjualan[$i]['jenis_hewan'] = $this->input->post('satuan_hidden')[$i];
            $data_detail_penjualan[$i]['sub_total'] = $this->input->post('sub_total_hidden')[$i];
        }

        if ($this->m_penjualan->tambah($data_penjualan) && $this->m_detail_penjualan->tambah($data_detail_penjualan)) {
            for ($i = 0; $i < $jumlah_barang_dibeli; $i++) {
                $this->m_barang->min_stok($data_detail_penjualan[$i]['jumlah_produk'], $data_detail_penjualan[$i]['kode_produk']) or die('gagal min stok');
            }
            $this->session->set_flashdata('success', 'Invoice <strong>Penjualan</strong> Berhasil Dibuat!');
            redirect('kasir');
        } else {
            $this->session->set_flashdata('success', 'Invoice <strong>Penjualan</strong> Berhasil Dibuat!');
            redirect('kasir');
        }
    }

    public function get_all_barang()
    {
        $data = $this->m_barang->lihat_kode_barang($_POST['kode_barang']);
        echo json_encode($data);
    }

    // public function get_all_barang()
    // {
    //     $data = $this->m_barang->lihat_nama_barang($_POST['nama_barang']);
    //     echo json_encode($data);
    // }

    public function keranjang_barang()
    {
        $this->load->view('kasir/keranjang');
    }
}
