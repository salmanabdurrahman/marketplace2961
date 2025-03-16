<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model("Mkategori");
	}

	public function index()
	{
		$data["kategori"] = $this->Mkategori->tampil();
		$this->load->view("header");
		$this->load->view("kategori_tampil", $data);
		$this->load->view("footer");
	}

	public function tambah()
	{
		$input = $this->input->post();

		if ($input) {
			$this->Mkategori->simpan($input);
			$this->session->set_flashdata("pesan_sukses", "Data kategori berhasil disimpan");
			redirect("kategori");
		}

		$this->load->view("header");
		$this->load->view("kategori_tambah");
		$this->load->view("footer");
	}

	public function edit($id_kategori)
	{
		$input = $this->input->post();

		if ($input) {
			$this->Mkategori->edit($id_kategori, $input);
			$this->session->set_flashdata("pesan_sukses", "Data kategori berhasil diubah");
			redirect("kategori");
		}

		$data["kategori"] = $this->Mkategori->detail($id_kategori);
		$this->load->view("header");
		$this->load->view("kategori_edit", $data);
		$this->load->view("footer");
	}

	public function hapus($id_kategori)
	{
		$this->Mkategori->hapus($id_kategori);
		$this->session->set_flashdata("pesan_sukses", "Data kategori berhasil dihapus");
		redirect("kategori");
	}
}