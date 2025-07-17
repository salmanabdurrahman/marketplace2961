<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Mmember");
        $this->load->model("Mproduk");
        $this->load->model("Mtransaksi");

        if (!isset($_SESSION["id_member"])) {
            $this->session->set_flashdata("pesan_error", "Silahkan login terlebih dahulu");
            redirect("login");
        }
    }

    public function index()
    {
        $id_member = $this->session->userdata("id_member");

        $data["jumlah_produk_dijual"] = count($this->Mproduk->produk_member($id_member));
        $data["jumlah_penjualan"] = count($this->Mtransaksi->transaksi_member_jual($id_member));
        $data["jumlah_pembelian"] = count($this->Mtransaksi->transaksi_member_beli($id_member));

        $data["penjualan_terakhir"] = $this->Mtransaksi->transaksi_member_jual($id_member, 5);
        $data["pembelian_terakhir"] = $this->Mtransaksi->transaksi_member_beli($id_member, 5);

        $this->load->view("layout/header");
        $this->load->view("home", $data);
        $this->load->view("layout/footer");
    }
}