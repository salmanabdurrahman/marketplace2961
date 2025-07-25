<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Mmember");
        $this->load->model("Mongkir");

        if (!isset($_SESSION["id_member"])) {
            $this->session->set_flashdata("pesan_error", "Silahkan login terlebih dahulu");
            redirect("login");
        }
    }

    public function index()
    {
        if ($this->input->post()) {
            $this->_proses_update();
        } else {
            $this->load->view("layout/header");
            $this->load->view("akun/akun_tampil");
            $this->load->view("layout/footer");
        }
    }

    private function _proses_update()
    {
        $input = $this->input->post();
        $id_member = $this->session->userdata("id_member");
        $email_asli = $this->session->userdata("email_member");

        $email_rule = 'required|valid_email';
        if ($input['email_member'] != $email_asli) {
            $email_rule .= '|is_unique[member.email_member]';
        }

        $this->form_validation->set_rules("email_member", "Email", $email_rule);
        $this->form_validation->set_rules("nama_member", "Nama", "required");
        $this->form_validation->set_rules("wa_member", "WhatsApp", "required");
        $this->form_validation->set_rules("alamat_member", "Alamat", "required");
        $this->form_validation->set_rules("kode_distrik_member", "Kota/Kabupaten", "required");
        $this->form_validation->set_rules("nama_distrik_member", "Kota/Kabupaten", "required");

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("layout/header");
            $this->load->view("akun/akun_tampil");
            $this->load->view("layout/footer");
        } else {
            $data_update = [
                'nama_member' => $input['nama_member'],
                'email_member' => $input['email_member'],
                'wa_member' => $input['wa_member'],
                'alamat_member' => $input['alamat_member'],
                'kode_distrik_member' => $input['kode_distrik_member'],
                'nama_distrik_member' => $input['nama_distrik_member'],
            ];

            if (!empty($input['password_member'])) {
                $data_update['password_member'] = sha1($input['password_member']);
            }

            $this->Mmember->ubah($data_update, $id_member);
            $this->session->set_userdata($data_update);
            $this->session->set_flashdata("pesan_sukses", "Data akun berhasil diubah");
            redirect("akun");
        }
    }

    public function cari_lokasi_ajax()
    {
        $this->output->set_content_type('application/json');
        $keyword = $this->input->post('keyword');

        if (empty($keyword)) {
            $this->output->set_status_header(400)->set_output(json_encode(['message' => 'Kata kunci tidak boleh kosong.']));
            return;
        }

        $response = $this->Mongkir->cari_lokasi($keyword);

        if ($response['error']) {
            $this->output->set_status_header(400);
            echo json_encode(['message' => $response['message']]);
        } else {
            echo json_encode(['data' => $response['data']]);
        }
    }
}