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
}