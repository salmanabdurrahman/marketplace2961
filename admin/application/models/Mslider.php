<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mslider extends CI_Model
{
    public function tampil()
    {
        $this->db->order_by("id_slider", "DESC");
        $q = $this->db->get("slider")->result_array();
        $d = $q;
        return $d;
    }

    public function simpan($input)
    {
        $config["upload_path"] = $this->config->item("assets_slider");
        $config["allowed_types"] = "jpg|png|jpeg|gif|svg";
        $config["max_size"] = "2048";

        $this->load->library("upload", $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload("foto_slider")) {
            $input["foto_slider"] = $this->upload->data("file_name");

            $this->db->insert("slider", $input);
            $this->session->set_flashdata("pesan_sukses", "Data slider berhasil disimpan.");
            redirect("slider");
        } else {
            $this->session->set_flashdata("pesan_error", $this->upload->display_errors());
            redirect("slider/tambah");
        }
    }

    public function detail($id_slider)
    {
        $this->db->where("id_slider", $id_slider);
        return $this->db->get("slider")->row_array();
    }

    public function edit($id_slider, $input)
    {
        $config["upload_path"] = $this->config->item("assets_slider");
        $config["allowed_types"] = "jpg|png|jpeg|gif|svg";
        $config["max_size"] = "2048";

        $this->load->library("upload", $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload("foto_slider")) {
            $detail = $this->detail($id_slider);

            if (file_exists($this->config->item("assets_slider") . $detail["foto_slider"])) {
                unlink($this->config->item("assets_slider") . $detail["foto_slider"]);
            }

            $input["foto_slider"] = $this->upload->data("file_name");
        } else {
            $this->session->set_flashdata("pesan_error", $this->upload->display_errors());
            redirect("slider/edit/$id_slider");
        }

        $this->db->where("id_slider", $id_slider)->update("slider", $input);
        $this->session->set_flashdata("pesan_sukses", "Data slider berhasil diubah.");
        redirect("slider");
    }

    public function hapus($id_slider)
    {
        $detail = $this->detail($id_slider);

        if (file_exists($this->config->item("assets_slider") . $detail["foto_slider"])) {
            unlink($this->config->item("assets_slider") . $detail["foto_slider"]);
        }

        $this->db->where("id_slider", $id_slider)->delete("slider");

        if ($this->db->affected_rows() == 0) {
            $this->session->set_flashdata("pesan_error", "Data slider gagal dihapus.");
            redirect("slider");
        }

        $this->session->set_flashdata("pesan_sukses", "Data slider berhasil dihapus");
        redirect("slider");
    }
}
