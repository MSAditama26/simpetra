<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_model extends CI_Model
{
    public function deletemitra($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('mitra');
    }
}
