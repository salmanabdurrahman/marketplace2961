<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Mkeranjang");
        $this->load->model("Mproduk");
        $this->load->model("Mmember");
        $this->load->model("Mongkir");

        if (!isset($_SESSION["id_member"])) {
            $this->session->set_flashdata("pesan_error", "Silahkan login terlebih dahulu");
            redirect("login");
        }
    }

    public function index()
    {
        $id_member = $this->session->userdata("id_member");
        $data["keranjang"] = $this->Mkeranjang->tampil($id_member);
        $this->load->view("layout/header");
        $this->load->view("keranjang/keranjang_tampil", $data);
        $this->load->view("layout/footer");
    }

    public function hapus($id_keranjang): void
    {
        $this->Mkeranjang->hapus($id_keranjang);
        $this->session->set_flashdata("pesan_sukses", "Produk berhasil dihapus dari keranjang");
        redirect("keranjang");
    }

    public function checkout($id_member_jual): void
    {
        $data["keranjang"] = $this->Mkeranjang->tampil_member_jual($id_member_jual);
        $data["member_jual"] = $this->Mmember->detail($id_member_jual);
        $data["member_beli"] = $this->Mmember->detail($this->session->userdata("id_member"));

        if (empty($data["keranjang"])) {
            $this->session->set_flashdata("pesan_error", "Keranjang Anda kosong");
            redirect("keranjang");
        }
        if (empty($data["member_jual"]) || empty($data["member_beli"])) {
            $this->session->set_flashdata("pesan_error", "Data member tidak ditemukan");
            redirect("keranjang");
        }
        if (empty($data["member_jual"]["kode_distrik_member"]) || empty($data["member_beli"]["kode_distrik_member"])) {
            $this->session->set_flashdata("pesan_error", "Alamat pengirim atau penerima tidak lengkap. Silakan perbarui profil.");
            redirect("keranjang");
        }

        $total_berat = 0;
        foreach ($data["keranjang"] as $item) {
            $produk = $this->Mproduk->detail($item["id_produk"]);
            if ($produk) {
                $total_berat += $produk["berat_produk"] * $item["jumlah"];
            }
        }

        $response_ongkir = $this->Mongkir->cek_biaya_ongkir(
            $data["member_jual"]["kode_distrik_member"],
            $data["member_beli"]["kode_distrik_member"],
            $total_berat
        );

        $data['biaya'] = [];
        if ($response_ongkir['error']) {
            $this->session->set_flashdata("pesan_error", "API Ongkir Error: " . $response_ongkir['message']);
        } else {
            $data['biaya'] = $response_ongkir['data'];
        }

        $this->form_validation->set_rules("ongkir", "Ongkir", "required", ["required" => "Pilih jasa pengiriman terlebih dahulu"]);

        if ($this->form_validation->run() == TRUE) {
            $ongkir_json = $this->input->post("ongkir");
            $ongkir_terpilih = json_decode($ongkir_json, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                $this->session->set_flashdata("pesan_error", "Data ongkir tidak valid.");
                redirect("keranjang/checkout/" . $id_member_jual);
            }

            $this->Mkeranjang->checkout(
                $data["keranjang"],
                $id_member_jual,
                $this->session->userdata("id_member"),
                $ongkir_terpilih
            );
        }

        $this->load->view("layout/header");
        $this->load->view("checkout/checkout_tampil", $data);
        $this->load->view("layout/footer");
    }
}