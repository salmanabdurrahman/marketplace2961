<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Mtransaksi");

        if (!isset($_SESSION["id_member"])) {
            $this->session->set_flashdata("pesan_error", "Silahkan login terlebih dahulu");
            redirect("login");
        }
    }

    public function index()
    {
        $id_member = $this->session->userdata("id_member");
        $data["transaksi"] = $this->Mtransaksi->transaksi_member_jual($id_member);
        $this->load->view("layout/header");
        $this->load->view("seller/transaksi_tampil", $data);
        $this->load->view("layout/footer");
    }

    public function detail($id_transaksi)
    {
        $data["transaksi"] = $this->Mtransaksi->detail($id_transaksi);
        $data["transaksi_detail"] = $this->Mtransaksi->transaksi_detail($id_transaksi);
        $this->load->view("layout/header");
        $this->load->view("seller/transaksi_detail", $data);
        $this->load->view("layout/footer");
    }
}