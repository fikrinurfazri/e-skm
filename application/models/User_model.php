<?php

class User_model extends CI_Model
{
    public function getuser()
    {
        return $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
    }
}
