<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Mmember");

        if (!isset($_SESSION["id_admin"])) {
            $this->session->set_flashdata("pesan_error", "Silahkan login terlebih dahulu");
            redirect("login");
        }
    }

    public function index()
    {
        $data["member"] = $this->Mmember->tampil();
        $this->load->view("layout/header");
        $this->load->view("member/member_tampil", $data);
        $this->load->view("layout/footer");
    }
}