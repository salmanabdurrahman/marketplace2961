<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mkeranjang extends CI_Model
{
    public function simpan($input, $id_produk)
    {
        $this->db->where("id_produk", $id_produk);
        $q = $this->db->get("produk")->row_array();
        if (!$q) {
            $this->session->set_flashdata("pesan_error", "Produk tidak ditemukan");
            redirect("/");
        }

        $input['id_produk'] = $id_produk;
        $input['id_member_beli'] = $this->session->userdata("id_member");
        $input['id_member_jual'] = $q['id_member'];

        $this->db->where('id_member_beli', $this->session->userdata("id_member"));
        $this->db->where('id_produk', $id_produk);
        $existing = $this->db->get("keranjang")->row_array();

        if ($existing) {
            $this->db->where('id_member_beli', $this->session->userdata("id_member"));
            $this->db->where('id_produk', $id_produk);
            $this->db->update("keranjang", $input);
        } else {
            $this->db->insert("keranjang", $input);
        }

        $this->session->set_flashdata("pesan_sukses", "Anda berhasil menambahkan produk ke keranjang");
        redirect("/");
    }
}