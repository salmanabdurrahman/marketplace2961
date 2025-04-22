<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Madmin");

        if (!isset($_SESSION["id_admin"])) {
            $this->session->set_flashdata("pesan_error", "Silahkan login terlebih dahulu");
            redirect("login");
        }
    }

    public function index()
    {
        $input = $this->input->post();

        $this->form_validation->set_rules("username", "Username", "required");
        $this->form_validation->set_rules("nama", "Nama", "required");

        $this->form_validation->set_message("required", "%s harus diisi");

        if ($this->form_validation->run() == TRUE) {
            $id_admin = $this->session->userdata("id_admin");
            $this->Madmin->ubah($input, $id_admin);
            $this->session->set_flashdata("pesan_sukses", "Anda berhasil mengubah data akun");
            redirect("/");
        }

        $this->load->view("layout/header");
        $this->load->view("akun/akun_tampil");
        $this->load->view("layout/footer");
    }
}