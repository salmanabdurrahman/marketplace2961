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

	public function detail($id_kategori)
	{
		$this->db->where("id_kategori", $id_kategori);
		$q = $this->db->get("kategori")->row_array();
		return $q;
	}

	public function tampil_produk($id_kategori, $id_member)
	{
		$this->db->where("id_kategori", $id_kategori);
		$this->db->where('id_member !=', $id_member);
		$q = $this->db->get("produk")->result_array();
		return $q;
	}
}
