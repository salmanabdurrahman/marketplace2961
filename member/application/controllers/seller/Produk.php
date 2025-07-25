<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Mproduk");
        $this->load->model("Mkategori");

        if (!isset($_SESSION["id_member"])) {
            $this->session->set_flashdata("pesan_error", "Silahkan login terlebih dahulu");
            redirect("login");
        }
    }

    public function index()
    {
        $id_member = $_SESSION["id_member"];
        $data["produk"] = $this->Mproduk->produk_member($id_member);
        $this->load->view("layout/header");
        $this->load->view("seller/produk_tampil", $data);
        $this->load->view("layout/footer");
    }

    public function tambah()
    {
        $input = $this->input->post();

        $this->form_validation->set_rules("nama_produk", "Nama produk", "required");
        $this->form_validation->set_rules("harga_produk", "Harga produk", "required");
        $this->form_validation->set_rules("berat_produk", "Berat produk", "required");
        $this->form_validation->set_rules("deskripsi_produk", "Deskripsi produk", "required");
        $this->form_validation->set_rules("id_kategori", "Kategori produk", "required");

        $this->form_validation->set_message("required", "%s harus diisi");

        if ($this->form_validation->run() == TRUE) {
            $this->Mproduk->simpan($input);
            $this->session->set_flashdata("pesan_sukses", "Data produk berhasil disimpan");
            redirect("seller/produk");
        }

        $data["kategori"] = $this->Mkategori->tampil();
        $this->load->view("layout/header");
        $this->load->view("seller/produk_tambah", $data);
        $this->load->view("layout/footer");
    }

    public function edit($id_produk)
    {
        $input = $this->input->post();

        $this->form_validation->set_rules("nama_produk", "Nama produk", "required");
        $this->form_validation->set_rules("harga_produk", "Harga produk", "required");
        $this->form_validation->set_rules("berat_produk", "Berat produk", "required");
        $this->form_validation->set_rules("deskripsi_produk", "Deskripsi produk", "required");
        $this->form_validation->set_rules("id_kategori", "Kategori produk", "required");
        $this->form_validation->set_rules("diskon", "Diskon", "numeric|greater_than_equal_to[0]|less_than_equal_to[100]");

        $this->form_validation->set_message("required", "%s harus diisi");
        $this->form_validation->set_message("numeric", "%s harus berupa angka");
        $this->form_validation->set_message("greater_than_equal_to", "%s minimal 0");
        $this->form_validation->set_message("less_than_equal_to", "%s maksimal 100");

        if ($this->form_validation->run() == TRUE) {
            $this->Mproduk->edit($id_produk, $input);
            $this->session->set_flashdata("pesan_sukses", "Data produk berhasil diubah");
            redirect("seller/produk");
        }

        $data["kategori"] = $this->Mkategori->tampil();
        $data["produk"] = $this->Mproduk->detail($id_produk);

        $id_member = $this->session->userdata("id_member");
        if ($data["produk"]["id_member"] != $id_member) {
            $this->session->set_flashdata("pesan_error", "Produk tidak ditemukan.");
            redirect("seller/produk");
        }

        $this->load->view("layout/header");
        $this->load->view("seller/produk_edit", $data);
        $this->load->view("layout/footer");
    }

    public function hapus($id_produk)
    {
        $data["produk"] = $this->Mproduk->detail($id_produk);

        $id_member = $this->session->userdata("id_member");
        if ($data["produk"]["id_member"] != $id_member) {
            $this->session->set_flashdata("pesan_error", "Produk tidak ditemukan.");
            redirect("seller/produk");
        }

        $this->Mproduk->hapus($id_produk);
        $this->session->set_flashdata("pesan_sukses", "Data produk berhasil dihapus");
        redirect("seller/produk");
    }

    public function etalase()
    {
        $id_member = $this->session->userdata("id_member");
        $data["produk"] = $this->Mproduk->produk_member($id_member);
        $this->load->view("layout/header");
        $this->load->view("seller/etalase_tampil", $data);
        $this->load->view("layout/footer");
    }

    public function laporan_terjual()
    {
        $input = $this->input->post() ?? [];

        $id_member = $this->session->userdata("id_member");
        $tanggal_mulai = !empty($input["tanggal_mulai"]) ? $input["tanggal_mulai"] : date("Y-m-d", strtotime("-1 month"));
        $tanggal_selesai = !empty($input["tanggal_selesai"]) ? $input["tanggal_selesai"] : date("Y-m-d");
        $status = !empty($input["status"]) ? $input["status"] : "selesai";

        $data = [
            "produk" => $this->Mproduk->laporan_terjual($id_member, $tanggal_mulai, $tanggal_selesai, $status),
            "tanggal_mulai" => $tanggal_mulai,
            "tanggal_selesai" => $tanggal_selesai,
            "status" => $status
        ];

        $this->load->view("layout/header");
        $this->load->view("seller/produk_laporan_terjual", $data);
        $this->load->view("layout/footer");
    }
}
