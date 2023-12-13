<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;

class Transaksi extends CI_Controller
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
    }

    public function index()
    {
        $this->data['title'] = 'Transaksi';
        $this->data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->data['all_penjualan'] = $this->m_penjualan->lihat();

        $this->load->view('templates/header', $this->data);
        $this->load->view('templates/sidebar', $this->data);
        $this->load->view('templates/topbar', $this->data);
        $this->load->view('transaksi/index', $this->data);
        $this->load->view('templates/footer');
    }

    public function detail($no_penjualan)
    {
        $this->data['title'] = 'Detail Transaksi';
        $this->data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->data['penjualan'] = $this->m_penjualan->lihat_no_penjualan($no_penjualan);
        $this->data['all_detail_penjualan'] = $this->m_detail_penjualan->lihat_no_penjualan($no_penjualan);
        $this->data['no'] = 1;

        $this->load->view('templates/header', $this->data);
        $this->load->view('templates/sidebar', $this->data);
        $this->load->view('templates/topbar', $this->data);
        $this->load->view('transaksi/detail', $this->data);
        $this->load->view('templates/footer');
    }

    public function hapus($no_penjualan)
    {
        if ($this->m_penjualan->hapus($no_penjualan) && $this->m_detail_penjualan->hapus($no_penjualan)) {
            $this->session->set_flashdata('success', 'Invoice Penjualan <strong>Berhasil</strong> Dihapus!');
            redirect('transaksi');
        } else {
            $this->session->set_flashdata('error', 'Invoice Penjualan <strong>Gagal</strong> Dihapus!');
            redirect('transaksi');
        }
    }

    // public function export()
    // {
    //     $dompdf = new Dompdf();
    //     // $this->data['perusahaan'] = $this->m_usaha->lihat();
    //     $this->data['all_penjualan'] = $this->m_penjualan->lihat();
    //     $this->data['title'] = 'Laporan Data Penjualan';
    //     $this->data['no'] = 1;

    //     $dompdf->setPaper('A4', 'Landscape');
    //     $html = $this->load->view('penjualan/report', $this->data, true);
    //     $dompdf->load_html($html);
    //     $dompdf->render();
    //     $dompdf->stream('Laporan Data Penjualan Tanggal ' . date('d F Y'), array("Attachment" => false));
    // }

    // public function export_detail($no_penjualan)
    // {
    //     $dompdf = new Dompdf();
    //     // $this->data['perusahaan'] = $this->m_usaha->lihat();
    //     $this->data['penjualan'] = $this->m_penjualan->lihat_no_penjualan($no_penjualan);
    //     $this->data['all_detail_penjualan'] = $this->m_detail_penjualan->lihat_no_penjualan($no_penjualan);
    //     $this->data['title'] = 'Laporan Detail Penjualan';
    //     $this->data['no'] = 1;

    //     $dompdf->setPaper('A4', 'Landscape');
    //     $html = $this->load->view('penjualan/detail_report', $this->data, true);
    //     $dompdf->load_html($html);
    //     $dompdf->render();
    //     $dompdf->stream('Laporan Detail Penjualan Tanggal ' . date('d F Y'), array("Attachment" => false));
    // }
}
