<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mmember extends CI_Model
{
    public function tampil()
    {
        $q = $this->db->get("member")->result_array();
        $d = $q;
        return $d;
    }

    public function detail($id_member)
    {
        $this->db->where("id_member", $id_member);
        return $this->db->get("member")->row_array();
    }
}
