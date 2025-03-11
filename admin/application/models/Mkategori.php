<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mkategori extends CI_Model
{
	public function tampil()
	{
		$q = $this->db->get("kategori")->result_array();
		$d = $q;
		return $d;
	}
}
