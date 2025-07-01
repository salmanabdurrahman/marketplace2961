<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model("Mkategori");

		if (!isset($_SESSION["id_member"])) {
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

	public function detail($id_kategori)
	{
		$id_member = $this->session->userdata("id_member");
		$data["kategori"] = $this->Mkategori->detail($id_kategori);
		$data["produk"] = $this->Mkategori->tampil_produk($id_kategori, $id_member);
		$this->load->view("layout/header");
		$this->load->view("kategori/kategori_detail", $data);
		$this->load->view("layout/footer");
	}
}