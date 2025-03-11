<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mtransaksi extends CI_Model
{
    public function tampil()
    {
        $q = $this->db->get("transaksi")->result_array();
        $d = $q;
        return $d;
    }
}