<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Madmin extends CI_Model
{
    public function login($input)
    {
        $this->db->where("username", $input["username"]);
        $this->db->where("password", sha1($input["password"]));
        $result = $this->db->get("admin")->row_array();

        if (!$result) {
            $this->session->set_flashdata("pesan_error", "Username atau password salah.");
            redirect("login");
        }

        $this->session->set_userdata("id_admin", $result["id_admin"]);
        $this->session->set_userdata("username", $result["username"]);
        $this->session->set_userdata("nama", $result["nama"]);

        $this->session->set_flashdata("pesan_sukses", "Anda berhasil login");
        redirect("/");
    }

    public function logout()
    {
        $this->session->unset_userdata("id_admin");
        $this->session->unset_userdata("username");
        $this->session->unset_userdata("nama");
    }

    public function ubah($input, $id_admin)
    {
        if (!empty($input["password"])) {
            $input["password"] = sha1($input["password"]);
        } else {
            unset($input["password"]);
        }

        $this->db->where("id_admin", $id_admin);
        $this->db->update("admin", $input);

        $this->session->set_userdata("id_admin", $id_admin);
        $this->session->set_userdata("username", $input["username"]);
        $this->session->set_userdata("nama", $input["nama"]);

        $this->session->set_flashdata("pesan_sukses", "Anda berhasil mengubah data akun");
        redirect("/");
    }
}
