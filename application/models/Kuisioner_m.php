<?php

class Kuisioner_m extends CI_Model
{
    public function triwulan1()
    {
        $id = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $this->db->select_sum('nilai');
        $this->db->where('id_user', $id['id_user']);
        return $this->db->get('hasil')->row_array();
    }
    public function responden()
    {
        $id = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        return  $this->db->select('id_user')
            ->from('hasil')
            ->like('id_user', $id['id_user'])
            ->where("DATE_FORMAT(TANGGAL, '%m') BETWEEN '$t_awal' AND '$t_akhir'")
            ->get()->num_rows();
    }
    public function hasil($id)
    {
        return $this->db->select('*')
            ->from('skm')
            ->join('user', 'user.id_user = skm.id_user')
            ->join('responden', 'responden.id_kuisioner = skm.id_kuisioner')
            ->where('skm.id_skm', $id)
            ->get()->row();
    }
    public function countByCriteria($id, $column, $value)
    {
        return $this->db->from('skm')
            ->join('user', 'user.id_user = skm.id_user')
            ->join('responden', 'responden.id_kuisioner = skm.id_kuisioner')
            ->where('skm.id_skm', $id)
            ->where("responden.$column", $value)
            ->count_all_results();
    }

    // Count male respondents
    public function countlaki($id)
    {
        return $this->countByCriteria($id, 'kelamin', 'L');
    }

    // Count female respondents
    public function countperempuan($id)
    {
        return $this->countByCriteria($id, 'kelamin', 'P');
    }

    // Count respondents with SD education
    public function countsd($id)
    {
        return $this->countByCriteria($id, 'pendidikan', 'SD');
    }
    public function countsmp($id)
    {
        return $this->countByCriteria($id, 'pendidikan', 'SMP');
    }
    public function countsma($id)
    {
        return $this->countByCriteria($id, 'pendidikan', 'SMA');
    }
    public function countd3($id)
    {
        return $this->countByCriteria($id, 'pendidikan', 'D3');
    }
    //oey
    public function counts1($id)
    {
        return $this->countByCriteria($id, 'pendidikan', 'S1');
    }
    public function counts2($id)
    {
        return $this->countByCriteria($id, 'pendidikan', 'S2');
    }
    public function counts3($id)
    {
        return $this->countByCriteria($id, 'pendidikan', 'S3');
    }
    public function gethasilike($username)
    {
        return $this->db->select('*')
            ->from('skm')
            ->join('user', 'user.username = skm.username')
            ->like('user.username', $username)
            ->where('user.username !=', $username)
            ->get()->result_array();
    }
    public function getsum($username)
    {
        $this->db->select('
            triwulan,
            tahun,
            SUM(responden) as total_responden,
            SUM(nilai) as total_nilai,
            (SUM(nilai) / SUM(responden)) as rata_rata,
            ((SUM(nilai) / SUM(responden)) * 0.11) as nrrt,
            (((SUM(nilai) / SUM(responden)) * 0.11) * 25) as ikm
        ');
        $this->db->like('username', $username, 'after');
        $this->db->group_by(array('triwulan', 'tahun')); // Mengelompokkan hasil berdasarkan triwulan dan tahun
        $query = $this->db->get('skm'); // Ganti 'nama_tabel' dengan nama tabel Anda

        $results = $query->result();

        // Menentukan mutu berdasarkan IKM
        foreach ($results as $result) {
            if ($result->ikm >= 88.31 && $result->ikm <= 100) {
                $result->mutu = 'A';
            } elseif ($result->ikm >= 76.61 && $result->ikm <= 88.30) {
                $result->mutu = 'B';
            } elseif ($result->ikm >= 65.00 && $result->ikm <= 76.60) {
                $result->mutu = 'C';
            } elseif ($result->ikm >= 25.00 && $result->ikm <= 64.99) {
                $result->mutu = 'D';
            } else {
                $result->mutu = 'T';
            }
        }

        return $results;
    }
}
