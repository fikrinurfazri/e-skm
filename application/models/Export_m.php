<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Export_m extends CI_Model
{
    public function view($id)
    {
        return $this->db->select('*')
            ->from('skm')
            ->join('user', 'user.id_user = skm.id_user')
            ->join('kuisioner', 'kuisioner.id_kuisioner = skm.id_kuisioner')
            ->where('skm.id_user', $id)
            ->get()->result();
    }
    public function responden($id)
    {
        return $this->db->select('*')
            ->from('kuisioner')
            ->join('user', 'user.id_user = kuisioner.id_user')
            ->join('responden', 'responden.id_kuisioner = kuisioner.id_kuisioner')
            ->where('user.id_user', $id)
            ->get()->result();
    }
    public function user($id)
    {
        return $this->db->select('*')
            ->from('user')
            ->where('id_user', $id)
            ->get()->row();
    }
}
