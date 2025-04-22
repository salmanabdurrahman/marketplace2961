<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Mmember");

        if (!isset($_SESSION["id_admin"])) {
            $this->session->set_flashdata("pesan_error", "Silahkan login terlebih dahulu");
            redirect("login");
        }
    }

    public function index()
    {
        $data["jumlah_member_distrik"] = $this->Mmember->jumlah_member_distrik();

        $this->load->view("layout/header");
        $this->load->view("home", $data);
        $this->load->view("layout/footer");
    }
}