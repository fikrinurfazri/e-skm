<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('sweet_alert');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('user_model');
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data = [
            'title'  => "Dashboard",
            'user'   => $this->user_model->getuser(),
            'responden' => $this->db->count_all_results('responden'),
            'instansi' => $this->db->count_all_results('user'),
        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('admin/index', $data);
        $this->load->view('pages/footer');
    }
    public function pelayanan()
    {
        $id = $this->user_model->getuser();
        $data = [
            'title'  => "Pelayanan",
            'user'   => $this->user_model->getuser(),
            'pelayanan' => $this->db->get_where('pelayanan', ['id_user' => $id['id_user']])->result_array()

        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('admin/pelayanan', $data);
        $this->load->view('pages/footer');
    }
    public function lihat($id)
    {
        $data = [
            'title'  => "Hasil SKM",
            'user'   => $this->user_model->getuser(),
            'skm' => $this->user_model->getlihat($id)
        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('admin/lihat', $data);
        $this->load->view('pages/footer');
    }
    public function kuisioner($id)
    {
        $data = [
            'title'  => "Hasil SKM",
            'user'   => $this->user_model->getuser(),
            'kuis' => $this->user_model->getkuis($id)
        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('admin/kuis', $data);
        $this->load->view('pages/footer');
    }
    public function periode()
    {
        $id = $this->user_model->getuser();
        $data = [
            'title'  => "periode",
            'user'   => $this->user_model->getuser(),
            'periode' => $this->db->get('periode')->result_array()

        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('admin/periode', $data);
        $this->load->view('pages/footer');
    }
    public function user()
    {
        $id = $this->user_model->getuser();
        $data = [
            'title'  => "periode",
            'user'   => $this->user_model->getuser(),
            'pegawai' => $this->db->get('user')->result_array()

        ];
        // $this->load->view('pages/head', $data);
        // $this->load->view('pages/nav');
        $this->load->view('admin/user', $data);
        // $this->load->view('pages/footer');
    }
    public function profile()
    {
        $id = $this->user_model->getuser();
        $data = [
            'title'  => "Profile",
            'user'   => $this->user_model->getuser(),
        ];
        if ($this->input->method() === 'post') {
            $rules = $this->user_model->password_rules();
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('pages/head', $data);
                $this->load->view('pages/nav');
                $this->load->view('admin/profile', $data);
                $this->load->view('pages/footer');
            }
            $new_password_data = [
                'id_user' => $id['id_user'],
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            ];

            if ($this->user_model->update($new_password_data)) {
                $this->session->set_flashdata('success', 'Password was changed');
                redirect('admin/profile');
            }
        }

        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('admin/profile', $data);
        $this->load->view('pages/footer');
    }


    public function tambah()
    {
        $data = [
            'pelayanan' => $this->input->post('pelayanan'),
            'id_user' => $this->input->post('id_user'),

        ];
        $this->db->insert('pelayanan', $data);
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
        redirect('pelayanan');
    }
    public function tambahuser()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),

        ];
        $this->db->insert('user', $data);
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
        redirect('user');
    }
    public function tambahperiode()
    {
        $data = [
            'tahun' => $this->input->post('tahun'),
            'active' => 1,

        ];
        $this->db->insert('periode', $data);
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
        redirect('periode');
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
    public function editpel()
    {
        $id = $this->input->post('id_pelayanan');
        $data = [
            'pelayanan' => $this->input->post('pelayanan'),

        ];
        $this->db->where('id_pelayanan', $id);
        $this->db->update('pelayanan', $data);
        $this->session->set_flashdata('success', 'Data berhasil Di Ubah.');
        redirect('pelayanan');
    }
    public function updateperiode()
    {
        $id = $this->input->post('id_periode');
        $data = [
            'tahun' => $this->input->post('tahun'),
            'active' => $this->input->post('active'),

        ];
        $this->db->where('id_periode', $id);
        $this->db->update('periode', $data);
        $this->session->set_flashdata('success', 'Data berhasil Di Ubah.');
        redirect('periode');
    }
    public function updateuser()
    {
        $id = $this->input->post('id_user');
        $data = [
            'username' => $this->input->post('username'),
            'nama' => $this->input->post('nama')
        ];
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
        $this->session->set_flashdata('success', 'Data berhasil Di Ubah.');
        redirect('user');
    }

    public function deletepelayanan($id)
    {
        $this->db->where('id_pelayanan', $id);
        $this->db->delete('pelayanan');
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        redirect('admin/pelayanan');
    }
    public function deleteperiode($id)
    {
        $this->db->where('id_periode', $id);
        $this->db->delete('periode');
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        redirect('periode');
    }
    public function deleteuser($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        redirect('user');
    }
}
