<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_model extends CI_Model
{
    public function deletemitra($ID_mitra)
    {
        $this->db->where('ID_mitra', $ID_mitra);
        $this->db->delete('mitra');
    }

    public function deletemitrafromuser($email)
    {
        $this->db->where('email', $email);
        $this->db->delete('user');
    }

    public function deletekriteria($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kriteria');
    }
}
