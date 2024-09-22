<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('home_m');
    }
    public function index()
    {

        $keyword = $this->input->get('cari');
        $data = [
            'title'  => "Kuisioner",
            'kuisioner' => $this->db->get('kuisioner')->result_array(),
            'tahun' => $this->db->get('periode')->result_array(),
            // 'user' => $this->home_m->getuser(),
            'count' => $this->db->count_all_results('user'),
            'countr' => $this->db->count_all_results('responden'),
            'keyword'    => $keyword,
            'user'        => $this->home_m->ambil_data($keyword)
        ];
        $this->load->view('pages/front/head', $data);
        $this->load->view('home/index', $data);
        $this->load->view('pages/footer');
    }
    public function kuis($link)
    {
        $data = [
            'title'  => "Kuisioner",
            'dinas' => $this->home_m->get($link),
            'pelayanan' => $this->home_m->getpel($link)
        ];
        $this->load->view('pages/head', $data);
        $this->load->view('home/kuis', $data);
        $this->load->view('pages/footer');
    }
    public function detail($tahun)
    {
        $data = [
            'title'  => "Kuisioner",
            'tahun'  => $tahun,
            'detail' => $this->home_m->getdetail($tahun),
            'detail2' => $this->home_m->getdetail2($tahun),
            'detail3' => $this->home_m->getdetail3($tahun),
            'detail4' => $this->home_m->getdetail4($tahun),
        ];
        $this->load->view('pages/front/head', $data);
        $this->load->view('home/detail', $data);
        $this->load->view('pages/footer');
    }
    public function detailorg($username)
    {
        $data = [
            'title'  => "Kuisioner",
            'tahun'  => $username,
            'hasil' => $this->db->get_where('skm', ['username' => $username])->result_array(),
            'hasillike' => $this->home_m->gethasilparent($username),
            // 'kuis' => $this->db->get_where('kuisioner', ['username' => $username])->result_array(),
            'opd' => $this->home_m->getopdname($username)

        ];
        $this->load->view('pages/front/head', $data);
        $this->load->view('home/detailorg', $data);
        $this->load->view('pages/footer');
    }
    function cek_data($id)
    {
        $query = $this->db->get_where('t_hasil', array('KODE_UNIT_KERJA' => $id));
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function kirim()
    {
        //jumlah nilai semua unsur
        $u1 = $this->input->post('u1');
        $u2 = $this->input->post('u2');
        $u3 = $this->input->post('u3');
        $u4 = $this->input->post('u4');
        $u5 = $this->input->post('u5');
        $u6 = $this->input->post('u6');
        $u7 = $this->input->post('u7');
        $u8 = $this->input->post('u8');
        $u9 = $this->input->post('u9');
        $n = $u1 + $u2 + $u3 + $u4 + $u5 + $u6 + $u7 + $u8 + $u9;



        $dataunsur = ['u1' => $u1, 'u2' => $u2,  'u3' => $u3, 'u4' => $u4,  'u5' => $u5,  'u6' => $u6,  'u7' => $u7,  'u8' => $u8, 'u9' => $u9, 'id_kuisioner' => $this->input->post('id_kuisioner')];
        $this->db->insert('unsur_skm', $dataunsur);


        //variabel
        $user = $this->input->post('id_user');
        $username = $this->input->post('username');
        $tahun = $this->input->post('tahun');
        $triwulan = $this->input->post('triwulan');


        //data input tabel hasil
        $data = [
            'umur' => $this->input->post('umur'),
            'pendidikan' => $this->input->post('pendidikan'),
            'kelamin' => $this->input->post('jk'),
            'id_pelayanan' => $this->input->post('id_pelayanan'),
            'id_kuisioner' => $this->input->post('id_kuisioner'),
            'pekerjaan' => $this->input->post('pekerjaan'),
        ];
        $this->db->insert('responden', $data);

        //data input tabel skm
        $res = $this->db->get_where('skm', ['id_user' => $user, 'tahun' => $tahun, 'triwulan' => $triwulan])->row_array();
        $responden = $res['responden'] + 1;
        $nilaiakhir = $res['nilai'] + $n;
        $rata = $nilaiakhir / $responden;
        $nt = ($nilaiakhir / $responden) * 0.11;
        $ikm = $nt * 25;

        if ($ikm >= 25.00 && $ikm <= 64.99) {
            $mutu = 'D';
        } elseif ($ikm >= 65.00 && $ikm <= 76.60) {
            $mutu = 'C';
        } elseif ($ikm >= 76.61 && $ikm <= 88.30) {
            $mutu = 'B';
        } elseif ($ikm >= 88.31 && $ikm <= 100.00) {
            $mutu = 'A';
        } else {
            $mutu = 'T';
        }

        $hasil = [
            'tahun' => $this->input->post('tahun'),
            'triwulan' => $this->input->post('triwulan'),
            'responden' => $responden,
            'id_kuisioner' => $this->input->post('id_kuisioner'),
            'id_user' => $this->input->post('id_user'),
            'username' => $this->input->post('username'),
            'ikm' => $ikm,
            'nrrt' => $nt,
            'rata_rata' => $rata,
            'mutu' => $mutu,
            'nilai' => $nilaiakhir,
            'nilai_index' => $nt,

        ];

        $id_pelayanan = $this->input->post('id_pelayanan');
        $resp = $this->db->get_where('skm_pelayanan', ['id_pelayanan' => $id_pelayanan, 'tahun' => $tahun, 'triwulan' => $triwulan])->row_array();
        $respondenpel = $resp['responden'] + 1;
        $hasilp = [
            'tahun' => $this->input->post('tahun'),
            'triwulan' => $this->input->post('triwulan'),
            'responden' => $respondenpel,
            'id_pelayanan' => $this->input->post('id_pelayanan'),
            'ikm' => $ikm,
            'nrrt' => $nt,
            'rata_rata' => $rata,
            'mutu' => $mutu,
            'nilai' => $nilaiakhir,
            'nilai_index' => $nt,

        ];


        //update dan insert kuisioner
        $query = $this->db->get_where('skm', ['id_user' => $user, 'tahun' => $tahun, 'triwulan' => $triwulan]);
        if ($query->num_rows() > 0) {
            $this->db->update('skm', $hasil, ['id_user' => $user, 'triwulan' => $triwulan, 'tahun' => $tahun]);
            $this->home_m->update($hasil, $user, $tahun, $triwulan);
        } else {
            $this->db->insert('skm', $hasil);
        }

        //update atau insert kuisioner berdasarkan parent
        // $id_user_trimmed = substr($user, 0, 6);

        // $parent = $this->db->get_where('skm', ['id_user' => $id_user_trimmed, 'tahun' => $tahun, 'triwulan' => $triwulan]);
        // if ($parent->num_rows() > 0) {
        //     $this->db->update('skm', $hasil, ['id_user' => $id_user_trimmed, 'triwulan' => $triwulan, 'tahun' => $tahun]);
        //     $this->home_m->update($hasil, $id_user_trimmed, $tahun, $triwulan);
        // } else {
        //     $this->db->insert('skm', $hasil);
        // }


        //update atau insert skm pelayanan
        $aksi = $this->db->get_where('skm_pelayanan', ['id_pelayanan' => $id_pelayanan, 'tahun' => $tahun, 'triwulan' => $triwulan]);
        if ($aksi->num_rows() > 0) {
            $this->db->update('skm_pelayanan', $hasilp, ['id_pelayanan' => $id_pelayanan, 'tahun' => $tahun, 'triwulan' => $triwulan]);
        } else {
            $this->db->insert('skm_pelayanan', $hasilp);
        }


        $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
        redirect('terimakasih');
    }
    public function message()
    {
        $data = [
            'title'  => "Message",

        ];
        $this->load->view('pages/front/head_m', $data);
        $this->load->view('home/message');
        $this->load->view('pages/footer');
    }
}
