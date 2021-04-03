<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ranking_model extends CI_Model
{

    public function deletekriteria($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kriteria');
    }
}
