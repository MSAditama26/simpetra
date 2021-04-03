<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_model extends CI_Model
{
    public function deletemitra($id_mitra)
    {
        $this->db->where('id_mitra', $id_mitra);
        $this->db->delete('mitra');
    }

    public function deletemitrafromuser($email)
    {
        $this->db->where('email', $email);
        $this->db->delete('user');
    }

    public function deactivated($id_mitra)
    {
        $this->db->set('is_active', 0);
        $this->db->Where('id_mitra', $id_mitra);
        $this->db->update('mitra');
    }

    public function activated($id_mitra)
    {
        $this->db->set('is_active', 1);
        $this->db->Where('id_mitra', $id_mitra);
        $this->db->update('mitra');
    }

    public function deletepegawai($nip)
    {
        $this->db->where('nip', $nip);
        $this->db->delete('pegawai');
    }
}
