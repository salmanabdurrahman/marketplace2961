<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Mproduk");
    }

    public function index()
    {
        $data["produk"] = $this->Mproduk->tampil();
        $this->load->view("header");
        $this->load->view("produk_tampil", $data);
        $this->load->view("footer");
    }
}
