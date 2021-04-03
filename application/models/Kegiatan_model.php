<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan_model extends CI_Model
{
    public function deletesurvei($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kegiatan');
    }

    public function deletesensus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kegiatan');
    }

    public function tambah_banyak($id_mitra, $jmldata)
    {
        for ($i = 0; $i < $jmldata; $i++) {
            $this->db->insert('nilai');
        }
        return true;
    }
}
