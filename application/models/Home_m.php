<?php

class Home_m extends CI_Model
{
    public function get($link)
    {
        return $this->db->select('*')
            ->from('kuisioner')
            ->join('user', 'user.id_user = kuisioner.id_user')
            ->where('kuisioner.link', $link)
            ->get()->row_array();
    }
    public function getpel($link)
    {
        return $this->db->select('*')
            ->from('user')
            ->join('kuisioner', 'kuisioner.id_user = user.id_user')
            ->join('pelayanan', 'pelayanan.id_user = user.id_user')
            ->where('kuisioner.link', $link)
            ->get()->result_array();
    }
    public function getuser()
    {
        return $this->db->select('*')
            ->from('user')
            ->where('LENGTH(username)', 6)
            ->order_by('username', 'ASC')
            ->get()->result_array();
    }
    public function gethasilparent($username)
    {
        return $this->db->select('*')
            ->from('skm')
            ->join('user', 'user.username = skm.username')
            ->like('user.username', $username)
            ->where('user.username !=', $username)
            ->get()->result_array();
    }
    public function getopdname($username)
    {

        return $this->db->get_where('user', ['username' => $username])->row_array();
    }
    public function getdetail($tahun)
    {
        return $this->db->select('*')
            ->from('skm')
            ->join('user', 'user.id_user = skm.id_user')
            ->where('skm.tahun', $tahun)
            ->where('skm.triwulan', 1)
            ->where('LENGTH(user.username)', 6)
            ->order_by('user.username', 'ASC')
            ->get()->result_array();
    }
    public function getdetail2($tahun)
    {
        return $this->db->select('*')
            ->from('skm')
            ->join('user', 'user.id_user = skm.id_user')
            ->where('skm.tahun', $tahun)
            ->where('skm.triwulan', 2)
            ->where('LENGTH(user.username)', 6)
            ->order_by('user.username', 'ASC')

            ->get()->result_array();
    }
    public function getdetail3($tahun)
    {
        return $this->db->select('*')
            ->from('skm')
            ->join('user', 'user.id_user = skm.id_user')
            ->where('skm.tahun', $tahun)
            ->where('skm.triwulan', 3)
            ->where('LENGTH(user.username)', 6)
            ->order_by('user.username', 'ASC')

            ->get()->result_array();
    }
    public function getdetail4($tahun)
    {
        return $this->db->select('*')
            ->from('skm')
            ->join('user', 'user.id_user = skm.id_user')
            ->where('skm.tahun', $tahun)
            ->where('skm.triwulan', 4)
            ->where('LENGTH(user.username)', 6)
            ->order_by('user.username', 'ASC')

            ->get()->result_array();
    }
    public function update($update, $user, $tahun, $triwulan)
    {
        $this->db->where('id_user', $user);
        $this->db->where('tahun', $tahun);
        $this->db->where('triwulan', $triwulan);
        $this->db->update('skm', $update);
    }
    public function ambil_data($keyword = null)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('LENGTH(username)', 6);
        $this->db->order_by('username', 'ASC');
        if (!empty($keyword)) {
            $this->db->like('nama', $keyword);
        }
        return $this->db->get()->result_array();
    }
}
