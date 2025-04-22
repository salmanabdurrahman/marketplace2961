<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model("Mkategori");

		if (!isset($_SESSION["id_admin"])) {
			$this->session->set_flashdata("pesan_error", "Silahkan login terlebih dahulu");
			redirect("login");
		}
	}

	public function index()
	{
		$data["kategori"] = $this->Mkategori->tampil();
		$this->load->view("layout/header");
		$this->load->view("kategori/kategori_tampil", $data);
		$this->load->view("layout/footer");
	}

	public function tambah()
	{
		$input = $this->input->post();

		$this->form_validation->set_rules("nama_kategori", "Nama kategori", "required");

		$this->form_validation->set_message("required", "%s harus diisi");

		if ($this->form_validation->run() == TRUE) {
			$this->Mkategori->simpan($input);
			$this->session->set_flashdata("pesan_sukses", "Data kategori berhasil disimpan");
			redirect("kategori");
		}

		$this->load->view("layout/header");
		$this->load->view("kategori/kategori_tambah");
		$this->load->view("layout/footer");
	}

	public function edit($id_kategori)
	{
		$input = $this->input->post();

		$this->form_validation->set_rules("nama_kategori", "Nama kategori", "required");

		$this->form_validation->set_message("required", "%s harus diisi");

		if ($this->form_validation->run() == TRUE) {
			$this->Mkategori->edit($id_kategori, $input);
			$this->session->set_flashdata("pesan_sukses", "Data kategori berhasil diubah");
			redirect("kategori");
		}

		$data["kategori"] = $this->Mkategori->detail($id_kategori);
		$this->load->view("layout/header");
		$this->load->view("kategori/kategori_edit", $data);
		$this->load->view("layout/footer");
	}

	public function hapus($id_kategori)
	{
		$this->Mkategori->hapus($id_kategori);
		$this->session->set_flashdata("pesan_sukses", "Data kategori berhasil dihapus");
		redirect("kategori");
	}
}