<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ranking_model extends CI_Model
{

    public function deletekriteria($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kriteria');
    }
    public function rekap($kegiatan_id)
    {
        $query = "SELECT kegiatan_id, id_mitra, kriteria_id FROM all_penilaian WHERE kegiatan_id = $kegiatan_id GROUP BY id_mitra, kriteria_id ORDER BY id_mitra, kriteria_id";

        $temp = $this->db->query($query)->result();
        $result['data'] = array();
        foreach ($temp as $data) {
            $data->nilai = $this->nilai($data->kegiatan_id, $data->id_mitra, $data->kriteria_id);
            $result['data'][] = $data;
        }
        return $result;
    }

    public function nilai($kegiatan_id, $id_mitra, $kriteria_id)
    {
        $query = "SELECT id_mitra, kriteria_id, nilai FROM all_penilaian WHERE kegiatan_id = $kegiatan_id AND id_mitra = $id_mitra AND kriteria_id = $kriteria_id GROUP BY id_mitra, kriteria_id ORDER BY id_mitra, kriteria_id ";
        $result = $this->db->query($query)->result();
        return $result;
    }
}
