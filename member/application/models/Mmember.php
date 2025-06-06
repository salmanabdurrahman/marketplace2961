<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mmember extends CI_Model
{
    public function tampil()
    {
        $q = $this->db->get("member")->result_array();
        $d = $q;
        return $d;
    }

    public function detail($id_member)
    {
        $this->db->where("id_member", $id_member);
        return $this->db->get("member")->row_array();
    }

    public function jumlah_member_distrik()
    {
        $query = $this->db->query("SELECT COUNT(*) AS jumlah, nama_distrik_member FROM member GROUP BY nama_distrik_member");
        return $query->result_array();
    }

    public function register($input)
    {
        $this->db->insert("member", $input);
        $this->session->set_flashdata("pesan_sukses", "Registrasi berhasil. Silakan login");
        redirect("login");
    }

    public function login($input)
    {
        $this->db->where("email_member", $input["email_member"]);
        $this->db->where("password_member", sha1($input["password_member"]));
        $result = $this->db->get("member")->row_array();

        if (!$result) {
            $this->session->set_flashdata("pesan_error", "Email atau password salah.");
            redirect("/");
        }

        $this->session->set_userdata("id_member", $result["id_member"]);
        $this->session->set_userdata("email_member", $result["email_member"]);
        $this->session->set_userdata("nama_member", $result["nama_member"]);
        $this->session->set_userdata("alamat_member", $result["alamat_member"]);
        $this->session->set_userdata("wa_member", $result["wa_member"]);
        $this->session->set_userdata("nama_distrik_member", $result["nama_distrik_member"]);
        $this->session->set_userdata("kode_distrik_member", $result["kode_distrik_member"]);

        $this->session->set_flashdata("pesan_sukses", "Anda berhasil login");
        redirect("/");
    }

    public function logout()
    {
        $this->session->unset_userdata("id_member");
        $this->session->unset_userdata("email_member");
        $this->session->unset_userdata("nama_member");
        $this->session->unset_userdata("alamat_member");
        $this->session->unset_userdata("wa_member");
        $this->session->unset_userdata("nama_distrik_member");
        $this->session->unset_userdata("kode_distrik_member");
    }

    public function ubah($input, $id_member)
    {
        if (!empty($input["password_member"])) {
            $input["password_member"] = sha1($input["password_member"]);
        } else {
            unset($input["password_member"]);
        }

        $this->db->where("id_member", $id_member);
        $this->db->update("member", $input);

        $this->session->set_userdata("id_member", $id_member);
        $this->session->set_userdata("email_member", $input["email_member"]);
        $this->session->set_userdata("nama_member", $input["nama_member"]);
        $this->session->set_userdata("alamat_member", $input["alamat_member"]);
        $this->session->set_userdata("wa_member", $input["wa_member"]);
        $this->session->set_userdata("nama_distrik_member", $input["nama_distrik_member"]);
        $this->session->set_userdata("kode_distrik_member", $input["kode_distrik_member"]);

        $this->session->set_flashdata("pesan_sukses", "Anda berhasil mengubah data akun");
        redirect("/");
    }
}
