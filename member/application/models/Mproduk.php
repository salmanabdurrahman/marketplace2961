<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mproduk extends CI_Model
{
    public function tampil()
    {
        $this->db->order_by("id_produk", "DESC");
        $q = $this->db->get("produk")->result_array();
        $d = $q;
        return $d;
    }

    public function tampil_produk_terbaru()
    {
        $this->db->order_by("id_produk", "DESC");
        $q = $this->db->get("produk", 4, 0);
        $d = $q->result_array();
        return $d;
    }

    public function produk_member($id_member)
    {
        $this->db->where("id_member", $id_member);
        $q = $this->db->get("produk")->result_array();
        $d = $q;
        return $d;
    }

    public function simpan($input)
    {
        $config["upload_path"] = $this->config->item("assets_produk");
        $config["allowed_types"] = "jpg|png|jpeg|gif|svg";
        $config["max_size"] = "2048";

        $this->load->library("upload", $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload("foto_produk")) {
            $input["foto_produk"] = $this->upload->data("file_name");
            $input["id_member"] = $this->session->userdata("id_member");

            $this->db->insert("produk", $input);
            $this->session->set_flashdata("pesan_sukses", "Data produk berhasil disimpan.");
            redirect("seller/produk");
        } else {
            $this->session->set_flashdata("pesan_error", $this->upload->display_errors());
            redirect("seller/produk/tambah");
        }
    }

    public function detail($id_produk)
    {
        $this->db->where("id_produk", $id_produk);
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $q = $this->db->get("produk")->row_array();
        $d = $q;
        return $d;
    }

    public function detail_umum($id_produk)
    {
        $this->db->where("id_produk", $id_produk);
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $q = $this->db->get("produk")->row_array();
        $d = $q;
        return $d;
    }

    public function edit($id_produk, $input)
    {
        $config["upload_path"] = $this->config->item("assets_produk");
        $config["allowed_types"] = "jpg|png|jpeg|gif|svg";
        $config["max_size"] = "2048";

        $this->load->library("upload", $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload("foto_produk")) {
            $detail = $this->detail($id_produk);

            if (file_exists($this->config->item("assets_produk") . $detail["foto_produk"])) {
                unlink($this->config->item("assets_produk") . $detail["foto_produk"]);
            }

            $input["foto_produk"] = $this->upload->data("file_name");
        }

        $this->db->where("id_produk", $id_produk)->update("produk", $input);
        $this->session->set_flashdata("pesan_sukses", "Data produk berhasil diubah.");
        redirect("seller/produk");
    }

    public function hapus($id_produk)
    {
        $detail = $this->detail($id_produk);

        if (file_exists($this->config->item("assets_produk") . $detail["foto_produk"])) {
            unlink($this->config->item("assets_produk") . $detail["foto_produk"]);
        }

        $this->db->where("id_produk", $id_produk)->delete("produk");

        if ($this->db->affected_rows() == 0) {
            $this->session->set_flashdata("pesan_error", "Data produk gagal dihapus.");
            redirect("seller/produk");
        }

        $this->session->set_flashdata("pesan_sukses", "Data produk berhasil dihapus");
        redirect("seller/produk");
    }
}