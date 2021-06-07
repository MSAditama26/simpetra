<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan_model extends CI_Model
{
    public function deletesurvei($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kegiatan');
    }

    public function deletesurvei_all_kegiatan_pencacah($id)
    {
        $this->db->where('kegiatan_id', $id);
        $this->db->delete('all_kegiatan_pencacah');
    }

    public function deletesurvei_all_kegiatan_pengawas($id)
    {
        $this->db->where('kegiatan_id', $id);
        $this->db->delete('all_kegiatan_pengawas');
    }

    // public function deletesurvei_all_penilaian($id)
    // {
    //     $kegiatan_id = "SELECT id FROM all_kegiatan_pencacah WHERE kegiatan_id = $id";
    //     $delete = "DELETE FROM all_penilaian WHERE all_kegiatan_pencacah_id IN ($kegiatan_id)";
    //     return $this->db->query($delete);
    // }

    public function deletesensus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kegiatan');
    }

    public function deletesensus_all_kegiatan_pencacah($id)
    {
        $this->db->where('kegiatan_id', $id);
        $this->db->delete('all_kegiatan_pencacah');
    }

    public function deletesensus_all_kegiatan_pengawas($id)
    {
        $this->db->where('kegiatan_id', $id);
        $this->db->delete('all_kegiatan_pengawas');
    }
}
