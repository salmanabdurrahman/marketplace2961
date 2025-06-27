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

    public function transaksi_member_jual($id_member)
    {
        $this->db->where("id_member_jual", $id_member);
        return $this->db->get("transaksi")->result_array();
    }

    public function transaksi_member_beli($id_member)
    {
        $this->db->where("id_member_beli", $id_member);
        return $this->db->get("transaksi")->result_array();
    }

    public function ubah_status_lunas($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->update('transaksi', ['status_transaksi' => 'lunas']);
    }
}