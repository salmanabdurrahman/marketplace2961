<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
	public function index()
	{

		$this->load->model("Mkategori");
		$data["kategori"] = $this->Mkategori->tampil();
		$this->load->view("header");
		$this->load->view("kategori_tampil", $data);
		$this->load->view("footer");
	}
}