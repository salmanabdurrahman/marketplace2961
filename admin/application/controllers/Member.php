<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Mmember");
        $this->load->model("Mtransaksi");

        if (!isset($_SESSION["id_admin"])) {
            $this->session->set_flashdata("pesan_error", "Silahkan login terlebih dahulu");
            redirect("login");
        }
    }

    public function index()
    {
        $data["member"] = $this->Mmember->tampil();
        $this->load->view("layout/header");
        $this->load->view("member/member_tampil", $data);
        $this->load->view("layout/footer");
    }

    public function detail($id_member)
    {
        $data["member"] = $this->Mmember->detail($id_member);
        $data["jual"] = $this->Mtransaksi->transaksi_member_jual($id_member);
        $data["beli"] = $this->Mtransaksi->transaksi_member_beli($id_member);

        $this->load->view("layout/header");
        $this->load->view("member/member_detail", $data);
        $this->load->view("layout/footer");
    }
}