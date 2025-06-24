<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mkeranjang extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Mmember");
    }

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

    public function tampil_member_jual($id_member_jual)
    {
        $this->db->where("id_member_jual", $id_member_jual);
        $this->db->where("id_member_beli", $this->session->userdata("id_member"));
        $this->db->join('produk', 'keranjang.id_produk = produk.id_produk');

        return $this->db->get("keranjang")->result_array();
    }

    public function checkout($keranjang, $id_member_jual, $id_member_beli, $nama_ekspedisi, $ongkir_terpilih)
    {
        $member_jual = $this->Mmember->detail($id_member_jual);
        $member_beli = $this->Mmember->detail($id_member_beli);

        $total_belanja = 0;
        $total_berat = 0;
        foreach ($keranjang as $item) {
            $produk = $this->db->get_where("produk", ["id_produk" => $item["id_produk"]])->row_array();
            if ($produk) {
                $total_belanja += $produk["harga_produk"] * $item["jumlah"];
                $total_berat += $produk["berat_produk"] * $item["jumlah"];
            }
        }

        $data = [
            "kode_transaksi" => date("YmdHis") . rand(1111, 9999),
            "id_member_beli" => $id_member_beli,
            "id_member_jual" => $id_member_jual,
            "tanggal_transaksi" => date("Y-m-d H:i:s"),
            "belanja_transaksi" => $total_belanja,
            "status_transaksi" => "pesan",
            "ongkir_transaksi" => $ongkir_terpilih["cost"][0]["value"],
            "total_transaksi" => $total_belanja + $ongkir_terpilih["cost"][0]["value"],
            "bayar_transaksi" => $total_belanja + $ongkir_terpilih["cost"][0]["value"],
            "distrik_pengirim" => $member_jual["kode_distrik_member"],
            "nama_pengirim" => $member_jual["nama_member"],
            "wa_pengirim" => $member_jual["wa_member"],
            "alamat_pengirim" => $member_jual["alamat_member"],
            "distrik_penerima" => $member_beli["kode_distrik_member"],
            "nama_penerima" => $member_beli["nama_member"],
            "wa_penerima" => $member_beli["wa_member"],
            "alamat_penerima" => $member_beli["alamat_member"],
            "nama_ekspedisi" => $nama_ekspedisi,
            "layanan_ekspedisi" => $ongkir_terpilih["description"],
            "estimasi_ekspedisi" => $ongkir_terpilih["cost"][0]["value"],
            "berat_ekspedisi" => $total_berat,
        ];

        $this->db->insert("transaksi", $data);
        $id_transaksi = $this->db->insert_id();

        // Simpan detail transaksi
        foreach ($keranjang as $item) {
            $produk = $this->db->get_where("produk", ["id_produk" => $item["id_produk"]])->row_array();
            if ($produk) {
                $detail = [
                    "id_transaksi" => $id_transaksi,
                    "id_produk" => $item["id_produk"],
                    "nama_beli" => $produk["nama_produk"],
                    "harga_beli" => $produk["harga_produk"],
                    "jumlah_beli" => $item["jumlah"],
                ];
                $this->db->insert("transaksi_detail", $detail);
            }
        }

        $this->db->where("id_member_beli", $id_member_beli);
        $this->db->where("id_member_jual", $id_member_jual);
        $this->db->delete("keranjang");

        $this->session->set_flashdata("pesan_sukses", "Checkout berhasil, silakan lakukan pembayaran.");
        redirect("transaksi/detail/" . $id_transaksi);
    }
}