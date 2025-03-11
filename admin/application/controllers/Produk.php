<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function index()
    {
        $this->load->model("Mproduk");
        $data["produk"] = $this->Mproduk->tampil();
        $this->load->view("header");
        $this->load->view("produk_tampil", $data);
        $this->load->view("footer");
    }
}
