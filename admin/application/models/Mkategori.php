<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mkategori extends CI_Model
{
	public function tampil()
	{
		$this->db->order_by("id_kategori", "DESC");
		$q = $this->db->get("kategori")->result_array();
		$d = $q;
		return $d;
	}

	public function simpan($input)
	{
		$config["upload_path"] = $this->config->item("assets_kategori");
		$config["allowed_types"] = "jpg|png|jpeg|gif|svg";
		$config["max_size"] = "2048";

		$this->load->library("upload", $config);
		$this->upload->initialize($config);

		if ($this->upload->do_upload("foto_kategori")) {
			$input["foto_kategori"] = $this->upload->data("file_name");

			$this->db->insert("kategori", $input);
			$this->session->set_flashdata("pesan_sukses", "Data Kategori berhasil disimpan.");
			redirect("kategori");
		} else {
			$this->session->set_flashdata("pesan_error", $this->upload->display_errors());
			redirect("kategori/tambah");
		}
	}

	public function detail($id_kategori)
	{
		$this->db->where("id_kategori", $id_kategori);
		return $this->db->get("kategori")->row_array();
	}

	public function edit($id_kategori, $input)
	{
		$config["upload_path"] = $this->config->item("assets_kategori");
		$config["allowed_types"] = "jpg|png|jpeg|gif|svg";
		$config["max_size"] = "2048";

		$this->load->library("upload", $config);
		$this->upload->initialize($config);

		if ($this->upload->do_upload("foto_kategori")) {
			$detail = $this->detail($id_kategori);

			if (file_exists($this->config->item("assets_kategori") . $detail["foto_kategori"])) {
				unlink($this->config->item("assets_kategori") . $detail["foto_kategori"]);
			}

			$input["foto_kategori"] = $this->upload->data("file_name");
		} else {
			$this->session->set_flashdata("pesan_error", $this->upload->display_errors());
			redirect("kategori/edit/$id_kategori");
		}

		$this->db->where("id_kategori", $id_kategori)->update("kategori", $input);
		$this->session->set_flashdata("pesan_sukses", "Data kategori berhasil diubah.");
		redirect("kategori");
	}

	public function hapus($id_kategori)
	{
		$detail = $this->detail($id_kategori);

		if (file_exists($this->config->item("assets_kategori") . $detail["foto_kategori"])) {
			unlink($this->config->item("assets_kategori") . $detail["foto_kategori"]);
		}

		$this->db->where("id_kategori", $id_kategori)->delete("kategori");

		if ($this->db->affected_rows() == 0) {
			$this->session->set_flashdata("pesan_error", "Data kategori gagal dihapus.");
			redirect("kategori");
		}

		$this->session->set_flashdata("pesan_sukses", "Data kategori berhasil dihapus");
		redirect("kategori");
	}
}
