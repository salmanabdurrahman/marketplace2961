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

        $this->load->view("layout/header");
        $this->load->view("checkout/checkout_tampil", $data);
        $this->load->view("layout/footer");
    }
}