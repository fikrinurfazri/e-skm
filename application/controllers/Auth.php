<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('auth_model');
    }

    public function index()
    {
        $this->load->model('auth_model');
        $this->load->library('form_validation');

        $rules = $this->auth_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            return $this->load->view('auth/index');
        }

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($this->auth_model->login($username, $password)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Login</div>');

            redirect('dashboard');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username atau password salah</div>');
        }

        $this->load->view('auth/index');
    }


    public function logout()
    {

        $this->session->sess_destroy();
        redirect('auth');
    }
}
