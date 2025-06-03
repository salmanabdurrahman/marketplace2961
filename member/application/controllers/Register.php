<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Mmember");
        $this->load->model("Mongkir");

        if (isset($_SESSION["id_member"])) {
            $this->session->set_flashdata("pesan_sukses", "Anda sudah login");
            redirect("/");
        }
    }

    public function index()
    {
        $input = $this->input->post();

        $this->form_validation->set_rules("email_member", "Email", "required|is_unique[member.email_member]");
        $this->form_validation->set_rules("nama_member", "Nama", "required");
        $this->form_validation->set_rules("wa_member", "WhatsApp", "required");
        $this->form_validation->set_rules("alamat_member", "Alamat", "required");
        $this->form_validation->set_rules("city_id", "Kota/Kabupaten", "required");
        $this->form_validation->set_rules("password_member", "Password", "required");

        $this->form_validation->set_message("required", "%s harus diisi");
        $this->form_validation->set_message("is_unique", "%s sudah terdaftar");
        $this->form_validation->set_message("valid_email", "%s tidak valid");

        if ($this->form_validation->run() == TRUE) {
            $city_id = $input["city_id"];
            $distrik = $this->Mongkir->detail_distrik($city_id);

            if (!$distrik) {
                $this->session->set_flashdata("pesan_error", "Kota/Kabupaten tidak ditemukan");
                redirect("register");
            }

            $data = [
                "email_member" => $input["email_member"],
                "nama_member" => $input["nama_member"],
                "wa_member" => $input["wa_member"],
                "alamat_member" => $input["alamat_member"],
                "kode_distrik_member" => $input["city_id"],
                "nama_distrik_member" => $distrik["type"] . " " . $distrik["city_name"] . " (" . $distrik["province"] . ")",
                "password_member" => sha1($input["password_member"])
            ];

            $this->Mmember->register($data);
            $this->session->set_flashdata("pesan_sukses", "Registrasi berhasil. Silakan login");
            redirect("login");
        }


        $data["distrik"] = $this->Mongkir->tampil_distrik();
        $this->load->view("layout/header");
        $this->load->view("auth/register", $data);
        $this->load->view("layout/footer");
    }
}
