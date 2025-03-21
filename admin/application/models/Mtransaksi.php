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

    public function detail($id_transaksi)
    {
        $this->db->where("id_transaksi", $id_transaksi);
        return $this->db->get("transaksi")->row_array();
    }

    public function transaksi_detail($id_transaksi)
    {
        $this->db->where("id_transaksi", $id_transaksi);
        return $this->db->get("transaksi_detail")->result_array();
    }
}