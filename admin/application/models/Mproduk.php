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
}