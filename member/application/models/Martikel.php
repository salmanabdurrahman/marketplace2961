<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Martikel extends CI_Model
{
    public function tampil_artikel_terbaru()
    {
        $this->db->order_by("id_artikel", "DESC");
        $q = $this->db->get("artikel", 3, 0);
        $d = $q->result_array();
        return $d;
    }

    public function tampil_semua_artikel()
    {
        $this->db->order_by("id_artikel", "DESC");
        $q = $this->db->get("artikel");
        $d = $q->result_array();
        return $d;
    }

    public function detail($id_artikel)
    {
        $this->db->where("id_artikel", $id_artikel);
        $q = $this->db->get("artikel");
        return $q->row_array();
    }
}