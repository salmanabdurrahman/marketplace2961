<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Mmember");
        $this->load->model("Mongkir");

        if (!isset($_SESSION["id_member"])) {
            $this->session->set_flashdata("pesan_error", "Silahkan login terlebih dahulu");
            redirect("login");
        }
    }

    public function index()
    {
        $input = $this->input->post();

        $this->form_validation->set_rules("email_member", "Email", "required");
        $this->form_validation->set_rules("nama_member", "Nama Lengkap", "required");
        $this->form_validation->set_rules("alamat_member", "Alamat Lengkap", "required");
        $this->form_validation->set_rules("wa_member", "Nomer WA", "required");
        // $this->form_validation->set_rules("nama_distrik_member", "Nama Distrik", "required");
        $this->form_validation->set_rules("kode_distrik_member", "Kota/Kabupaten", "required");

        $this->form_validation->set_message("required", "%s harus diisi");

        if ($this->form_validation->run() == TRUE) {
            $kode_distrik_member = $input["kode_distrik_member"];
            $distrik = $this->Mongkir->detail_distrik($kode_distrik_member);

            if (!$distrik) {
                $this->session->set_flashdata("pesan_error", "Kota/Kabupaten tidak ditemukan");
                redirect("akun");
            }

            $id_member = $this->session->userdata("id_member");
            $input["nama_distrik_member"] = $distrik["type"] . " " . $distrik["city_name"] . " (" . $distrik["province"] . ")";
            $input["kode_distrik_member"] = $distrik["city_id"];
            $this->Mmember->ubah($input, $id_member);
            $this->session->set_flashdata("pesan_sukses", "Anda berhasil mengubah data akun");
            redirect("/");
        }

        $data["distrik"] = $this->Mongkir->tampil_distrik();
        $this->load->view("layout/header");
        $this->load->view("akun/akun_tampil", $data);
        $this->load->view("layout/footer");
    }
}