<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Mtransaksi");

        if (!isset($_SESSION["id_admin"])) {
            $this->session->set_flashdata("pesan_error", "Silahkan login terlebih dahulu");
            redirect("login");
        }
    }

    public function index()
    {
        $data["transaksi"] = $this->Mtransaksi->tampil();
        $this->load->view("layout/header");
        $this->load->view("transaksi/transaksi_tampil", $data);
        $this->load->view("layout/footer");
    }

    public function detail($id_transaksi)
    {
        $data["transaksi"] = $this->Mtransaksi->detail($id_transaksi);
        $data["transaksi_detail"] = $this->Mtransaksi->transaksi_detail($id_transaksi);
        $this->load->view("layout/header");
        $this->load->view("transaksi/transaksi_detail", $data);
        $this->load->view("layout/footer");
    }
}