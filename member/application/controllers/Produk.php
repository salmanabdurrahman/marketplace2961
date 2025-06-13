<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Mproduk");
        $this->load->model("Mkeranjang");

        if (!isset($_SESSION["id_member"])) {
            $this->session->set_flashdata("pesan_error", "Silahkan login terlebih dahulu");
            redirect("login");
        }
    }

    public function index()
    {
        $id_member = $this->session->userdata("id_member");
        $data["produk"] = $this->Mproduk->produk_member($id_member);
        $this->load->view("layout/header");
        $this->load->view("produk/produk_tampil", $data);
        $this->load->view("layout/footer");
    }

    public function detail($id_produk)
    {
        $input = $this->input->post();
        $this->form_validation->set_rules("jumlah", "Jumlah", "required|numeric");
        $this->form_validation->set_message("required", "%s harus diisi");

        if ($this->form_validation->run() == TRUE) {
            $this->Mkeranjang->simpan($input, $id_produk);
            $this->session->set_flashdata("pesan_sukses", "Anda berhasil menambahkan produk ke keranjang");
            redirect("/");
        }

        $data["produk"] = $this->Mproduk->detail_umum($id_produk);
        $this->load->view("layout/header");
        $this->load->view("produk/produk_detail", $data);
        $this->load->view("layout/footer");
    }
}
