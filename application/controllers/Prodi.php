<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user')) {
            redirect('auth');
            return;
        }
        $this->load->model('ProdiModel');
        $this->load->model('FakultasModel');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Daftar Program Studi';
        $data['prodi'] = $this->ProdiModel->getAll();
        $this->load->view('layout/header', $data);
        $this->load->view('prodi/index', $data);
        $this->load->view('layout/footer', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Program Studi';
        $data['fakultas'] = $this->FakultasModel->getAll();
        $data['action'] = base_url('prodi/tambah');
        $data['button'] = 'Simpan';
        $data['row'] = null;

        $this->form_validation->set_rules('prodi_id', 'ID Prodi', 'required|numeric|is_unique[prodi.prodi_id]');
        $this->form_validation->set_rules('prodi_name', 'Nama Program Studi', 'trim|required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('fakultas_id', 'Fakultas', 'required|numeric');
        $this->form_validation->set_rules('prodi_strata', 'Strata', 'required|in_list[D3,S1,S2]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('prodi/form', $data);
            $this->load->view('layout/footer', $data);
            return;
        }

        $insert = [
            'prodi_id' => $this->input->post('prodi_id', true),
            'prodi_name' => $this->input->post('prodi_name', true),
            'fakultas_id' => $this->input->post('fakultas_id', true),
            'prodi_strata' => $this->input->post('prodi_strata', true)
        ];

        $this->ProdiModel->insert($insert);
        $this->session->set_flashdata('swal', [
            'icon' => 'success',
            'title' => 'Sukses',
            'text' => 'Program Studi berhasil ditambahkan'
        ]);
        redirect('prodi');
    }

    public function ubah($id = null)
    {
        if (!$id) {
            $this->session->set_flashdata('swal', [
                'icon' => 'warning',
                'title' => 'Tidak Ditemukan',
                'text' => 'Data tidak ditemukan'
            ]);
            redirect('prodi');
            return;
        }

        $row = $this->ProdiModel->getById($id);

        if (!$row) {
            $this->session->set_flashdata('swal', [
                'icon' => 'warning',
                'title' => 'Tidak Ditemukan',
                'text' => 'Data tidak ditemukan'
            ]);
            redirect('prodi');
            return;
        }

        $data['title'] = 'Ubah Program Studi';
        $data['action'] = base_url('prodi/ubah/'.$id);
        $data['button'] = 'Update';
        $data['row'] = $row;
        $data['fakultas'] = $this->FakultasModel->getAll();

        $this->form_validation->set_rules('prodi_name', 'Nama Program Studi', 'trim|required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('fakultas_id', 'Fakultas', 'required|numeric');
        $this->form_validation->set_rules('prodi_strata', 'Strata', 'required|in_list[D3,S1,S2]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('prodi/form', $data);
            $this->load->view('layout/footer', $data);
            return;
        }

        $update = [
            'prodi_name' => $this->input->post('prodi_name', true),
            'fakultas_id' => $this->input->post('fakultas_id', true),
            'prodi_strata' => $this->input->post('prodi_strata', true)
        ];

        $this->ProdiModel->update($id, $update);
        $this->session->set_flashdata('swal', [
            'icon' => 'success',
            'title' => 'Sukses',
            'text' => 'Program Studi berhasil diubah'
        ]);
        redirect('prodi');
    }

    public function hapus($id = null)
    {
        if (!$id) {
            $this->session->set_flashdata('swal', [
                'icon' => 'warning',
                'title' => 'Tidak Ditemukan',
                'text' => 'Data tidak ditemukan'
            ]);
            redirect('prodi');
            return;
        }

        $row = $this->ProdiModel->getById($id);

        if (!$row) {
            $this->session->set_flashdata('swal', [
                'icon' => 'warning',
                'title' => 'Tidak Ditemukan',
                'text' => 'Data tidak ditemukan'
            ]);
            redirect('prodi');
            return;
        }

        $this->ProdiModel->delete($id);
        $this->session->set_flashdata('swal', [
            'icon' => 'warning',
            'title' => 'Terhapus',
            'text' => 'Program Studi berhasil dihapus'
        ]);
        redirect('prodi');
    }
}
