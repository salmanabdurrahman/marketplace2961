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

    public function ubah_status($id_transaksi, $status = 'lunas')
    {
        // Validasi status
        $valid_status = ['lunas', 'pesan', 'batal', 'dikirim', 'selesai'];
        if (!in_array($status, $valid_status)) {
            throw new InvalidArgumentException("Status tidak valid. Pilih dari: " . implode(", ", $valid_status));
        }

        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->update('transaksi', ['status_transaksi' => $status]);
    }

    public function update_resi($id_transaksi, $data)
    {
        $transaksi = $this->detail($id_transaksi);
        if (!$transaksi || $transaksi['status_transaksi'] !== 'lunas') {
            $this->session->set_flashdata("pesan_error", "Hanya transaksi dengan status 'lunas' yang bisa diupdate resi.");
            return redirect("seller/transaksi/detail/$id_transaksi");
        }

        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->update('transaksi', ['resi_ekspedisi' => $data['resi_ekspedisi']]);
    }
}