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
}