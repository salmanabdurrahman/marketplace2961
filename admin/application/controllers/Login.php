<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Madmin");
    }

    public function index()
    {
        $input = $this->input->post();

        if ($input) {
            $this->Madmin->login($input);
            $this->session->set_flashdata("pesan_sukses", "Anda berhasil login");
            redirect("/");
        }

        $this->load->view("layout/header");
        $this->load->view("auth/login");
        $this->load->view("layout/footer");
    }
}
