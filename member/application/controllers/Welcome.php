<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model("Mslider");
		$this->load->model("Mkategori");
		$this->load->model("Mproduk");
		$this->load->model("Martikel");

		// if (!isset($_SESSION["id_member"])) {
		// 	$this->session->set_flashdata("pesan_error", "Silahkan login terlebih dahulu");
		// 	redirect("login");
		// }
	}

	public function index()
	{
		$data["slider"] = $this->Mslider->tampil();
		$data["kategori"] = $this->Mkategori->tampil();
		$data["produk"] = $this->Mproduk->tampil_produk_terbaru();
		$data["artikel"] = $this->Martikel->tampil_artikel_terbaru();
		$this->load->view("layout/header");
		$this->load->view("welcome_message", $data);
		$this->load->view("layout/footer");
	}
}
