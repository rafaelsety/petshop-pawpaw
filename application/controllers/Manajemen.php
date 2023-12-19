<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajemen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Manajemen';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Manajemen_model', 'manajemen');
        $data['manajemen'] = $this->manajemen->getUser();


        $this->form_validation->set_rules('nama', 'nama', 'required|min_length[3]', [
            'required' => 'Nama user harus di isi',
            'min_length' => 'Nama user terlalu pendek'
        ]);
        $this->form_validation->set_rules('username', 'username', 'required|min_length[3]', [
            'required' => 'Username harus di isi',
            'min_length' => 'Username terlalu pendek'
        ]);
        $this->form_validation->set_rules('nik', 'nik', 'required|min_length[3]|max_length[16]|numeric', [
            'required' => 'NIK user harus di isi',
            'min_length' => 'NIK user terlalu pendek',
            'max_length' => 'NIK user terlalu panjang',
            'numeric' => 'NIK yang anda masukan bukan angka'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|min_length[3]', [
            'required' => 'Password harus di isi',
            'min_length' => 'Password terlalu pendek',
        ]);
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required', [
            'required' => 'Jabatan harus di isi',
        ]);
        $this->form_validation->set_rules('status', 'status', 'required', [
            'required' => 'Status harus di isi',
        ]);
        $this->form_validation->set_rules('tanggal_masuk', 'tanggal_masuk', 'required', [
            'required' => 'Tanggal masuk harus di isi',
        ]);
        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/profile/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_heigth'] = '1000';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('manajemen/index', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data();
                $image = $gambar['file_name'];
            } else {
                $image = '';
            }

            $data = [
                'gambar' => $image,
                'nama' => $this->input->post('nama', true),
                'username' => $this->input->post('username', true),
                'nik' => $this->input->post('nik', true),
                'password' => $this->input->post('password', true),
                'jabatan' => $this->input->post('jabatan', true),
                'status' => $this->input->post('status', true),
                'tanggal_masuk' => $this->input->post('tanggal_masuk', true),
            ];

            $this->manajemen->simpanUser($data);
            redirect('manajemen');
        }
    }
    public function hapusUser()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->Manajemen_model->hapusUser($where);
        redirect('manajemen');
    }

    public function ubahUser()
    {
        $data['title'] = 'Manajemen';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Manajemen_model', 'manajemen');
        $data['manajemen'] = $this->manajemen->userWhere(['id' => $this->uri->segment(3)])->result_array();

        $this->form_validation->set_rules('nama', 'nama', 'required|min_length[3]', [
            'required' => 'Nama user harus di isi',
            'min_length' => 'Nama user terlalu pendek'
        ]);
        $this->form_validation->set_rules('username', 'username', 'required|min_length[3]', [
            'required' => 'Username harus di isi',
            'min_length' => 'Username terlalu pendek'
        ]);
        $this->form_validation->set_rules('nik', 'nik', 'required|min_length[3]|max_length[16]|numeric', [
            'required' => 'NIK user harus di isi',
            'min_length' => 'NIK user terlalu pendek',
            'max_length' => 'NIK user terlalu panjang',
            'numeric' => 'NIK yang anda masukan bukan angka'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|min_length[3]', [
            'required' => 'Password harus di isi',
            'min_length' => 'Password terlalu pendek',
        ]);
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required', [
            'required' => 'Jabatan harus di isi',
        ]);
        $this->form_validation->set_rules('status', 'status', 'required', [
            'required' => 'Status harus di isi',
        ]);
        $this->form_validation->set_rules('tanggal_masuk', 'tanggal_masuk', 'required', [
            'required' => 'Tanggal masuk harus di isi',
        ]);
        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/profile/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '30000';
        $config['max_width'] = '20000';
        $config['max_heigth'] = '20000';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('manajemen/edit_user', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data();
                unlink('assets/img/profile/' . $this->input->post('old_pict', TRUE));
                $image = $gambar['file_name'];
            } else {
                $image = $this->input->post('old_pict', TRUE);
            }

            $data = [
                'gambar' => $image,
                'nama' => $this->input->post('nama', true),
                'username' => $this->input->post('username', true),
                'nik' => $this->input->post('nik', true),
                'password' => $this->input->post('password', true),
                'jabatan' => $this->input->post('jabatan', true),
                'status' => $this->input->post('status', true),
                'tanggal_masuk' => time()
            ];

            $this->manajemen->updateUser($data, ['id' => $this->input->post('id')]);
            redirect('manajemen');
        }
    }
}
