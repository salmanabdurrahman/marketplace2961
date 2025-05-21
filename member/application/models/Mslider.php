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
}
