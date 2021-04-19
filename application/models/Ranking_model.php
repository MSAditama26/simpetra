<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ranking_model extends CI_Model
{

    public function deletekriteria($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kriteria');
    }
    public function data_awal($kegiatan_id)
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

    public function utility($kegiatan_id)
    {
        $query = "SELECT kegiatan_id, id_mitra, kriteria_id, nilai FROM all_penilaian WHERE kegiatan_id = $kegiatan_id GROUP BY id_mitra, kriteria_id ORDER BY id_mitra, kriteria_id";

        $temp = $this->db->query($query)->result();
        $result['data'] = array();
        foreach ($temp as $data) {
            $data->bobot = $this->bobot($data->kegiatan_id, $data->id_mitra, $data->kriteria_id, $data->nilai);
            $result['data'][] = $data;
        }
        return $result;
    }

    public function bobot($kegiatan_id, $id_mitra, $kriteria_id, $nilai)
    {
        $query = "SELECT all_penilaian.id_mitra, all_penilaian.kriteria_id, all_penilaian.nilai, kriteria.bobot*subkriteria.bobot as bobot FROM all_penilaian JOIN kriteria ON all_penilaian.kriteria_id = kriteria.id JOIN subkriteria  ON all_penilaian.nilai = subkriteria.nilai WHERE all_penilaian.kegiatan_id = $kegiatan_id AND all_penilaian.id_mitra = $id_mitra AND all_penilaian.kriteria_id = $kriteria_id AND all_penilaian.nilai = $nilai GROUP BY all_penilaian.id_mitra, all_penilaian.kriteria_id ORDER BY all_penilaian.id_mitra, all_penilaian.kriteria_id ";
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function total_utility($kegiatan_id)
    {
        $query = "SELECT all_penilaian.id_mitra, SUM(kriteria.bobot*subkriteria.bobot) as bobot
        FROM all_penilaian JOIN kriteria ON all_penilaian.kriteria_id = kriteria.id JOIN subkriteria ON all_penilaian.nilai = subkriteria.nilai
        WHERE all_penilaian.kegiatan_id = $kegiatan_id
        GROUP BY all_penilaian.id_mitra
        ORDER BY all_penilaian.id_mitra";

        $result = $this->db->query($query)->result();
        return $result;
    }
}
