<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Madmin");

        if (!isset($_SESSION["id_admin"])) {
            $this->session->set_flashdata("pesan_error", "Silahkan login terlebih dahulu");
            redirect("login");
        }
    }

    public function index()
    {
        $this->Madmin->logout();
        $this->session->set_flashdata("pesan_sukses", "Anda berhasil logout");
        redirect("login");
    }
}
