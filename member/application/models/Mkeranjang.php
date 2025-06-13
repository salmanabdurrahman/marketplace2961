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

    public function tampil($id_member)
    {
        $this->db->select('member.id_member, member.id_member as id_member_jual, member.nama_member');
        $this->db->where("id_member_beli", $id_member);
        $this->db->join('member', 'keranjang.id_member_jual = member.id_member');
        $this->db->group_by('member.id_member');
        $q = $this->db->get("keranjang")->result_array();

        $data = [];
        foreach ($q as $key => $value) {
            $this->db->where("id_member_beli", $id_member);
            $this->db->where("id_member_jual", $value['id_member_jual']);
            $this->db->join('produk', 'keranjang.id_produk = produk.id_produk');
            $q[$key]['produk'] = $this->db->get("keranjang")->result_array();

            $data[] = $q[$key];
        }

        if (empty($data)) {
            $this->session->set_flashdata("pesan_error", "Keranjang Anda kosong");
            redirect("/");
        }

        return $data;
    }

    public function hapus($id_keranjang)
    {
        $this->db->where("id_keranjang", $id_keranjang);
        $this->db->where("id_member_beli", $this->session->userdata("id_member"));
        $this->db->delete("keranjang");
    }
}