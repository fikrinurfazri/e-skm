<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth');
        }
    }

    public function index()
    {
        $us = $this->user_model->getuser();
        $nama = $us['nama'];
        $data = [
            'title'  => "Persuratan/Nomor Surat",
            'user'   => $this->user_model->getuser(),
            'nomor' => $this->db->get_where('surat', ['active' => 1])->result_array(),
            'pengajuan' => $this->db->get_where('surat', ['pemohon' =>  $nama])->result_array()
        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('user/nomor-surat', $data);
        $this->load->view('pages/footer');
    }

    public function tambah()
    {
        $data = [
            'nomor' => $this->input->post('nomor'),
            'tanggal' => $this->input->post('tanggal'),
            'perihal' => $this->input->post('perihal'),
            'pemohon' => $this->input->post('pemohon'),
            'penerima' => $this->input->post('penerima'),
            'active' => 0,
        ];
        $this->db->insert('surat', $data);
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
        redirect('nomor-surat');
    }
}
