<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuisioner extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('kuisioner_m');
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth');
        }
    }
    public function index()
    {
        $id   = $this->user_model->getuser();

        $data = [
            'title'  => "Kuisioner",
            'user'   => $this->user_model->getuser(),
            'kuisioner' => $this->db->get_where('kuisioner', ['id_user' => $id['id_user']])->result_array(),
            'tahun' => $this->db->get('periode')->result_array()
        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('admin/kuisioner', $data);
        $this->load->view('pages/footer');
    }
    public function tambah()
    {
        $link = $this->input->post('username') . '-triwulan-' . $this->input->post('triwulan') . '-tahun-' . $this->input->post('tahun');
        $data = [
            'tahun' => $this->input->post('tahun'),
            'triwulan' => $this->input->post('triwulan'),
            'id_user' => $this->input->post('id_user'),
            'link' => $link,
        ];
        $this->db->insert('kuisioner', $data);
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
        redirect('kuisioner');
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

    public function delete($id)
    {
        $this->db->where('id_kuisioner', $id);
        $this->db->delete('kuisioner');
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        redirect('kuisioner');
    }
}
