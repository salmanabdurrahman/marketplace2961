<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function index()
    {
        $this->load->model('Mmember');
        $data['member'] = $this->Mmember->tampil();
        $this->load->view('header');
        $this->load->view('member_tampil', $data);
        $this->load->view('footer');
    }
}