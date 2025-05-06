<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mproduk extends CI_Model
{
    public function tampil()
    {
        $q = $this->db->get("produk")->result_array();
        $d = $q;
        return $d;
    }

    public function produk_member($id_member)
    {
        $this->db->where("id_member", $id_member);
        $q = $this->db->get("produk")->result_array();
        $d = $q;
        return $d;
    }
}