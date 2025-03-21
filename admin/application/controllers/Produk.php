<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Mproduk");

        if (!isset($_SESSION["id_admin"])) {
            $this->session->set_flashdata("pesan_error", "Silahkan login terlebih dahulu");
            redirect("login");
        }
    }

    public function index()
    {
        $data["produk"] = $this->Mproduk->tampil();
        $this->load->view("layout/header");
        $this->load->view("produk/produk_tampil", $data);
        $this->load->view("layout/footer");
    }
}
