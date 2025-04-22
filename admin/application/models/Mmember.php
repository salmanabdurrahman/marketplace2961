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

    public function jumlah_member_distrik()
    {
        $query = $this->db->query("SELECT COUNT(*) AS jumlah, nama_distrik_member FROM member GROUP BY nama_distrik_member");
        return $query->result_array();
    }
}
