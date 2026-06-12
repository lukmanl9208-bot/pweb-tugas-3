<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('MahasiswaModel');
        $this->load->helper(array('url', 'form'));
    }

    public function index() {
        $data['title'] = 'Login';
        $this->load->view('layout/header', $data);
        $this->load->view('auth/login');
        $this->load->view('layout/footer');
    }

    public function login() {
        if ($this->input->server('REQUEST_METHOD') !== 'POST') {
            redirect('auth');
            return;
        }

        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);

        $user = $this->MahasiswaModel->checkAccount([
            'email' => $email,
            'password' => $password
        ]);

        if ($user) {
            $this->session->set_userdata('user', $user);
            $this->session->set_flashdata('swal', [
                'icon' => 'success',
                'title' => 'Login Sukses',
                'text' => 'Selamat datang!'
            ]);
            redirect('fakultas');
        } else {
            $this->session->set_flashdata('swal', [
                'icon' => 'error',
                'title' => 'Login Gagal',
                'text' => 'Email atau password salah.'
            ]);
            redirect('auth');
        }
    }
}
