<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Kategori Produk';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('produk/index', $data);
        $this->load->view('templates/footer');
    }

    public function hapusproduk()
    {
        $where = ['kd_produk' => $this->uri->segment(3)];
        $this->Produk_model->hapusproduk($where);
        redirect('produk');
    }
    
    public function editproduk()
    {
        
        $data['judul'] = 'Edit Produk';
        //$data['user'] = $this->Produk_model->cekData(['username' => $this->session->userdata('username')])->row_array();
        //$data['user'] = $this->db->get_where('produk', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Produk_model', 'produk');
        //$data['produk'] = $this->Produk_model->produkWhere(['kd_produk' => $this->uri->segment(3)])->result_array();
        
        
        $this->form_validation->set_rules('kd_produk', 'Kode Produk', 'required', [
            'required' => 'Kode Produk harus diisi']);
        $this->form_validation->set_rules('kategori_produk', 'Kategori', 'required', [
            'required' => 'Kategori harus diisi']);
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', [
            'required' => 'Nama Produk harus diisi']);
        $this->form_validation->set_rules('jenis_hewan', 'Jenis hewan', 'required', [
            'required' => 'Jenis Hewan harus diisi']);
        $this->form_validation->set_rules('berat_bersih', ' Berat Bersih', 'required', [
            'required' => 'Berat Bersih harus diisi']);
        $this->form_validation->set_rules('stok', 'Stok Barang', 'required|numeric', [
            'required' => 'Stok Barang harus diisi',
            'numeric' => 'Yang anda masukan bukan angka']);
        $this->form_validation->set_rules('harga', 'Harga Jual', 'required|min_length[3]|numeric', [
            'required' => 'Harga harus diisi', 
            'min_length' => 'Masukan Harga dengan benar', 
            'numeric' => 'Yang anda masukan bukan angka']);
        
        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();
        //memuat atau memanggil library upload
        $this->load->library('upload', $config);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('produk/edit_produk', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
                $gambar = $image['file_name'];
            } else {
                $gambar = $this->input->post('old_pict', TRUE);
            }
            $data = [
                'nama_produk' => $this->input->post('nama_produk', true),
                'kategori_produk' => $this->input->post('kategori_produk', true),
                'jenis_hewan' => $this->input->post('jenis_hewan', true),
                'kd_produk' => $this->input->post('kd_produk', true),
                'berat_bersih' => $this->input->post('berat_bersih', true),
                'stok' => $this->input->post('stok', true),
                'harga' => $this->input->post('harga', true),
                'gambar' => $gambar
            ];
            $this->Produk_model->updateproduk($data, ['kd_produk' => $this->input->post('kd_produk')]);
            redirect('produk');
        }
    }
    //manajemen aksesoris
    public function aksesoris()
    {
        $data['title'] = 'Aksesoris';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Produk_model', 'produk');
        $data['produk'] = $this->produk->getAksProduk();
 
        
        $this->form_validation->set_rules('kd_produk', 'Kode Produk', 'required', [
            'required' => 'Kode Produk harus diisi']);
        $this->form_validation->set_rules('kategori_produk', 'Kategori', 'required', [
            'required' => 'Kategori harus diisi']);
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', [
            'required' => 'Nama Produk harus diisi']);
        $this->form_validation->set_rules('jenis_hewan', 'Jenis hewan', 'required', [
            'required' => 'Jenis Hewan harus diisi']);
        $this->form_validation->set_rules('berat_bersih', ' Berat Bersih', 'required', [
            'required' => 'Berat Bersih harus diisi']);
        $this->form_validation->set_rules('stok', 'Stok Barang', 'required|numeric', [
            'required' => 'Stok Barang harus diisi',
            'numeric' => 'Yang anda masukan bukan angka']);
        $this->form_validation->set_rules('harga', 'Harga Jual', 'required|min_length[3]|numeric', [
            'required' => 'Harga harus diisi', 
            'min_length' => 'Masukan Harga dengan benar', 
            'numeric' => 'Yang anda masukan bukan angka']);
        
        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();
        //memuat atau memanggil library upload
        $this->load->library('upload', $config);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('produk/aksesoris', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
                $gambar = $image['file_name'];
            } else {
                $gambar = $this->input->post('old_pict', TRUE);
            }
            $data = [
                'nama_produk' => $this->input->post('nama_produk', true),
                'kategori_produk' => $this->input->post('kategori_produk', true),
                'jenis_hewan' => $this->input->post('jenis_hewan', true),
                'kd_produk' => $this->input->post('kd_produk', true),
                'berat_bersih' => $this->input->post('berat_bersih', true),
                'stok' => $this->input->post('stok', true),
                'harga' => $this->input->post('harga', true),
                'gambar' => $gambar
            ];
            $this->Produk_model->simpanproduk($data);
            redirect('aksesoris');
        }
    }

    //manajemen mainan
    public function mainan()
    {
        $data['title'] = 'mainan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Produk_model', 'produk');
        $data['produk'] = $this->produk->getMainProduk();
 
        
        $this->form_validation->set_rules('kd_produk', 'Kode Produk', 'required', [
            'required' => 'Kode Produk harus diisi']);
        $this->form_validation->set_rules('kategori_produk', 'Kategori', 'required', [
            'required' => 'Kategori harus diisi']);
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', [
            'required' => 'Nama Produk harus diisi']);
        $this->form_validation->set_rules('jenis_hewan', 'Jenis hewan', 'required', [
            'required' => 'Jenis Hewan harus diisi']);
        $this->form_validation->set_rules('berat_bersih', ' Berat Bersih', 'required', [
            'required' => 'Berat Bersih harus diisi']);
        $this->form_validation->set_rules('stok', 'Stok Barang', 'required|numeric', [
            'required' => 'Stok Barang harus diisi',
            'numeric' => 'Yang anda masukan bukan angka']);
        $this->form_validation->set_rules('harga', 'Harga Jual', 'required|min_length[3]|numeric', [
            'required' => 'Harga harus diisi', 
            'min_length' => 'Masukan Harga dengan benar', 
            'numeric' => 'Yang anda masukan bukan angka']);
        
        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();
        //memuat atau memanggil library upload
        $this->load->library('upload', $config);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('produk/mainan', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
                $gambar = $image['file_name'];
            } else {
                $gambar = $this->input->post('old_pict', TRUE);
            }
            $data = [
                'nama_produk' => $this->input->post('nama_produk', true),
                'kategori_produk' => $this->input->post('kategori_produk', true),
                'jenis_hewan' => $this->input->post('jenis_hewan', true),
                'kd_produk' => $this->input->post('kd_produk', true),
                'berat_bersih' => $this->input->post('berat_bersih', true),
                'stok' => $this->input->post('stok', true),
                'harga' => $this->input->post('harga', true),
                'gambar' => $gambar
            ];
            $this->Produk_model->simpanproduk($data);
            redirect('aksesoris');
        }
    }

    //manajemen makanan
    public function makanan()
    {
        $data['title'] = 'makanan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Produk_model', 'produk');
        $data['produk'] = $this->produk->getMknProduk();
 
        
        $this->form_validation->set_rules('kd_produk', 'Kode Produk', 'required', [
            'required' => 'Kode Produk harus diisi']);
        $this->form_validation->set_rules('kategori_produk', 'Kategori', 'required', [
            'required' => 'Kategori harus diisi']);
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', [
            'required' => 'Nama Produk harus diisi']);
        $this->form_validation->set_rules('jenis_hewan', 'Jenis hewan', 'required', [
            'required' => 'Jenis Hewan harus diisi']);
        $this->form_validation->set_rules('berat_bersih', ' Berat Bersih', 'required', [
            'required' => 'Berat Bersih harus diisi']);
        $this->form_validation->set_rules('stok', 'Stok Barang', 'required|numeric', [
            'required' => 'Stok Barang harus diisi',
            'numeric' => 'Yang anda masukan bukan angka']);
        $this->form_validation->set_rules('harga', 'Harga Jual', 'required|min_length[3]|numeric', [
            'required' => 'Harga harus diisi', 
            'min_length' => 'Masukan Harga dengan benar', 
            'numeric' => 'Yang anda masukan bukan angka']);
        
        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();
        //memuat atau memanggil library upload
        $this->load->library('upload', $config);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('produk/makanan', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
                $gambar = $image['file_name'];
            } else {
                $gambar = $this->input->post('old_pict', TRUE);
            }
            $data = [
                'nama_produk' => $this->input->post('nama_produk', true),
                'kategori_produk' => $this->input->post('kategori_produk', true),
                'jenis_hewan' => $this->input->post('jenis_hewan', true),
                'kd_produk' => $this->input->post('kd_produk', true),
                'berat_bersih' => $this->input->post('berat_bersih', true),
                'stok' => $this->input->post('stok', true),
                'harga' => $this->input->post('harga', true),
                'gambar' => $gambar
            ];
            $this->Produk_model->simpanproduk($data);
            redirect('aksesoris');
        }
    }

    
}
