<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Mtransaksi");
    }

    public function index()
    {
        $data["transaksi"] = $this->Mtransaksi->tampil();
        $this->load->view("header");
        $this->load->view("transaksi_tampil", $data);
        $this->load->view("footer");
    }

    public function detail($id_transaksi)
    {
        $data["transaksi"] = $this->Mtransaksi->detail($id_transaksi);
        $data["transaksi_detail"] = $this->Mtransaksi->transaksi_detail($id_transaksi);
        $this->load->view("header");
        $this->load->view("transaksi_detail", $data);
        $this->load->view("footer");
    }
}