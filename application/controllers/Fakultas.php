<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user')) {
            redirect('auth');
            return;
        }
        $this->load->model('FakultasModel');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Daftar Fakultas';
        $data['fakultas'] = $this->FakultasModel->getAll();
        $this->load->view('layout/header', $data);
        $this->load->view('fakultas/index', $data);
        $this->load->view('layout/footer', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Fakultas';
        $data['action'] = base_url('fakultas/tambah');
        $data['button'] = 'Simpan';
        $data['row'] = null;

        $this->form_validation->set_rules('fakultas_id', 'ID Fakultas', 'required|numeric|is_unique[fakultas.fakultas_id]');
        $this->form_validation->set_rules('fakultas_name', 'Nama Fakultas', 'trim|required|min_length[3]|max_length[100]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('fakultas/form', $data);
            $this->load->view('layout/footer', $data);
            return;
        }

        $insert = [
            'fakultas_id' => $this->input->post('fakultas_id', true),
            'fakultas_name' => $this->input->post('fakultas_name', true)
        ];

        $this->FakultasModel->insert($insert);
        $this->session->set_flashdata('swal', [
            'icon' => 'success',
            'title' => 'Sukses',
            'text' => 'Fakultas berhasil ditambahkan'
        ]);
        redirect('fakultas');
    }

    public function ubah($id = null)
    {
        if (!$id) {
            $this->session->set_flashdata('swal', [
                'icon' => 'warning',
                'title' => 'Tidak Ditemukan',
                'text' => 'Data tidak ditemukan'
            ]);
            redirect('fakultas');
            return;
        }

        $row = $this->FakultasModel->getById($id);

        if (!$row) {
            $this->session->set_flashdata('swal', [
                'icon' => 'warning',
                'title' => 'Tidak Ditemukan',
                'text' => 'Data tidak ditemukan'
            ]);
            redirect('fakultas');
            return;
        }

        $data['title'] = 'Ubah Fakultas';
        $data['action'] = base_url('fakultas/ubah/'.$id);
        $data['button'] = 'Update';
        $data['row'] = $row;

        $this->form_validation->set_rules('fakultas_name', 'Nama Fakultas', 'trim|required|min_length[3]|max_length[100]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('fakultas/form', $data);
            $this->load->view('layout/footer', $data);
            return;
        }

        $update = [
            'fakultas_name' => $this->input->post('fakultas_name', true)
        ];

        $this->FakultasModel->update($id, $update);
        $this->session->set_flashdata('swal', [
            'icon' => 'success',
            'title' => 'Sukses',
            'text' => 'Fakultas berhasil diubah'
        ]);
        redirect('fakultas');
    }

    public function hapus($id = null)
    {
        if (!$id) {
            $this->session->set_flashdata('swal', [
                'icon' => 'warning',
                'title' => 'Tidak Ditemukan',
                'text' => 'Data tidak ditemukan'
            ]);
            redirect('fakultas');
            return;
        }

        $row = $this->FakultasModel->getById($id);

        if (!$row) {
            $this->session->set_flashdata('swal', [
                'icon' => 'warning',
                'title' => 'Tidak Ditemukan',
                'text' => 'Data tidak ditemukan'
            ]);
            redirect('fakultas');
            return;
        }

        $this->FakultasModel->delete($id);
        $this->session->set_flashdata('swal', [
            'icon' => 'warning',
            'title' => 'Terhapus',
            'text' => 'Fakultas berhasil dihapus'
        ]);
        redirect('fakultas');
    }
}
