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
}