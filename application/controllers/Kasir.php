<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Kasir';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->model('Produk_model', 'produk');
        $this->load->model('Kasir_model', 'kasir');

        $data['produk'] = $this->produk->getAllProduk();
        $data['penjualan'] = $this->kasir->penjualan();
        $data['jumlah'] = $this->kasir->jumlah();

        // ambil data cari
        if ($this->input->post('submit')) {
            $data['cari'] = $this->input->post('cari');
            $this->session->set_userdata('cari', $data['cari']);
        } else {
            $data['cari'] = $this->session->userdata('cari');
        }

        $data['cari'] = $this->kasir->produk_cari($data['cari']);


        // proses bayar dan ke nota
        $data['total'] = $this->input->post('total');
        $data['bayar'] = $this->input->post('bayar');
        $data['hitung'] = $this->input->post('hitung');
        if (!empty($this->db->get('nota') == 'yes')) {
            $data['total'] = $data['total'];
            $data['bayar'] = $data['bayar'];
            if (!empty($bayar)) {
                $hitung = $bayar - $data['total'];
                if ($bayar >= $data['total']) {
                    $id_barang = $_POST['id_barang'];
                    $id_member = $_POST['id_member'];
                    $jumlah = $_POST['jumlah'];
                    $data['total'] = $_POST['total1'];
                    $tgl_input = $_POST['tgl_input'];
                    $periode = $_POST['periode'];
                    $jumlah_dipilih = count($id_barang);

                    for ($x = 0; $x < $jumlah_dipilih; $x++) {

                        $d = array($id_barang[$x], $id_member[$x], $jumlah[$x], $data['total'][$x], $tgl_input[$x], $periode[$x]);
                        $sql = "INSERT INTO nota (id_barang,id_member,jumlah,total,tanggal_input,periode) VALUES(?,?,?,?,?,?)";
                        $row = $this->db->query($sql)->result_array();;
                        $row->execute($d);

                        // ubah stok barang
                        $sql_barang = "SELECT * FROM barang WHERE id_barang = ?";
                        $row_barang = $this->db->query($sql_barang)->result_array();;
                        $row_barang->execute(array($id_barang[$x]));
                        $hsl = $row_barang->fetch();

                        $stok = $hsl['stok'];
                        $idb  = $hsl['id_barang'];

                        $total_stok = $stok - $jumlah[$x];
                        // echo $total_stok;
                        $sql_stok = "UPDATE barang SET stok = ? WHERE id_barang = ?";
                        $row_stok = $this->db->query($sql_stok)->result_array();;
                        $row_stok->execute(array($total_stok, $idb));
                    }
                    echo '<script>alert("Belanjaan Berhasil Di Bayar !");</script>';
                } else {
                    echo '<script>alert("Uang Kurang ! Rp.' . $hitung . '");</script>';
                }
            }
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kasir/index', $data);
        $this->load->view('templates/footer');
    }

    public function kasir_barang($id_barang)
    {
        if (!empty($this->input->post('id_barang'))) {

            if ($this->produk->getProduk($id_barang) > 0) {
                $kasir =  $this->db->get('id_kasir');
                $jumlah = 1;
                $total = $this->kasir->jualan($id_barang['harga_jual']);
                $tgl = date("j F Y, G:i");

                $data = [
                    "id_barang" => $this->input->post('id_barang', true),
                    "id_member" => $kasir,
                    "jumlah" => $jumlah,
                    "total" => $total,
                    "tanggal_input" => $tgl
                ];

                $this->db->insert('penjualan', $data);
                $data['penjualan'] = $this->kasir->jualan($id_barang);
                // $sql1 = 'INSERT INTO penjualan (id_barang,id_member,jumlah,total,tanggal_input) VALUES (?,?,?,?,?)';

                echo '<script>window.location="../../index.php?page=jual&success=tambah-data"</script>';
            } else {
                echo '<script>alert("Stok Barang Anda Telah Habis !");
                        window.location="../../index.php?page=jual#keranjang"</script>';
            }
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kasir/index', $data);
        $this->load->view('templates/footer');
    }
}
