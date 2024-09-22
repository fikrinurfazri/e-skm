<?php

class User_model extends CI_Model
{
    private $_table = "user";

    public function getuser()
    {
        return $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
    }
    public function password_rules()
    {
        return [
            [
                'field' => 'password',
                'label' => 'New Password',
                'rules' => 'required'
            ]
        ];
    }
    public function update($data)
    {
        if (!$data['id_user']) {
            return;
        }
        return $this->db->update($this->_table, $data, ['id_user' => $data['id_user']]);
    }
    public function getlihat($id)
    {
        return $this->db->select('*')
            ->from('skm')
            ->join('user', 'user.id_user = skm.id_user')
            ->where('user.username', $id)
            ->get()->result_array();
    }
    public function getkuis($id)
    {
        return $this->db->select('*')
            ->from('kuisioner')
            ->join('user', 'user.id_user = kuisioner.id_user')
            ->where('user.username', $id)
            ->get()->result_array();
    }
    public function getsinkron($id)
    {
        $this->db->select_sum('')
            ->from('skm')
            ->like('username', $id)
            ->get()->result_array();
    }
}
