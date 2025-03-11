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
}
