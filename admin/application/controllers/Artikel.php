<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Martikel");

        if (!isset($_SESSION["id_admin"])) {
            $this->session->set_flashdata("pesan_error", "Silahkan login terlebih dahulu");
            redirect("login");
        }
    }

    public function index()
    {
        $data["artikel"] = $this->Martikel->tampil();
        $this->load->view("layout/header");
        $this->load->view("artikel/artikel_tampil", $data);
        $this->load->view("layout/footer");
    }

    public function tambah()
    {
        $input = $this->input->post();

        $this->form_validation->set_rules("judul_artikel", "Judul artikel", "required");
        $this->form_validation->set_rules("isi_artikel", "Isi artikel", "required");

        $this->form_validation->set_message("required", "%s harus diisi");

        if ($this->form_validation->run() == TRUE) {
            $this->Martikel->simpan($input);
            $this->session->set_flashdata("pesan_sukses", "Data artikel berhasil disimpan");
            redirect("artikel");
        }

        $this->load->view("layout/header");
        $this->load->view("artikel/artikel_tambah");
        $this->load->view("layout/footer");
    }

    public function edit($id_artikel)
    {
        $input = $this->input->post();

        $this->form_validation->set_rules("judul_artikel", "Judul artikel", "required");
        $this->form_validation->set_rules("isi_artikel", "Isi artikel", "required");

        $this->form_validation->set_message("required", "%s harus diisi");

        if ($this->form_validation->run() == TRUE) {
            $this->Martikel->edit($id_artikel, $input);
            $this->session->set_flashdata("pesan_sukses", "Data artikel berhasil diubah");
            redirect("artikel");
        }

        $data["artikel"] = $this->Martikel->detail($id_artikel);
        $this->load->view("layout/header");
        $this->load->view("artikel/artikel_edit", $data);
        $this->load->view("layout/footer");
    }

    public function hapus($id_artikel)
    {
        $this->Martikel->hapus($id_artikel);
        $this->session->set_flashdata("pesan_sukses", "Data artikel berhasil dihapus");
        redirect("artikel");
    }
}