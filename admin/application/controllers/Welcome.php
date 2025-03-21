<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!isset($_SESSION["id_admin"])) {
			$this->session->set_flashdata("pesan_error", "Silahkan login terlebih dahulu");
			redirect("login");
		}
	}

	public function index()
	{
		$this->load->view("layout/header");
		$this->load->view("welcome_message");
		$this->load->view("layout/footer");
	}
}
