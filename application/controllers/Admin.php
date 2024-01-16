<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $data = [
            'title'  => "Home/Dashboard",
            'user'   => $this->user_model->getuser(),
            'masuk' => $this->db->count_all_results('suratmasuk'),
            'pegawai' => $this->db->count_all_results('user'),
            'keluar' => $this->db->count_all_results('surat')
        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('admin/index', $data);
        $this->load->view('pages/footer');
    }
    public function suratmasuk()
    {
        $data = [
            'title'  => "Persuratan/Surat Masuk",
            'user'   => $this->user_model->getuser(),
            'nomor' => $this->db->get('suratmasuk')->result_array()
        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('admin/suratmasuk', $data);
        $this->load->view('pages/footer');
    }
    public function suratkeluar()
    {
        $ns = $this->db->order_by('id_surat', 'DESC')->get('surat')->result_array();

        $data = [
            'title'  => "Persuratan/Surat Keluar",
            'user'   => $this->user_model->getuser(),
            'nomor' => $ns

        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('admin/suratkeluar', $data);
        $this->load->view('pages/footer');
    }
    public function pegawai()
    {
        $data = [
            'title'  => "Settings/Pegawai",
            'user'   => $this->user_model->getuser(),
            'pegawai' => $this->db->get_where('user', ['level' => 2])->result_array()
        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('admin/pegawai', $data);
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
            'active' => 1,
        ];
        $this->db->insert('surat', $data);
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
        redirect('surat-keluar');
    }
    public function tambahsuratmasuk()
    {
        $data = [
            'nomor' => $this->input->post('nomor'),
            'tanggal' => $this->input->post('tanggal'),
            'perihal' => $this->input->post('perihal'),
            'dari' => $this->input->post('dari'),
            'tujuan' => $this->input->post('tujuan'),
        ];
        $this->db->insert('suratmasuk', $data);
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
        redirect('surat-masuk');
    }
    public function validasi()
    {
        $id = $this->input->post('id_surat');
        $data = [
            'active' => $this->input->post('active'),
        ];
        $this->db->where('id_surat', $id);
        $this->db->update('surat', $data);
        $this->session->set_flashdata('success', 'Data berhasil Di Approve.');
        redirect('surat-keluar');
    }
    public function update()
    {
        $id = $this->input->post('id_surat');
        $data = [
            'nomor' => $this->input->post('nomor'),
            'tanggal' => $this->input->post('tanggal'),
            'perihal' => $this->input->post('perihal'),
            'pemohon' => $this->input->post('pemohon'),
            'penerima' => $this->input->post('penerima'),
        ];
        $this->db->where('id_surat', $id);
        $this->db->update('surat', $data);
        $this->session->set_flashdata('success', 'Data berhasil Di Ubah.');
        redirect('surat-keluar');
    }
    public function updatesuratmasuk()
    {
        $id = $this->input->post('id_suratmasuk');
        $data = [
            'nomor' => $this->input->post('nomor'),
            'tanggal' => $this->input->post('tanggal'),
            'perihal' => $this->input->post('perihal'),
            'dari' => $this->input->post('dari'),
            'tujuan' => $this->input->post('tujuan'),
        ];
        $this->db->where('id_suratmasuk', $id);
        $this->db->update('suratmasuk', $data);
        $this->session->set_flashdata('success', 'Data berhasil Di Ubah.');
        redirect('surat-masuk');
    }
    public function tambahuser()
    {

        $data = [
            'username' => $this->input->post('username'),
            'nama' => $this->input->post('nama'),
            'level' => 2,
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
        ];
        $this->db->insert('user', $data);
        $this->session->set_flashdata('success', 'Data berhasil ditambah.');

        redirect('pegawai');
    }
    public function delete($id)
    {
        $this->db->where('id_surat', $id);
        $this->db->delete('surat');
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        redirect('surat-keluar');
    }
    public function deletesuratmasuk($id)
    {
        $this->db->where('id_suratmasuk', $id);
        $this->db->delete('suratmasuk');
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        redirect('surat-masuk');
    }
}
