<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Mslider");

        if (!isset($_SESSION["id_admin"])) {
            $this->session->set_flashdata("pesan_error", "Silahkan login terlebih dahulu");
            redirect("login");
        }
    }

    public function index()
    {
        $data["slider"] = $this->Mslider->tampil();
        $this->load->view("layout/header");
        $this->load->view("slider/slider_tampil", $data);
        $this->load->view("layout/footer");
    }

    public function tambah()
    {
        $input = $this->input->post();

        $this->form_validation->set_rules("caption_slider", "Caption slider", "required");

        $this->form_validation->set_message("required", "%s harus diisi");

        if ($this->form_validation->run() == TRUE) {
            $this->Mslider->simpan($input);
            $this->session->set_flashdata("pesan_sukses", "Data slider berhasil disimpan");
            redirect("slider");
        }

        $this->load->view("layout/header");
        $this->load->view("slider/slider_tambah");
        $this->load->view("layout/footer");
    }

    public function edit($id_slider)
    {
        $input = $this->input->post();

        $this->form_validation->set_rules("caption_slider", "Caption slider", "required");

        $this->form_validation->set_message("required", "%s harus diisi");

        if ($this->form_validation->run() == TRUE) {
            $this->Mslider->edit($id_slider, $input);
            $this->session->set_flashdata("pesan_sukses", "Data slider berhasil diubah");
            redirect("slider");
        }

        $data["slider"] = $this->Mslider->detail($id_slider);
        $this->load->view("layout/header");
        $this->load->view("slider/slider_edit", $data);
        $this->load->view("layout/footer");
    }

    public function hapus($id_slider)
    {
        $this->Mslider->hapus($id_slider);
        $this->session->set_flashdata("pesan_sukses", "Data slider berhasil dihapus");
        redirect("slider");
    }
}