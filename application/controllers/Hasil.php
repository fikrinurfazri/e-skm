<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil extends CI_Controller
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
    public function keseluruhan()
    {
        $id = $this->user_model->getuser();
        $username = $id['username'];

        $data = [
            'title'  => "Hasil Keseluruhan SKM",
            'user'   => $this->user_model->getuser(),
            // 'sinkron'   => $this->user_model->getsinkron(),
            'hasil' => $this->db->get_where('skm', ['id_user' => $id['id_user']])->result_array(),
            'hasilike' => $this->kuisioner_m->gethasilike($username),
            'hasilsum' => $this->kuisioner_m->getsum($username),

            'hs1' => $this->db->get_where('skm', ['id_user' => $id['id_user'], 'triwulan' => 1])->row_array(),
            'hs2' => $this->db->get_where('skm', ['id_user' => $id['id_user'], 'triwulan' => 2])->row_array(),
            'hs3' => $this->db->get_where('skm', ['id_user' => $id['id_user'], 'triwulan' => 3])->row_array(),
            'hs4' => $this->db->get_where('skm', ['id_user' => $id['id_user'], 'triwulan' => 4])->row_array(),
        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('hasil/keseluruhan', $data);
        $this->load->view('pages/footer');
    }
    public function pelayanan()
    {
        $id = $this->user_model->getuser();

        $data = [
            'title'  => "Hasil pelayanan SKM",
            'user'   => $this->user_model->getuser(),
            'pelayanan' => $this->db->get_where('pelayanan', ['id_user' => $id['id_user']])->result_array(),
        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('hasil/pelayanan', $data);
        $this->load->view('pages/footer');
    }
    public function detailpel($pel)
    {
        $id = $this->user_model->getuser();

        $data = [
            'title'  => "Hasil pelayanan SKM",
            'user'   => $this->user_model->getuser(),
            'hasil' => $this->db->get_where('skm_pelayanan', ['id_pelayanan' => $pel])->result_array(),
        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('hasil/detailpel', $data);
        $this->load->view('pages/footer');
    }
    public function print($id)
    {
        $data = [
            'user'   => $this->user_model->getuser(),
            'hasil' => $this->kuisioner_m->hasil($id),
            'laki' => $this->kuisioner_m->countlaki($id),
            'perempuan' => $this->kuisioner_m->countperempuan($id),
            'sd' => $this->kuisioner_m->countsd($id),
            'smp' => $this->kuisioner_m->countsmp($id),
            'sma' => $this->kuisioner_m->countsma($id),
            'd3' => $this->kuisioner_m->countd3($id),
            's1' => $this->kuisioner_m->counts1($id),
            's2' => $this->kuisioner_m->counts2($id),
            's3' => $this->kuisioner_m->counts3($id),
        ];
        $this->load->view('hasil/print', $data);
    }
    public function responden()
    {
        $user   = $this->user_model->getuser();
        $data = [
            'title'  => "Laporan Responden",
            'user'   => $this->user_model->getuser(),

            'kuis'   => $this->db->get_where('kuisioner', ['id_user' => $user['id_user']])->result(),

        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('hasil/responden', $data);
        $this->load->view('pages/footer');
    }
    public function detailresp($id)
    {
        $data = [
            'title'  => "Detail Responden",
            'user'   => $this->user_model->getuser(),
            'responden'   => $this->db->get_where('responden', ['id_kuisioner' => $id])->result(),
            'kuisioner'   => $id,

        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('hasil/detailresponden', $data);
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
        $this->db->where('id_surat', $id);
        $this->db->delete('surat');
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        redirect('surat-keluar');
    }
}
