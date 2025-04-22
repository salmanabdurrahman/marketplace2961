<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Madmin");

        if (isset($_SESSION["id_admin"])) {
            $this->session->set_flashdata("pesan_sukses", "Anda sudah login");
            redirect("/");
        }
    }

    public function index()
    {
        $input = $this->input->post();

        $this->form_validation->set_rules("username", "Username", "required");
        $this->form_validation->set_rules("password", "Password", "required");

        $this->form_validation->set_message("required", "%s harus diisi");

        if ($this->form_validation->run() == TRUE) {
            $this->Madmin->login($input);
            $this->session->set_flashdata("pesan_sukses", "Anda berhasil login");
            redirect("/");
        }

        $this->load->view("layout/header");
        $this->load->view("auth/login");
        $this->load->view("layout/footer");
    }
}
