<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Martikel");

        if (!isset($_SESSION["id_member"])) {
            $this->session->set_flashdata("pesan_error", "Silahkan login terlebih dahulu");
            redirect("login");
        }
    }

    public function index()
    {
        $data["artikel"] = $this->Martikel->tampil_semua_artikel();
        $this->load->view("layout/header");
        $this->load->view("artikel/artikel_tampil", $data);
        $this->load->view("layout/footer");
    }

    public function detail($id_artikel)
    {
        $data["artikel"] = $this->Martikel->detail($id_artikel);
        $this->load->view("layout/header");
        $this->load->view("artikel/artikel_detail", $data);
        $this->load->view("layout/footer");
    }
}
