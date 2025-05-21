<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Martikel extends CI_Model
{
    public function tampil()
    {
        $this->db->order_by("id_artikel", "DESC");
        $q = $this->db->get("artikel")->result_array();
        $d = $q;
        return $d;
    }

    public function simpan($input)
    {
        $config["upload_path"] = $this->config->item("assets_artikel");
        $config["allowed_types"] = "jpg|png|jpeg|gif|svg";
        $config["max_size"] = "2048";

        $this->load->library("upload", $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload("foto_artikel")) {
            $input["foto_artikel"] = $this->upload->data("file_name");

            $this->db->insert("artikel", $input);
            $this->session->set_flashdata("pesan_sukses", "Data artikel berhasil disimpan.");
            redirect("artikel");
        } else {
            $this->session->set_flashdata("pesan_error", $this->upload->display_errors());
            redirect("artikel/tambah");
        }
    }

    public function detail($id_artikel)
    {
        $this->db->where("id_artikel", $id_artikel);
        return $this->db->get("artikel")->row_array();
    }

    public function edit($id_artikel, $input)
    {
        $config["upload_path"] = $this->config->item("assets_artikel");
        $config["allowed_types"] = "jpg|png|jpeg|gif|svg";
        $config["max_size"] = "2048";

        $this->load->library("upload", $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload("foto_artikel")) {
            $detail = $this->detail($id_artikel);

            if (file_exists($this->config->item("assets_artikel") . $detail["foto_artikel"])) {
                unlink($this->config->item("assets_artikel") . $detail["foto_artikel"]);
            }

            $input["foto_artikel"] = $this->upload->data("file_name");
        } else {
            $this->session->set_flashdata("pesan_error", $this->upload->display_errors());
            redirect("artikel/edit/$id_artikel");
        }

        $this->db->where("id_artikel", $id_artikel)->update("artikel", $input);
        $this->session->set_flashdata("pesan_sukses", "Data artikel berhasil diubah.");
        redirect("artikel");
    }

    public function hapus($id_artikel)
    {
        $detail = $this->detail($id_artikel);

        if (file_exists($this->config->item("assets_artikel") . $detail["foto_artikel"])) {
            unlink($this->config->item("assets_artikel") . $detail["foto_artikel"]);
        }

        $this->db->where("id_artikel", $id_artikel)->delete("artikel");

        if ($this->db->affected_rows() == 0) {
            $this->session->set_flashdata("pesan_error", "Data artikel gagal dihapus.");
            redirect("artikel");
        }

        $this->session->set_flashdata("pesan_sukses", "Data artikel berhasil dihapus");
        redirect("artikel");
    }
}
